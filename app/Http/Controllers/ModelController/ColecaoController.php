<?php

namespace App\Http\Controllers\ModelController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateColecaoRequest;
use App\Models\Colecoes;

class ColecaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Colecoes::paginate(5);
        return view('admin.pages.Colecao.index', ['colecoes'=>$resultado,]);
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Colecao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateColecaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateColecaoRequest $request)
    {
        $dados = $request->except('_token');
        //dd($dados);
        Colecoes::create($dados);
        return redirect()->route('colecao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultado = Colecoes::find($id);
        if($resultado)
        {
            return view('admin.pages.Colecao.show', [
                'colecao'=> $resultado
            ]);
        }
        else 
        {
            dd($resultado);
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
        $colecao = Colecoes::find($id);
        if($colecao)
        {
            return view('admin.pages.Colecao.edit', compact('colecao'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateColecaoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateColecaoRequest $request, $id)
    {
        $resultado = Colecoes::find($id);
        if($resultado)
        {
            $resultado->update($request->all());
            return redirect()->route('colecao.index');
            
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
        $resultado = Colecoes::find($id);

        if($resultado)
        {
            $resultado->delete();
            return redirect()->route('colecao.index');
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $resultados = $this->colecao->search($request->filtro);
        $filtrados = $request->except('_token');

        return view('admin.pages.Colecao.index', 
                    [
                        'tarefas'=>$resultados,
                        'filtrados'=>$filtrados,
                    ]);
    }
}
