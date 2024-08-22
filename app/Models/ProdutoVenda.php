<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProdutoVenda extends Pivot
{
    protected $table = 'produto_venda';

    protected $fillable = [
        'venda_id',
        'produtos_id',
        'quantidade',
        'valor_unitario',
        'valor_total',
    ];
    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'produtos_id');
    }
}
