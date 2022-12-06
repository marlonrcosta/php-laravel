@extends('layouts.main')

@section('title', 'Laravel')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Resultado da pesquisa</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Sexo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <a href="/events/edit/{{ $event->id }}" class="btn btn-sm btn-success"><ion-icon name="create-outline"></ion-icon></a>
                        </td>
                        <td>
                            <form action="/events/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                        <td>{{ $event->nome }}</td>
                        <td>{{ $event->cpf }}</td>
                        <td>{{ $event->nascimento }}</td>
                        <td>{{ $event->estado }}</td>
                        <td>{{ $event->cidade }}</td>
                        <td>{{ $event->sexo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você não possui cadastro.</p>
    @endif
</div>

@endsection