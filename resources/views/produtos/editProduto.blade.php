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
        <h2>Editar Produtos</h2>
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="nome">Nome do Produto</label>
                <input type="text" class="form-control mt-2" required name="nome" id="nome" value="{{ $produto->nome }}">
            </div>

            <div class="mt-3">
                <label for="inputGroupFile02" class="form-label">Imagem do Produto</label></br>
                <img src="/img/events/{{ $produto->imagem }}" alt="" class="mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                <input type="file" class="form-control" id="imagem" name="imagem" value="{{ $produto->imagem }}">
            </div>
            <div class="form-group mt-3">
                <label for="valor">Valor do Produto</label>
                <input type="number" class="form-control mt-2" required name="valor" id="valor" value="{{ $produto->valor }}" step="0.01">
            </div>
            <div class="form-group mt-3">
                <label for="categoria_id">Categoria do Produto</label>
                <select name="categoria_id" id="categoria_id" class="form-control mt-2">
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" 
                            {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group mt-3">
                <label for="quantidade">Quantidades em estoque</label>
                <input type="number" class="form-control mt-2" required name="quantidade" id="quantidade" value="{{ $produto->quantidade }}">
            </div>
            <button class="btn btn-primary mt-4"><i class="fa fa-save"></i> Salvar Alterações </button>
        </form>
    </div>
</div>
@endsection