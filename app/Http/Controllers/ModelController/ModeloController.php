<?php

namespace App\Http\Controllers\ModelController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelo;

class ModeloController extends Controller
{
    public $request;
    public  $modelo;


    public function __construct(Request $request, Modelo $modelo)
    {
        $this->request = $request;
        $this->modelo  =  $modelo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Modelo::paginate(5);
        return view('admin.pages.Modelo.index', ['modelos'=>$modelos,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Modelo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->only('nome', 
                                'descricao', 
                                'dataLancamento', 
                                'quantidade', 
                                'colecao',
                                'image'
                            );

        
        if ($request->hasFile('image')&&$request->image->isValid())
        {
            $imagePath = $request->image->store('modelo');
            $dados ['image'] = $imagePath;
        }

        Modelo::create($dados);
        return redirect()->route('modelo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo::find($id);
        if($modelo)
        {
            return view('admin.pages.Modelo.show', [
                'modelo'=> $modelo
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
        $modelo = Modelo::find($id);
        if($modelo)
        {   
            return view('admin.pages.Modelo.edit', compact('modelo'));
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
        $modelo = Modelo::find($id);
        if($modelo)
        {
            $modelo->update($request->all());
            return redirect()->route('modelo.index');
            
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
        $modelo = Modelo::find($id);

        if($modelo)
        {
            $modelo->delete();
            return redirect()->route('modelo.index');
        }
        return redirect()->back();
    }
}
