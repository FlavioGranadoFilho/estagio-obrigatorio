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
        'categoria_id',
        'produto_serial_number',
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

    public function getQuantidadeDisponivelAttribute()
    {
        $quantidade_entradas = $this->entradas->sum('entradas_estoque_quantidade');
        $quantidade_saidas = $this->saidas->sum('saidas_estoque_quantidade');
        return $quantidade_entradas - $quantidade_saidas;
    }

    public function podeSair($quantidade)
    {
        return $this->quantidade_disponivel >= $quantidade;
    }

}
