@extends('admin.layouts.app')

@section('title', 'Listar Tarefas')

@section('content')
    <h1>Listagem das tarefas</h1>    
    <a href="{{route('tarefa.create')}}" class="btn btn-primary">Cadastrar</a>

    <hr>

<form action="{{route('tarefas.search')}}" method="POST" class="form form-inline">
    @csrf
    <input type="text" name="filtro" placeholder="Filtrar: Nome" class="form control" value="{{$filtrados['filtro'] ?? ''}}"> <br><br>
    <button type="submit" class="btn btn-info">Filtrar</button>
</form>
    <table class = "table table-striped table-dark" >
        <thead >
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Tempo Médio</th>
                <th>Custo</th>
                <th with="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->nome }}</td>
                    <td>{{ $tarefa->tempoMedio }}</td>
                    <td>{{ $tarefa->custo }}</td>
                    <td><a href={{route('tarefa.show', $tarefa->id)}}>Informações</a></td>
                    <td><a href={{route('tarefa.edit', $tarefa->id)}}>Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filtrados))
        {!!$tarefas->appends($filtrados)->links()!!}
    @else
        {!!$tarefas->links()!!}
    @endif
    
@endsection