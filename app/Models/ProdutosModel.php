<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutosModel extends Model
{
    protected $table = "produtos";
    protected $fillable = [
        'name',
        'created_at',
        'update_at,'
    ];

    public function dosagens() {
        return $this->hasOne(DosagensModel::class, 'idproduto','id');
    }
}


