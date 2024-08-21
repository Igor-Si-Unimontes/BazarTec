<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['valor_total', 'quantidade_total'];

    public function produtos()
    {
        return $this->belongsToMany(Produtos::class, 'produto_venda')
                    ->using(ProdutoVenda::class)
                    ->withPivot('quantidade', 'valor_unitario', 'valor_total')
                    ->withTimestamps();
    }
}
