<?php

use Illuminate\Database\Seeder;
use App\Titulacao;

class TitulacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titulacoes')->delete();

        Titulacao::create([
            'nome'   => 'mestre',
            'abreviacao' => 'ME'
        ]);

        Titulacao::create([
            'nome'   => 'doutor',
            'abreviacao' => 'DR'
        ]);
    }
}
