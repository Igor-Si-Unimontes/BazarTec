<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProdutoVenda extends Pivot
{
    protected $table = 'produto_venda';

    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'valor_unitario',
        'valor_total',
    ];
}
