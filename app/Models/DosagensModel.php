<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosagensModel extends Model
{
    protected $table = "dosagens";
    protected $fillable = [
        'idproduto',
        'idcultura',
        'idpraga',
        'dosagem',
        'created_at',
        'update_at,'
    ];


    public function produtos() {
        return $this->belongsTo(ProdutosModel::class, 'idproduto','id');
    }

    public function culturas() {
        return $this->belongsTo(CulturasModel::class, 'idcultura','id');
    }

    public function pragas() {
        return $this->belongsTo(PragasModel::class, 'idpraga','id');
    }

}
