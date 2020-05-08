@extends('admin.layouts.app')

@section('title', 'Cadastrar Modelo ')

@section('content')
    <h1>Cadastro de Modelo</h1>
    <a href={{route('modelo.index')}}><< Voltar </a>
    <hr>

    <form action="{{route('modelo.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><input type="file"   name = "image"          placeholder="imagem"> </div>
        <div class="form-group"><input type="text"   name = "nome"           placeholder="Nome"> </div>
        <div class="form-group"><input type="text"   name = "descricao"      placeholder="Descrição"> </div>
        <div class="form-group"><input type="text"   name = "dataLancamento" placeholder="Data Lançamento"> </div>
        <div class="form-group"><input type="text"   name = "colecao"        placeholder="Coleções"> </div>
        <div class="form-group"><input type="number" name = "quantidade"     placeholder="Quantidade"> </div>
        <div class="form-group"><button type="submit">Cadastrar</button> 
    </form>
@endsection