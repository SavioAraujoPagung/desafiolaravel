<?php

namespace App\Http\Controllers\ModelController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFaccaoRequest;
use App\Models\Faccao;
use Illuminate\Http\Request;

class FaccaoController extends Controller
{
    public $request;
    public  $faccao;
    public function _construct(Request $request, Faccao $faccao){
        $this->request = $request;
        $this->faccao  = $request;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faccoes = Faccao::paginate(5);
        return view('admin.pages.Faccoes.index', ['faccoes'=>$faccoes,]);
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
        $dados = $request->except('_token');
        //dd($dados);
        Faccao::create($dados);
        return redirect()->route('faccao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faccao = Faccao::find($id);
        if($faccao)
        {
            return view('admin.pages.Faccoes.show', [
                'faccao'=> $faccao
            ]);
        }
        else 
        {
            dd($faccao);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $faccao = Faccao::find($id);
        if($faccao)
        {
            return view('admin.pages.Faccoes.edit', compact('faccao'));
        }
        
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
        $faccao = Faccao::find($id);
        if($faccao)
        {
            $faccao->update($request->all());
            return redirect()->route('faccao.index');
            
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faccao = Faccao::find($id);

        if($faccao)
        {
            $faccao->delete();
            return redirect()->route('faccao.index');
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $faccoes = $this->facao->search($request->facao);
        $filtrados = $request->all();

        return view('admin.pages.Faccoes.index', 
                    [
                        'tarefas'=>$faccoes,
                        'filtrados'=>$filtrados,
                    ]);
    }
}
