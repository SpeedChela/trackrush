<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    protected $table = 'entidades';
    protected $fillable = ['id', 'id_pais', 'nombre', 'status'];
    public $timestamps = false;

    public function pais()
    {
        return $this->belongsTo(Paises::class, 'id_pais', 'id');
    }

    public function municipios()
    {
        return $this->hasMany(Municipios::class, 'id_entidad', 'id');
    }
}