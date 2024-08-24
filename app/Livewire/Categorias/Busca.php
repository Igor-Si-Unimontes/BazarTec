<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use App\Models\Categorias;
use Livewire\Component;
use Livewire\WithPagination;

class Busca extends Component
{

    public string $code = '';
    public string $nome = '';

    public function render()
    {
        return view('livewire.categorias.busca', [
            'categorias' => \App\Models\Categorias::query()
            ->when($this->code, function ($query) {
                $query->where('codigo', 'like', "%{$this->code}%");
            })
            ->when($this->nome, function ($query) {
                $query->where('nome', 'like', "%{$this->nome}%");
            })->get(),
    ]);
}

}
