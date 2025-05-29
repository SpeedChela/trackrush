<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignar_ruta extends Model
{
    protected $table = 'asignar_ruta';
    protected $fillable = ['id', 'id_driver', 'id_historico'];
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Drivers::class, 'id_driver', 'id');
    }

    public function historico()
    {
        return $this->belongsTo(Historico::class, 'id_historico', 'id');
    }
}