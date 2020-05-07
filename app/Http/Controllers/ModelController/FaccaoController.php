<?php

namespace App\Http\Controllers\ModelController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFaccaoRequest;
use App\Models\Faccao;
use Illuminate\Http\Request;

class FaccaoController extends Controller
{
    protected $request;
    public function _construct(Request $request){
        $this->request = $request;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faccoes = Faccao::paginate(5);
        return view('admin.pages.Faccoes.index', ['tarefas'=>$faccoes,]);
        //dd('lista de fações');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Faccoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateFaccaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('cadastrando');
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
        return view('admin.pages.faccao.edit', compact('id'));
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
        dd('editando $id');
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
