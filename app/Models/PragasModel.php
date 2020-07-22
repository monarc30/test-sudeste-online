<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PragasModel extends Model
{
    protected $table = "pragas";
    protected $fillable = [
        'name',
        'created_at',
        'update_at,'
    ];

    public function pragas() {
        return $this->hasOne(Dosagens::class, 'idpraga','id');
    }
}
