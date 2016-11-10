<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Socialite;

class AuthController extends Controller
{
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
     * Handle the providers call back.
     *
     * @return Response
     */
    public function handleProviderCallback($driver)
    {

        if($driverDoesntExist = $this->checkIfDriverExists($driver)){
            return $driverDoesntExist;
        }

        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return redirect('/')->withErrors($e->getMessage());
        }

        Auth::login(User::firstOrCreate([
            'name'      => $user->name,
            'email'     => $user->email,
        ]), true);

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
            return redirect('/');
        }

        return false;
    }
}