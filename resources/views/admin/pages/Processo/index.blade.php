@extends('admin.layouts.app')

@section('title', 'Listar Processos')

@section('content')
    <h1>Lista de Processos</h1>    
    <a href="{{route('processo.create')}}" class="btn btn-primary">Cadastrar</a>
    <hr>
    
    <form action="{{route('processos.search')}}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filtro" placeholder="By facção" class="form control" value="{{$filtrados['filtro'] ?? ''}}"> <br><br>
        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>

    <table class = "table table-striped table-dark" >
        <thead>
            <tr>
                <td>Facção</td>
                <td>Tarefa</td>
                <td>Modelo</td>
                <td>Quantidade</td>
                <td>Ações</td>
            </tr>

        </thead>
        <tbody>
            @foreach ($processos as $processo)
                <tr>
                    <td>{{ $processo->faccao }}</td>
                    <td>{{ $processo->tarefa }}</td>
                    <td>{{ $processo->modelo }}</td>
                    <td>{{ $processo->quantidade }}</td>
                    <td><a href={{route('processo.show', $processo->id)}}>Informações</a></td>
                    <td><a href={{route('processo.edit', $processo->id)}}>Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filtrados))
        {!!$processos->appends($filtrados)->links()!!}
    @else
        {!!$processos->links()!!}
    @endif
    
@endsection