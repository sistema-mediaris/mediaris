<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use App\Models\Solicitacao;
use App\Models\Complemento;

class SolicitacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $solicitacoes = DB::table('docentes')
            ->select('docentes.*')->where('docentes.usuarios_id', '=', $user->id)
            ->join('turmas', 'docentes.id', '=', 'turmas.docentes_id')
            ->join('solicitacoes', 'turmas.id', '=', 'solicitacoes.turmas_id')
            ->join('instituicoes', 'instituicoes.id', '=', 'turmas.instituicoes_id')
            ->select('instituicoes.nome', 'solicitacoes.id as solicitacao_id', 'solicitacoes.*', 'docentes.*')
            ->get();

        return View::make('solicitacoes.index')->with('solicitacoes', $solicitacoes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('solicitacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            'nome'         => 'required',
            'turmas_id'    => 'required',
            'data_entrega' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('solicitacoes/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $complemento = false;

            if (!empty(Input::get('descricao')) || !empty(Input::get('assunto')) || !empty(Input::get('objetivo'))) {
                $complemento = new Complemento;
                $complemento->descricao = Input::get('descricao');
                $complemento->assunto = Input::get('assunto');
                $complemento->objetivo = Input::get('objetivo');
                $complemento->save();
            }

            $solicitacao = new Solicitacao;
            $solicitacao->nome = Input::get('nome');
            $solicitacao->turmas_id = Input::get('turmas_id');
            $solicitacao->data_criacao = Carbon::now()->toDateString();
            $solicitacao->data_entrega = Carbon::createFromFormat('d/m/Y', Input::get('data_entrega'))->toDateString();

            if($complemento)
                $solicitacao->complementos_id = $complemento->id;

            $solicitacao->save();

            $exts = Input::get('tipos_arquivos');

            foreach ($exts as $ext) {
                $solicitacao->tipos_arquivos()->attach($ext);
            }

            Session::flash('message', 'Solicitação criada com sucesso!');
            return Redirect::to('solicitacoes');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $solicitacao = Solicitacao::findOrFail($id);
        return View::make('solicitacoes.show')->with('solicitacao', $solicitacao);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $solicitacao = Solicitacao::findOrFail($id);
        return View::make('solicitacoes.edit')->with('solicitacao', $solicitacao);
    
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
        $rules = array(
            'nome'         => 'required',
            'turmas_id'    => 'required',
            'data_entrega' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('solicitacoes/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $complemento = false;

            if (!empty(Input::get('descricao')) || !empty(Input::get('assunto')) || !empty(Input::get('objetivo'))) {
                $complemento = new Complemento;
                $complemento->descricao = Input::get('descricao');
                $complemento->assunto = Input::get('assunto');
                $complemento->objetivo = Input::get('objetivo');
                $complemento->save();
            }

            $solicitacao = new Solicitacao;
            $solicitacao->nome = Input::get('nome');
            $solicitacao->turmas_id = Input::get('turmas_id');
            $solicitacao->data_criacao = Carbon::now()->toDateString();
            $solicitacao->data_entrega = Carbon::createFromFormat('d/m/Y', Input::get('data_entrega'))->toDateString();

            if($complemento)
                $solicitacao->complementos_id = $complemento->id;

            $solicitacao->save();

            $exts = Input::get('tipos_arquivos');

            foreach ($exts as $ext) {
                $solicitacao->tipos_arquivos()->attach($ext);
            }

            Session::flash('message', 'Solicitação atualizada com sucesso!');
            return Redirect::to('solicitacoes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->delete();

        Session::flash('message', 'Solicitação deletada com sucesso!');
        return Redirect::to('solicitacoes');
    }
}
