<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('vendas.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produtos' => 'required|array',
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        $valorTotalVenda = 0;
        $quantidadeTotalProdutos = 0;

        DB::beginTransaction();

        try {
            $venda = Venda::create([
                'valor_total' => 0,
                'quantidade_total' => 0,
            ]);

            foreach ($request->produtos as $produtoRequest) {
                $produto = Produtos::find($produtoRequest['id']);

                if ($produto->quantidade < $produtoRequest['quantidade']) {
                    return redirect()->back()->with('error', "Estoque insuficiente para o produto: {$produto->nome}");
                }

                $valorUnitario = $produto->valor;
                $quantidade = $produtoRequest['quantidade'];
                $valorTotalProduto = $valorUnitario * $quantidade;

                $produto->decrement('quantidade', $quantidade);

                $venda->produtos()->attach($produto->id, [
                    'quantidade' => $quantidade,
                    'valor_unitario' => $valorUnitario,
                    'valor_total' => $valorTotalProduto,
                ]);

                $valorTotalVenda += $valorTotalProduto;
                $quantidadeTotalProdutos += $quantidade;
            }

            $venda->update([
                'valor_total' => $valorTotalVenda,
                'quantidade_total' => $quantidadeTotalProdutos,
            ]);

            DB::commit();

            return redirect()->route('vendas.index')->with('success', 'Venda realizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao processar a venda: ' . $e->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
