@extends('admin.layouts.app')

@section('title', 'Listar Coleções')

@section('content')
    <h1>Lista de Coleções</h1>    
    <a href="{{route('colecao.create')}}" class="btn btn-primary">Cadastrar</a>
    <hr>
    
    <form action="{{route('colecoes.search')}}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filtro" placeholder="Nome da Coleção" class="form control" value="{{$filtrados['filtro'] ?? ''}}"> <br><br>
        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>

    <table class = "table table-striped table-dark" >
        <thead >
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de Lançamento</th>
                <th with="100">Ações</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($colecoes as $colecao)
                <tr>
                    <td>{{ $colecao->nome }}</td>
                    <td>{{ $colecao->descricao }}</td>
                    <td>{{ $colecao->dataDeLancamento}}</td>
                    <td><a href={{route('colecao.show', $colecao->id)}}>Informações</a></td>
                    <td><a href={{route('colecao.edit', $colecao->id)}}>Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filtrados))
        {!!$colecoes->appends($filtrados)->links()!!}
    @else
        {!!$colecoes->links()!!}
    @endif
    
@endsection