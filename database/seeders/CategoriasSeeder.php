<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorias;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Verifica se a categoria já existe antes de inserir
        if (!Categorias::where('codigo', 'ELE001')->exists()) {
            Categorias::create([
                'nome' => 'Eletrônicos',
                'codigo' => 'ELE001',
                'icone' => 'fa-tv',
                'descricao' => 'Aparelhos eletrônicos e gadgets.'
            ]);
        }

        if (!Categorias::where('codigo', 'LIV002')->exists()) {
            Categorias::create([
                'nome' => 'Livros',
                'codigo' => 'LIV002',
                'icone' => 'fa-book',
                'descricao' => 'Livros e materiais de leitura.'
            ]);
        }

        // Adicione mais categorias conforme necessário
    }
}
