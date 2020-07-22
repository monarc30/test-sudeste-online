<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CulturasModel extends Model
{
    protected $table = "culturas";
    protected $fillable = [
        'name',
        'created_at',
        'update_at,'
    ];

    public function culturas() {
        return $this->hasOne(Dosagens::class, 'idcultura','id');
    }
}
