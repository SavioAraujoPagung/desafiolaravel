@extends('admin.layouts.app')

@section('title', 'Destalhes do Processo ')

@section('content')
    <h1>Detalhes do Processo</h1>
    <a href={{route('processo.index')}}><< Voltar </a>
    <hr>
    
    <ul>
        <li>Nome fantasia da faccão: {{$processo->faccao}}</li>
        <li>Nome do modelo: {{$processo->modelo}}</li>
        <li>Nome da tarefa: {{$processo->tarefa}}</li>
        <li>Quantidade: {{$processo->quantidade}}</li>
    </ul>
    
    <form action="{{route('processo.destroy', $processo->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETAR</button>
    </form>
    
@endsection