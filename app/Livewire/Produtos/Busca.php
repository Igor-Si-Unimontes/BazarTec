<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\Categorias;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Produto;
use App\Models\Produtos;

class Busca extends Component
{
    use WithPagination;
    
    protected $queryString = [
        'category' => ['except' => ''],
        'name' => ['except' => ''],
    ];
    
    public $category = "";
    public $name = "";
    public $categorias = [];
    public $perPage = 10;

    public function mount()
    {
        $this->categorias = Categorias::all();
    }

    public function render()
    {
        $produtos = Produtos::query()
            ->select('produtos.*')
            ->when(!empty($this->name), function($query) {
                $query->where('nome', 'like', '%'.$this->name.'%');
            })
            ->when(!empty($this->category), function($query) {
                $query->where('categoria_id', '=', $this->category);
            })
            ->orderBy('nome')
            ->paginate($this->perPage);

        return view('livewire.produtos.busca', [
            'produtos' => $produtos,
            'categorias' => $this->categorias
        ]);
    }

    public function updated($property)
    {
        $this->resetPage();
    }
}
