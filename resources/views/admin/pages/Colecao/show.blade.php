@extends('admin.layouts.app')

@section('title', 'Destalhes da Coleção ')

@section('content')
    <h1>Detalhes da Coleção</h1>
    <a href={{route('colecao.index')}}><< Voltar </a>
    <hr>
    <ul>
        <li>Id: {{$colecao->id}}</li>
        <li>Nome: {{$colecao->nome}}</li>
        <li>Descricao: {{$colecao->descricao}}</li>
        <li>Data Lançamento: {{$colecao->dataLancamento}}</li>
    </ul>
    
    <form action="{{route('colecao.destroy', $colecao->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETAR</button>
    </form>
    
@endsection