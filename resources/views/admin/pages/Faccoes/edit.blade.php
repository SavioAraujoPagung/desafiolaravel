@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <h1>Editar Facção</h1>
    <a href={{route('faccao.index')}}><< Voltar </a>
    <hr>
    <form action="{{route('faccao.update', $faccao->id)}}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group"><input type="text" name = "nomeFantasia" placeholder="Nome Fantasia" value={{$faccao->nomeFantasia}}> </div>
        <div class="form-group"><input type="text" name = "razaoSocial"  placeholder="Razão Social"  value={{$faccao->razaoSocial}}> </div>
        <div class="form-group"><input type="text" name = "endereco"     placeholder="Endereço"      value={{$faccao->endereco}}> </div>
        <div class="form-group"><input type="text" name = "telefone"     placeholder="Telefone"      value={{$faccao->telefone}}> </div>
        <div class="form-group"><input type="text" name = "cnpj"         placeholder="CNPJ"          value={{$faccao->cnpj}}> </div>
        <div class="form-group"><input type="text" name = "situacao"     placeholder="Situaçao"      value={{$faccao->situacao}}> </div>

        <div class="form-group"><button type="submit">Editar</button> 
    </form>
@endsection