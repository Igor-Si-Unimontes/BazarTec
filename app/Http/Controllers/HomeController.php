<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\ProdutoVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataInicio = now()->subDays(30);
        $totalProdutosVendidos = ProdutoVenda::whereBetween('created_at', [$dataInicio, now()])->sum('quantidade');
        $faturados = Venda::whereBetween('created_at', [$dataInicio, now()])->sum('valor_total');
        $vendasTotais = Venda::whereBetween('created_at', [$dataInicio, now()])->count('id');
        $estoqueBaixo = Produtos::where('quantidade', '<', 10)->count();
        $vendas = ProdutoVenda::with('produto')
        ->whereBetween('created_at', [$dataInicio, now()])
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('home',  ['vendas' => $vendas ,'totalProdutosVendidos' => $totalProdutosVendidos, 'faturados' => $faturados,
        'vendasTotais' => $vendasTotais, 'estoqueBaixo' => $estoqueBaixo]);
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
        //
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
