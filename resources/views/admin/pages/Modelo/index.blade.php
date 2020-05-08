@extends('admin.layouts.app')

@section('title', 'Listar Modelo')

@section('content')
    <h1>Lista de Modelo</h1>    
    <a href="{{route('modelo.create')}}" class="btn btn-primary">Cadastrar</a>
    <hr>
    
    <form action="{{route('modelos.search')}}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filtro" placeholder="Nome da Modelo" class="form control" value="{{$filtrados['filtro'] ?? ''}}"> <br><br>
        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>

    <table class = "table table-striped table-dark" >
        <thead>
            <tr>
                <td>Imagem</td>
                <td>Nome</td>
                <td>Coleções</td>
                <td>Quantidade</td>
                <td>Ações</td>
            </tr>

        </thead>
        <tbody>
            @foreach ($modelos as $modelo)
                <tr>
                    <td>
                        
                        @if ($modelo->image)
                            <img src="{{url("storage/{$modelo->image}")}}" alt="{{$modelo->image}}" style="max-width: 100px">
                        @endif
                    </td>
                    <td>{{ $modelo->nome }}</td>
                    <td>{{ $modelo->colecao }}</td>
                    <td>{{ $modelo->quantidade }}</td>
                    <td><a href={{route('modelo.show', $modelo->id)}}>Informações</a></td>
                    <td><a href={{route('modelo.edit', $modelo->id)}}>Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filtrados))
        {!!$modelos->appends($filtrados)->links()!!}
    @else
        {!!$modelos->links()!!}
    @endif
    
@endsection