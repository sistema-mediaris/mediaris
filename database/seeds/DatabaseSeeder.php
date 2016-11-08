<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        /*
        $this->call(TitulacaoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(DocenteSeeder::class);
        $this->call(AlunoSeeder::class);
        */

        Model::unguard();

        $this->call('TitulacaoSeeder');
        $this->call('UsuarioSeeder');
        $this->call('DocenteSeeder');
        $this->call('AlunoSeeder');

        Model::reguard();

    }
}
