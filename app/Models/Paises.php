<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'paises';
    protected $fillable = ['id', 'nombre', 'clave', 'estatus'];
    public $timestamps = false;

    public function entidades()
    {
        return $this->hasMany(Entidades::class, 'id_pais', 'id');
    }
}