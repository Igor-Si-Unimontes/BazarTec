<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


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
        $produtos = json_decode($request->input('produtos'), true);

        Log::info('Produtos recebidos:', ['produtos' => $produtos]);
    
        Validator::make(['produtos' => $produtos], [
            'produtos' => 'required|array',
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
            'produtos.*.valor_unitario' => 'required|numeric|min:0.01',
            'produtos.*.valor_total' => 'required|numeric|min:0.01',
        ])->validate();
    
        DB::beginTransaction();
    
        try {
            $venda = Venda::create([
                'valor_total' => 0,
                'quantidade_total' => 0,
            ]);
    
            Log::info('Venda criada:', ['venda' => $venda]);
    
            $valorTotalVenda = 0;
            $quantidadeTotalProdutos = 0;
    
            foreach ($produtos as $produtoRequest) {
                $produto = Produtos::find($produtoRequest['id']);
    
                Log::info('Produto encontrado:', ['produto' => $produto]);
    
                if ($produto->quantidade < $produtoRequest['quantidade']) {
                    DB::rollBack();
                    return redirect()->back()->with('error', "Estoque insuficiente para o produto: {$produto->nome}, quantidades restantes: {$produto->quantidade}");
                }
    
                $produto->decrement('quantidade', $produtoRequest['quantidade']);
    
                $venda->produtos()->attach($produto->id, [
                    'quantidade' => $produtoRequest['quantidade'],
                    'valor_unitario' => $produtoRequest['valor_unitario'],
                    'valor_total' => $produtoRequest['valor_total'],
                ]);
    
                Log::info('Produto adicionado à venda:', [
                    'venda_id' => $venda->id,
                    'produto_id' => $produto->id,
                    'quantidade' => $produtoRequest['quantidade'],
                    'valor_unitario' => $produtoRequest['valor_unitario'],
                    'valor_total' => $produtoRequest['valor_total']
                ]);
    
                $valorTotalVenda += $produtoRequest['valor_total'];
                $quantidadeTotalProdutos += $produtoRequest['quantidade'];
            }
    
            $venda->update([
                'valor_total' => $valorTotalVenda,
                'quantidade_total' => $quantidadeTotalProdutos,
            ]);
    
            Log::info('Venda atualizada:', ['venda' => $venda]);
    
            DB::commit();
    
            return redirect()->route('vendas.index')->with('success', 'Venda realizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao processar a venda:', ['error' => $e->getMessage()]);
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
