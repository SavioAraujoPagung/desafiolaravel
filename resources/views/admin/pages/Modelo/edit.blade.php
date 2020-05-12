@extends('admin.layouts.app')

@section('title', 'Editar Modelo')

@section('content')
    <h1>Editar Modelo</h1>
    <a href={{route('modelo.index')}}><< Voltar </a>
    <hr>

    <form action="{{route('modelo.update', $modelo->id)}}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf 

        <div class="form-group"><input type="file"   name = "image"          placeholder="imagem"          value={{$modelo->image}}></div>
        <div class="form-group"><input type="text"   name = "nome"           placeholder="Nome"            value={{$modelo->nome}}></div>
        <div class="form-group"><input type="text"   name = "descricao"      placeholder="Descrição"       value={{$modelo->descricao}}></div>
        <div class="form-group"><input type="text"   name = "dataLancamento" placeholder="Data Lançamento" value={{$modelo->dataLancamento}}></div>
        
        <select name="colecao" id="colecao">
            @foreach ($colecoes as $colecao)
                <option value="{{ $colecao->nome }}"></option>
            @endforeach
        </select>

        <div class="form-group"><input type="number" name = "quantidade"     placeholder="quantidade"      value={{$modelo->quantidade}}></div>

        <div class="form-group"><button type="submit">Editar</button> 
            
    </form>
@endsection