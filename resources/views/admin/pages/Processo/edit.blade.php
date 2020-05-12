@extends('admin.layouts.app')

@section('title', 'Editar Processo')

@section('content')
    <h1>Editar Processo </h1>
    <a href={{route('processo.index')}}><< Voltar </a>
    <hr>

    <form action="{{route('processo.update', $processo->id)}}" method="POST">
        @csrf 
        @method("PUT")
        
        Selecionar o modelo:
        <select name="modelo" id="modelo">
            @foreach ($modelos as $modelo)
                <option value="{{ $modelo->nome }}">{{ $modelo->nome }}</option>
            @endforeach
        </select>
        <br><br>
        Selecionar a facção:
        <select name="faccao" id="faccao">
            @foreach ($faccoes as $faccao)
                <option value="{{ $faccao->nomeFantasia }}">{{ $faccao->nomeFantasia}}</option>
            @endforeach
        </select>
        <br><br>
        Selecionar a tarefa:
        <select name="tarefa" id="tarefa">
            @foreach ($tarefas as $tarefa)
                <option value="{{ $tarefa->nome }}">{{ $tarefa->nome }}</option>
            @endforeach
        </select>
        <br><br>
        <div class="form-group"><input type="number" name = "quantidade" placeholder="Quantidade"> </div>
        
        <div class="form-group"><button type="submit">Editar</button> 

    </form>
@endsection