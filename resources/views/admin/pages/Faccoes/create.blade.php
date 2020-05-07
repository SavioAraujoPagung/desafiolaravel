@extends('admin.layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
    <h1>Cadastro de Usuario/Facção</h1>

    <form action="{{route('faccao.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name = "nomeFantasia" placeholder="Nome Fantasia" > <br>
        <input type="text" name = "razaoSocial" placeholder="Razão Social"> <br>
        <input type="text" name = "endereco" placeholder="Endereço"> <br>
        <input type="text" name = "telefone" placeholder="Telefone"> <br>
        <input type="text" name = "cnpj" placeholder="CNPJ"> <br>
        <input type="password" name = "senha" placeholder="********"> <br>
        <input type="file" name = "imagem ">
        <button type="submit">Cadastrar</button>
    </form>
@endsection