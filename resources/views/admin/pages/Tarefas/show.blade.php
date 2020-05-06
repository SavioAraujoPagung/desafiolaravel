@extends('admin.layouts.app')

@section('title', 'Destalhes da Tarefa ')

@section('content')
    <h1>Detalhes da Tarefa</h1>
    <a href={{route('tarefa.index')}}><< Voltar </a>
    <hr>
    <ul>
        <li>Id: {{$tarefa->id}}</li>
        <li>Nome: {{$tarefa->nome}}</li>
        <li>Descricao: {{$tarefa->descricao}}</li>
        <li>Tempo Médio: {{$tarefa->tempoMedio}}</li>
        <li>Custo: {{$tarefa->custo}}</li>
    </ul>
    

    <form action="{{route('tarefa.destroy', $tarefa->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETAR</button>
    </form>
    
@endsection