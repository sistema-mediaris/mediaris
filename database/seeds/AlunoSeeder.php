<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use App\Aluno;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alunos')->delete();

        $user1 = Usuario::whereEmail('aluno@email.me')->first();
        $user2 = Usuario::whereEmail('alunero@email.me')->first();

        $aluno = Aluno::create(array(
            'nome_exibicao'     => 'Aluno alunado'
        ));
        $aluno->usuario()->associate($user1);

        $aluno = Aluno::create(array(
            'nome_exibicao'     => 'Aluno alienado'
        ));
        $aluno->usuario()->associate($user2);
    }
}
