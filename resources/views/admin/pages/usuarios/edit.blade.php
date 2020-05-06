@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <h1>Editar Usuario/Facção</h1>
    
    <form action="{{route('usuario.update', $id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name = "nomeFantasia" placeholder="Nome Fantasia"> <br>
        <input type="text" name = "razaoSocial" placeholder="Razão Social"> <br>
        <input type="text" name = "endereco" placeholder="Endereço"> <br>
        <input type="text" name = "telefone" placeholder="Telefone"> <br>
        <input type="text" name = "cnpj" placeholder="CNPJ"> <br>
        <input type="password" name = "senha" placeholder="********"> <br>
        <button type="submit">Editar</button>
    </form>
@endsection