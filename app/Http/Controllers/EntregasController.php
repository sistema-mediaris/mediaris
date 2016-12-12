<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Entrega;
use App\Models\Trabalho;
use App\Models\Solicitacao;
use App\Models\Aluno;

class EntregasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

            $entregas = DB::table('alunos')
            ->select('alunos.*')->where('alunos.usuarios_id', '=', $user->id)
            ->join('entregas', 'alunos.id', '=', 'entregas.alunos_id')
            ->select('entregas.*')
            ->get();

        return View::make('entregas.index')->with('entregas', $entregas);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexForSolicitacoes($id)
    {
        $user = Auth::user();

        $entregas = DB::table('docentes')
            ->select('docentes.*')->where('docentes.usuarios_id', '=', $user->id)
            ->join('turmas', 'docentes.id', '=', 'turmas.docentes_id')
            ->join('solicitacoes', 'turmas.id', '=', 'solicitacoes.turmas_id')
            ->join('entregas', 'solicitacoes.id', '=', 'entregas.solicitacoes_id')
            ->select('entregas.id as entregas_id', 'entregas.updated_at as up_at', 'entregas.*', 'solicitacoes.id as solicitacao_id', 'solicitacoes.nome as solicitacao_nome')->where('solicitacoes_id', $id)
            ->get();

        return View::make('entregas.indexEntregas')->with('entregas', $entregas)->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $solicitacao = \App\Models\Solicitacao::findOrFail($id)->first();
        $user = Auth::user();
        $aluno = \App\Models\Aluno::where('usuarios_id', $user->id)->first();

        return View::make('entregas.create')->with('solicitacao', $solicitacao)->with('aluno', $aluno);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$rules = array(
            'nome'         => 'required',
            'turmas_id'    => 'required',
            'data_entrega' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('solicitacoes/create')
                ->withErrors($validator)
                ->withInput();
        } else {*/

            $entrega = new Entrega;
            $entrega->alunos_id = Input::get('alunos_id');
            $entrega->solicitacoes_id = Input::get('solicitacoes_id');
            $entrega->save();

            $trabalhos = Input::file('trabalhos');

            foreach ($trabalhos as $trabalho) {
                
                $trab = new Trabalho;
                $trab->nome = $trabalho->getClientOriginalName();
                $trab->extensao = $trabalho->getClientOriginalExtension();
                $trab->tipo = $trabalho->getClientOriginalExtension();
                $trab->url_cloud = public_path() . '/files/' . $trab->nome;
                $trab->save();

                $entrega->trabalhos()->attach($trab);

            }

            Session::flash('message', 'Entrega efetuada com sucesso!');

            return Redirect::to('aluno/solicitacoes');
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrega = Entrega::findOrFail($id);
        $solicitacao = Solicitacao::find($entrega->solicitacoes_id);
        $aluno = Aluno::find($entrega->alunos_id);
        
        return View::make('entregas.show')->with('entrega', $entrega)->with('aluno',$aluno)->with('solicitacao',$solicitacao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
