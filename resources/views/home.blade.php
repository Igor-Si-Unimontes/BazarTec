@extends('admin');
@section('content')
@include('mensagens.mensagem')
    <div class="container mt-5">
        <div class="row">
            <div class="col bg bg-primary p-4 me-3 rounded">
                <img src="{{ asset('img/cart.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">{{ $vendasTotais }} Vendas</h3>
                <p class="text-white">Quantidade de vendas realizadas neste mês</p>
            </div>
            <div class="col bg bg-success p-4 me-3 rounded">
                <img src="{{ asset('img/money.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">R$ {{ $faturados }}</h3>
                <p class="text-white">Valor faturado no mês</p>
            </div>
            <div class="col bg bg-warning p-4 me-3 rounded">
                <img src="{{ asset('img/product.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">{{  $totalProdutosVendidos }} Produtos</h3>
                <p class="text-white">Quantidade de produtos vendidos neste mês</p>
            </div>
            <div class="col bg bg-danger p-4 me-3 rounded">
                <img src="{{ asset('img/stock.svg') }}" alt="" height="40px" width="40px">
                <h3 class="text-white">{{ $estoqueBaixo }} Produtos</h3>
                <p class="text-white">Quantidade de produtos com baixo estoque (Abaixo de 10 unidades)</p>
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
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">
                @if ($vendas->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Anterior</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $vendas->previousPageUrl() }}" rel="prev">Anterior</a>
                    </li>
                @endif
    
                @foreach ($vendas->getUrlRange(1, $vendas->lastPage()) as $page => $url)
                    @if ($page == $vendas->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
    
                @if ($vendas->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $vendas->nextPageUrl() }}" rel="next">Próximo</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Próximo</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endsection