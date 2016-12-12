<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Usuario;
use App\User;
use App\Models\Docente;
use Auth;
use Symfony\Component\Console\Output\ConsoleOutput;

class AuthController extends Controller
{

    //usada para verificar se um usuário ja está cadastrado ou não
    protected $userControl;

    /**
     * Redirect the user to the providers authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($driver)
    {
        if($driverDoesntExist = $this->checkIfDriverExists($driver)){
            return $driverDoesntExist;
        }

        return Socialite::driver($driver)->redirect();

    }

    /**
     * Handle the providers call back and login authenticated user
     *
     * @return Response
     */
    public function handleProviderCallback($driver)
    {

        if ($driverDoesntExist = $this->checkIfDriverExists($driver)) {
            return $driverDoesntExist;
        }

        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return redirect('/erro')->withErrors($e->getMessage());
        }

        //$authUser = $this->findOrCreateUser($user);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'provider' => $driver,
            'super' => true,
            'social_id' => $user->id,
        ];

        if($user->avatar)
            $data['avatar'] = $user->avatar;

        //Se o Usuario ainda não estiver cadastrado, faça o login e redirecione-o para a página de cadastro de Docente
        if (Usuario::where('social_id', $user->id)->first()) {

            //Auth::login($user, $this->userControl); //se userControl=true, persiste novo registro no banco
            Auth::login(User::firstOrCreate($data));

            return redirect('dashboard');

        } else {

            Auth::login(User::firstOrCreate($data));

            return Redirect::to('/cadastro/docente');

        }

    }

    /**
     * Insert new authenticaded user as Docente
     */
    public function insertNewDocente()
    {
        $data = Input::all();

        $rules = array(
            'aceitacao_info' => 'required',
            'aceitacao_usuario' => 'required',
            'aceitacao_termo' => 'required',
        );

        $validator = Validator::make($data, $rules);
        
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            return Redirect::to('/cadastro/docente')->withInput()->withErrors($validator);

        } else {
            
            $insert = [
                'usuarios_id' => $data['usuarios_id'],
                'titulacoes_id' => $data['titulacoes_id'],
                'nome_exibicao' => $data['nome_exibicao'],
            ];

            if (Docente::firstOrCreate($insert)) {

                return redirect('dashboard');

            }

        }
    }

    /**
     * Logout authenticated user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Check if a driver exists, if it doesnt return a redirect, if it does return false.
     *
     * @param  string $driver
     *
     * @return mixed
     */
    private function checkIfDriverExists($driver)
    {
        if(!config('services.'.$driver)){
            return redirect('/cadastro');
        }

        return false;
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $providerUser
     * @return User
     */
    private function findOrCreateUser($providerUser)
    {
        //$authUser = Usuario::where('social_id', $user->id)->where('email', $user->email)->first();

        if ($authUser = Usuario::where('social_id', $providerUser->id)->first()) {

            $output = new ConsoleOutput;
            $output->writeln("<info>teste dentro</info>");

            $this->userControl = false;
            return $authUser;

        }

        $output = new ConsoleOutput;
            $output->writeln("<info>teste fora</info>");

        $this->userControl = true;
        return $providerUser;

    }
}