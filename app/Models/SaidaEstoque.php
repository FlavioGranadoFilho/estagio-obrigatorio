<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaidaEstoque extends Model
{
    use HasFactory;

    protected $table = 'saidas_estoque';
    
    protected $primaryKey = 'saidas_estoque_id';

    protected $fillable = [
        'saidas_estoque_quantidade',
        'saidas_estoque_data_saida',
        'saidas_estoque_observacao',
        'produto_id',
        'user_id',
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class, 'produto_id', 'produto_id');
    }
}
