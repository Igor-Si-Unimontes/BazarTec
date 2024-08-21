<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'imagem',
        'valor',
        'categoria',
        'quantidade'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
    public function vendas()
    {
        return $this->belongsToMany(Venda::class, 'produto_venda')
                    ->withPivot('quantidade', 'valor_unitario', 'valor_total')
                    ->withTimestamps();
    }
}
