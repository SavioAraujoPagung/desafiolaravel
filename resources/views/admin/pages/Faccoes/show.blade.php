@extends('admin.layouts.app')

@section('title', 'Destalhes da Facção ')

@section('content')
    
    <h1>Detalhes da Facção</h1>
    <a href={{route('faccao.index')}}><< Voltar </a>
    <hr>
    <ul>
        <li>Id: {{$faccao->id}}</li>
        <li>Nome Fantasia: {{$faccao->nomeFantasia}}</li>
        <li>Razão Social: {{$faccao->razaoSocial}}</li>
        <li>TEndereço: {{$faccao->endereco}}</li>
        <li>telefone: {{$faccao->telefone}}</li>
        <li>CNPJ: {{$faccao->cnpj}}</li>
        <li>Situação: {{$faccao->situacao}}</li>
    </ul>
    
    <form action="{{route('faccao.destroy', $faccao->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETAR</button>
    </form>
    
@endsection