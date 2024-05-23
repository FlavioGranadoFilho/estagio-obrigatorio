<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $primaryKey = 'produto_id';

    protected $fillable = [
        'produto_nome',
        'produto_descricao',
        'produto_quantidade_estoque',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'categoria_id', 'categoria_id');
    }

    public function entradas()
    {
        return $this->hasMany(EntradaEstoque::class, 'produto_id', 'produto_id');
    }

    public function saidas()
    {
        return $this->hasMany(SaidaEstoque::class, 'produto_id', 'produto_id');
    }

}