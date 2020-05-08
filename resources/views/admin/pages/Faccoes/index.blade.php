@extends('admin.layouts.app')

@section('title', 'Listar Facções')

@section('content')
    <h1>Lista de Facções</h1>    
    <a href="{{route('faccao.create')}}" class="btn btn-primary">Cadastrar</a>
    <hr>
    
    <form action="{{route('faccoes.search')}}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filtro" placeholder="Nome Fantasia" class="form control" value="{{$filtrados['filtro'] ?? ''}}"> <br><br>
        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>

    <table class = "table table-striped table-dark" >
        <thead >
            <tr>
                <th>Nome Fantasia</th>
                <th>CNJP</th>
                <th>Situação</th>
                <th with="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faccoes as $faccao)
                <tr>
                    <td>{{ $faccao->nomeFantasia }}</td>
                    <td>{{ $faccao->cnpj }}</td>
                    <td>{{ $faccao->situacao }}</td>
                    <td><a href={{route('faccao.show', $faccao->id)}}>Informações</a>
                    <a href={{route('faccao.edit', $faccao->id)}}>Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filtrados))
        {!!$faccoes->appends($filtrados)->links()!!}
    @else
        {!!$faccoes->links()!!}
    @endif

@endsection
