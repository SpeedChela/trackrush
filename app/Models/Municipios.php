<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    protected $fillable = ['id', 'id_entidad', 'nombre', 'status'];
    public $timestamps = false;

    public function entidad()
    {
        return $this->belongsTo(Entidades::class, 'id_entidad', 'id');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'id_municipio', 'id');
    }
}