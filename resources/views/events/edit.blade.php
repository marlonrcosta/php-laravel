@extends('layouts.main')

@section('title', 'Criar Cadastro')

@section('content')

<div id="events-container" class="col-md-10 offset-md-1">
    <h4>Editando {{ $event->title }}</h4>
    <form action="/events/update/{{ $event->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3 form-group">
                <label for="title">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{ $event->cpf }}" class="form-control" placeholder="CPF">
            </div>
            <div class="col-md-3 form-group">
                <label for="title">Nome</label>
                <input type="text" id="nome" name="nome" value="{{ $event->nome }}" class="form-control" placeholder="Nome">
            </div>
            <div class="col-md-3 form-group">
                <label for="title">Data Nascimento</label>
                <input type="text" id="nascimento" name="nascimento" value="{{ $event->nascimento }}" class="form-control" placeholder="Data nascimento">
            </div>
            <div class="col-md-3 form-group">
                <label for="title">Sexo</label><br>
                <input type="radio" name="sexo" value="M" class="mt-2"> Masculino
                <input type="radio" name="sexo" value="F" class="mt-2"> Feminino
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="title">Endereço</label>
                <input type="text" id="endereco" value="{{ $event->endereco }}" name="endereco" class="form-control" placeholder="Endereço">
            </div>
            <div class="col-md-3 form-group">
                <label for="title">Estado</label>
                <select id="estado" name="estado" class="form-control">
                    <option value="">Selecione</option>
                    <option value="SP">SP</option>
                </select>
            </div>
            <div class="col-md-3 form-group">
                <label for="title">Cidade</label>
                <select id="cidade" name="cidade" class="form-control">
                    <option value="">Selecione</option>
                    <option value="Guararema">Guararema</option>
                    <option value="São Paulo">São Paulo</option>
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-10"></div>
            <div class="col-2">
                <input type="submit" class="btn btn-primary" value="Salvar">
                <a href="/events/edit/{{ $event->id }}" class="btn btn-secondary">Limpar</a>
            </div>
        </div>
    </form>
</div>

@endsection