@extends('admin.layouts.app')

@section('title', 'Cadastrar Coleção ')

@section('content')
    <h1>Cadastro de Coleção</h1>
    <a href={{route('colecao.index')}}><< Voltar </a>
    <hr>

    <form action="{{route('colecao.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><input type="text" name = "nome" placeholder="Nome"> </div>
        <div class="form-group"><input type="text" name = "descricao" placeholder="Descrição"> </div>
        <div class="form-group"><input type="text" name = "dataLancamento" placeholder="Data Lançamento"> </div>
        <div class="form-group"><button type="submit">Cadastrar</button> 
    </form>
@endsection