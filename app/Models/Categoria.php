<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $primaryKey = 'categoria_id';

    protected $fillable = [
        'categoria_nome',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_id', 'categoria_id');
    }

}