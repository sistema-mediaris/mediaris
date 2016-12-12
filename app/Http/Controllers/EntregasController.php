<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use View;

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
            ->join('feedback', 'feedback.id', '=', 'alunos.feedback_id')
            ->select('entregas.*', 'feedback.*')
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
            ->join('entregas', 'solicitacoes.id', '=', '.entregas.solicitacoes_id')
            ->join('feedback', 'feedback.id', '=', 'entregas.feedback_id')
            ->select('entregas.*', 'feedback.*', 'solicitacoes.*')->where('solicitacoes.id', '=', $id)
            ->get();

        return View::make('entregas.indexEntregas')->with('entregas', $entregas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
