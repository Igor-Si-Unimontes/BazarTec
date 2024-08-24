<?php

namespace App\Http\Controllers;

use App\Models\ProdutoVenda;
use App\Models\Produtos;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class ProdutoVendaController extends Controller
{
    public function downloadPdf(ProdutoVenda $event)
    {
        $vendas = ProdutoVenda::all();

        $pdf = Pdf::loadView('relatorios.vendas', compact('vendas'));

        return $pdf->download('relatorio-todas-vendas-produtos.pdf');
    }
    public function PdfProduto(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
        ]);
        $produto = Produtos::findOrFail($request->produto_id);

        $produtoVendas = ProdutoVenda::where('produtos_id', $request->produto_id)->get();

        $pdf = Pdf::loadView('relatorios.vendaProduto', [
            'produtoVendas' => $produtoVendas,
            'produtoNome' => $produto->nome,
        ]);
        return $pdf->download('relatorio-venda-produto-' . $request->produto_id . '.pdf');
    }
    public function buscarVendaProduto()
    {
        $produtos = Produtos::all(); 
        return view('relatorios.buscarVendaProduto', compact('produtos'));
    }
}
