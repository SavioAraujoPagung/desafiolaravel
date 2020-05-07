<?php

namespace App\Http\Controllers\ModelController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{   
    public $request;
    public  $tarefa;


    public function __construct(Request $request, Tarefa $tarefa)
    {
        $this->request = $request;
        $this->tarefa  =  $tarefa;
    }

    public function index()
    {
        $tarefas = Tarefa::paginate(5);
        return view('admin.pages.Tarefas.index', ['tarefas'=>$tarefas,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTarefaRequest $request)
    {
        $dados = $request->only('nome', 'descricao', 'tempoMedio', 'custo');
        //dd($dados);
        Tarefa::create($dados);
        //return view('admin.pages.tarefas.index');
        return redirect()->route('tarefa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefa::find($id);
        if($tarefa)
        {
            return view('admin.pages.tarefas.show', [
                'tarefa'=> $tarefa
            ]);
        }
        else 
        {
            dd($tarefa);
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
        $tarefa = Tarefa::find($id);
        if($tarefa)
        {
            return view('admin.pages.Tarefas.edit', compact('tarefa'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTarefaRequest $request, $id)
    {
        $tarefa = Tarefa::find($id);
        if($tarefa)
        {
            $tarefa->update($request->all());
            return redirect()->route('tarefa.index');
            
        }
        return redirect()->back();
        
    }
    
    public function search(Request $request)
    {
        $tarefas = $this->tarefa->search($request->filtro);
        $filtrados = $request->except('_token');

        return view('admin.pages.Tarefas.index', 
                    [
                        'tarefas'=>$tarefas,
                        'filtrados'=>$filtrados,
                    ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::find($id);

        if($tarefa)
        {
            $tarefa->delete();
            return redirect()->route('tarefa.index');
        }
        return redirect()->back();
        //dd("Deletando tarefa");
    }
}
