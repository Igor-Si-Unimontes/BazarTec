<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'codigo',
        'icone',
        'descricao'
    ];

    public function produtos()
    {
        return $this->hasMany(Produtos::class, 'categoria_id');
    }
}
