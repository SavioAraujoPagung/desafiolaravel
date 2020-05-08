@extends('admin.layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
    <h1>Editar Tarefa </h1>
    <a href={{route('tarefa.index')}}><< Voltar </a>
    <hr>

    <form action="{{route('tarefa.update', $tarefa->id)}}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf 
        <div class="form-group"><input type="text"   name = "nome"       placeholder="Nome"        value={{$tarefa->nome}}> </div>
        <div class="form-group"><input type="text"   name = "descricao"  placeholder="Descrição"   value={{$tarefa->descricao}}> </div>
        <div class="form-group"><input type="number" name = "tempoMedio" placeholder="Tempo Médio" value={{$tarefa->tempoMedio}}> </div>
        <div class="form-group"><input type="text"   name = "custo"      placeholder="Custo"       value={{$tarefa->custo}}> </div>

        <div class="form-group"><button type="submit">Editar</button> 
            
    </form>
@endsection