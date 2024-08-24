<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Vendas do Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            line-height: 1.6;
        }
        .content h2 {
            margin: 0 0 10px 0;
            padding: 0;
            border-bottom: 1px solid #333;
        }
        .content p {
            margin: 0 0 10px 0;
            padding: 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Relatório de Vendas do Produto {{ $produtoNome }}</h1>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade Vendida</th>
                        <th>Valor Unitário</th>
                        <th>Valor Total</th>
                        <th>Data da Venda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtoVendas as $venda)
                        <tr>
                            <td>{{ $venda->produto->nome }}</td>
                            <td>{{ $venda->quantidade }}</td>
                            <td>{{ $venda->valor_unitario }}</td>
                            <td>{{ $venda->valor_total }}</td>
                            <td>{{ \Carbon\Carbon::parse($venda->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>PDF gerado por Igor Vitorio</p>
        </div>
    </div>
</body>
</html>
