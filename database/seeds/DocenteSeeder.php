<?php

use Illuminate\Database\Seeder;
use App\Docente;
use App\Usuario;
use App\Titulacao;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->delete();
        
        $user1 = Usuario::whereEmail('jaumjaum@email.me')->first();
        $titu1 = Titulacao::whereNome('mestre')->first();
        $user2 = Usuario::whereEmail('email@email.me')->first();
        $titu2 = Titulacao::whereNome('doutor')->first();

        $docente = new Docente(['nome_exibicao' => 'Joao polimerno']);
        $docente->usuario()->associate($user1);
        $docente->titulacao()->associate($titu1);
        $docente->save();

        $docente = new Docente(['nome_exibicao' => 'Muriel astolfa']);
        $docente->usuario()->associate($user2);
        $docente->titulacao()->associate($titu2);
        $docente->save();

    }
}
