@extends('admin.layouts.app')

@section('title', 'Editar Coleção')

@section('content')
    <h1>Editar Coleção</h1>
    <a href={{route('colecao.index')}}><< Voltar </a>
    <hr>
    
    <form action="{{route('colecao.update', $colecao->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group"><input type="text" name = "nome"           placeholder="Nome"            value={{$colecao->nome}}> </div>
        <div class="form-group"><input type="text" name = "descricao"      placeholder="descricao"       value={{$colecao->descricao}}> </div>
        <div class="form-group"><input type="text" name = "dataLancamento" placeholder="Data Lancamento" value={{$colecao->dataLancamento}}> </div>

        <div class="form-group"><button type="submit">Editar</button> 
    </form>
@endsection