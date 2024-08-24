@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <h1>Gerar Relatório PDF</h1>
            </div>
            <form action="{{ route('vendas.PdfProduto') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="produto_id">Selecione o Produto:</label>
                    <select name="produto_id" id="produto_id" class="form-control">
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Gerar Relatório PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
