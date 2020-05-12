<?php

namespace App\Http\Controllers\ModelController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Processo;
use App\Models\Tarefa;
use App\Models\Faccoes;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processos = Processo::paginate(5);
        return view('admin.pages.Processo.index', ['processos'=>$processos,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelos = Modelo::all();
        $tarefas = Tarefa::all();
        $faccoes  = Faccoes::all();

        return view('admin.pages.Processo.create', ['modelos' => $modelos, 
                                                    'tarefas' => $tarefas,
                                                    'faccoes' => $faccoes,
                                                   ]
                                                   );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $dados = $request->only('tarefa',
                                'faccao',
                                'modelo',
                                'quantidade');

        Processo::create($dados);
        return redirect()->route('processo.index');
        /**/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processo = Processo::find($id);
        if($processo)
        {
            return view('admin.pages.Processo.show', [
                'processo'=> $processo
            ]);
        }
        else 
        {
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
        $processo = Processo::find($id);
        $modelos  = Modelo::all();
        $tarefas  = Tarefa::all();
        $faccoes  = Faccoes::all();
        
        if($processo)
        {   
            return view('admin.pages.Processo.edit', ['processo' => $processo, 
                                                        'modelos' => $modelos,
                                                        'tarefas' => $tarefas, 
                                                        'faccoes' => $faccoes, ]); 

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
        $processo = Processo::find($id);
        if($processo)
        {
            $processo->update($request->all());
            return redirect()->route('processo.index');
            
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
        $processo = Processo::find($id);

        if($processo)
        {
            $processo->delete();
            return redirect()->route('processo.index');
        }
        return redirect()->back();
    }
}
