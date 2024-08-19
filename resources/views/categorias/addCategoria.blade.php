@extends('admin')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row justify-content-md-center bg-light ">
    <div class="col-sm-10 rounded bg-white p-3 m-1 border mt-5 p-md-5">
        <h2>Cadastrar Categoria</h2>
        <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="nome">Nome da Categoria</label>
                <input type="text" class="form-control mt-2" required name="nome" id="nome">
            </div>
            <div class="form-group mt-3">
                <label for="codigo">Código da Categoria</label>
                <input type="text" class="form-control mt-2" required name="codigo" id="codigo">
            </div>
            <div class="mt-3">
                <label for="inputGroupFile02" class="form-label">Icone da Categoria</label>
                <input type="file" class="form-control" id="icone" name="icone" required>
            </div>
            <div class="form-group mt-3">
                <label for="descricao">Descrição da Categoria</label>
                <input type="text" class="form-control mt-2" required name="descricao" id="descricao">
            </div>
            <button class="btn btn-primary mt-4"><i class="fa fa-save"></i> Cadastrar categoria</button>
        </form>
    </div>
</div>
@endsection