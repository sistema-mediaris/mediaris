<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->delete();

        $user = Usuario::create(array(
            'name'          => 'Joao polimerno',
            'email'         => 'jaumjaum@email.me',
            'avatar'        => str_random(64),
            'super'         => true,
            'provider'      => 'google',
            'social_id'     => str_random(20)
        ));

        $user = Usuario::create(array(
            'name'          => 'Muriel astolfa',
            'email'         => 'email@email.me',
            'avatar'        => str_random(64),
            'super'         => true,
            'provider'      => 'yahoo',
            'social_id'     => str_random(20)
        ));

        $user = Usuario::create(array(
            'name'          => 'Aluno alunado',
            'email'         => 'aluno@email.me',
            'avatar'        => str_random(64),
            'super'         => false,
            'provider'      => 'live',
            'social_id'     => str_random(20)
        ));

        $user = Usuario::create(array(
            'name'          => 'Aluno alienado',
            'email'         => 'alunero@email.me',
            'avatar'        => str_random(64),
            'super'         => false,
            'provider'      => 'linkedin',
            'social_id'     => str_random(20)
        ));
    }
}
