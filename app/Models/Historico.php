<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';
    protected $fillable = ['id', 'fecha_entrada', 'fecha_salida', 'id_estatus', 'comentarios'];
    public $timestamps = false;

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'id_estatus', 'id');
    }

    public function asignarRutas()
    {
        return $this->hasMany(Asignar_ruta::class, 'id_historico', 'id');
    }

    public function entregas()
    {
        return $this->hasMany(Entregas::class, 'id_historico', 'id');
    }
}