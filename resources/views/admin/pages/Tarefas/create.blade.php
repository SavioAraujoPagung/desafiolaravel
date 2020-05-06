@extends('admin.layouts.app')

@section('title', 'Cadastrar Tarefa')

@section('content')
    <h1>Cadastro de Tarefa</h1>
    <a href={{route('tarefa.index')}}><< Voltar </a>
    <hr>

    <form action="{{route('tarefa.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><input type="text" name = "nome" placeholder="Nome"> </div>
        <div class="form-group"><input type="text" name = "descricao" placeholder="Descrição"> </div>
        <div class="form-group"><input type="text" name = "tempoMedio" placeholder="Tempo Médio"> </div>
        <div class="form-group"><input type="text" name = "custo" placeholder="Custo"> </div>
        <div class="form-group"><button type="submit">Cadastrar</button> 
    </form>
@endsection