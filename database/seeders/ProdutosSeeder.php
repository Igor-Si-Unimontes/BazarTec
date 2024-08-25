<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produtos;
use App\Models\Categorias;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Encontre as categorias que você deseja vincular os produtos
        $categoriaEletronicos = Categorias::where('codigo', 'ELE001')->first();
        $categoriaLivros = Categorias::where('codigo', 'LIV002')->first();

        // Adicione produtos para cada categoria
        Produtos::create([
            'nome' => 'Smartphone',
            'imagem' => 'smartphone.jpg',
            'valor' => 1000.00,
            'categoria_id' => $categoriaEletronicos->id, // Corrigido para usar 'categoria_id'
            'quantidade' => 50,
        ]);

        Produtos::create([
            'nome' => 'Livro de PHP',
            'imagem' => 'php-book.jpg',
            'valor' => 50.00,
            'categoria_id' => $categoriaLivros->id, // Corrigido para usar 'categoria_id'
            'quantidade' => 100,
        ]);

        // Adicione mais produtos conforme necessário
    }
}
