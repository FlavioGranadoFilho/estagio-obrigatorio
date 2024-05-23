<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaEstoque extends Model
{
    use HasFactory;

    protected $table = 'entradas_estoque';

    protected $primaryKey = 'entradas_estoque_id';

    protected $fillable = [
        'entradas_estoque_quantidade',
        'entradas_estoque_data_entrada',
        'entradas_estoque_observacao',
        'produto_id',
        'user_id',
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class, 'produto_id', 'produto_id');
    }
}
