@extends('admin.layouts.app')

@section('title', 'Destalhes da Coleção ')

@section('content')
    <h1>Detalhes da Modelo</h1>
    <a href={{route('modelo.index')}}><< Voltar </a>
    <hr>
    
    <ul>
        <li>Id: {{$modelo->id}}</li>
        <li>Nome: {{$modelo->nome}}</li>
        <li>Descricao: {{$modelo->descricao}}</li>
        <li>Data Lançamento: {{$modelo->dataLancamento}}</li>
        <li>Imagem: {{$modelo->imagem}}</li>
    </ul>
    
    <form action="{{route('modelo.destroy', $modelo->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETAR</button>
    </form>
    
@endsection