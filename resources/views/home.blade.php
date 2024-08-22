@extends('admin');
@section('content')
@include('mensagens.mensagem')
    <div class="container mt-5">
        <div class="row">
            <div class="col bg bg-primary p-4 me-3 rounded">
                <img src="{{ asset('img/cart.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">30 Vendas</h3>
                <p class="text-white">Quantidade de vendas realizadas neste mês</p>
            </div>
            <div class="col bg bg-success p-4 me-3 rounded">
                <img src="{{ asset('img/money.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">R$ 30 Faturados</h3>
                <p class="text-white">Valor faturado no mês</p>
            </div>
            <div class="col bg bg-warning p-4 me-3 rounded">
                <img src="{{ asset('img/product.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">30 Produtos</h3>
                <p class="text-white">Quantidade de produtos vendidos neste mês</p>
            </div>
            <div class="col bg bg-danger p-4 me-3 rounded">
                <img src="{{ asset('img/stock.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">30 Produtos</h3>
                <p class="text-white">Quantidade de produtos com baixo estoque</p>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <table class="table shadow-sm table-bordered table-hover table-sm mt-3" style="margin-left: -10px;">
            <thead>
                <tr class="text-center">
                    <th style="width: 5%;">ID</th>
                    <th style="width: 20%;">Produto</th>
                    <th style="width: 15%;">Quantidade</th>
                    <th style="width: 15%;">Valor Unitário</th>
                    <th style="width: 15%;">Valor Total</th>
                    <th style="width: 15%;">Data de Venda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                <tr>
                    <td class="text-center align-middle">{{ $venda->id }}</td>
                    <td class="text-center align-middle">{{ $venda->produto->nome }}</td>
                    <td class="text-center align-middle">{{ $venda->quantidade }}</td>
                    <td class="text-center align-middle">R${{ $venda->valor_unitario }}</td>
                    <td class="text-center align-middle">R${{ $venda->valor_total }}</td>
                    <td class="text-center align-middle">{{ \Carbon\Carbon::parse($venda->created_at)->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection