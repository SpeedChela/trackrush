<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    protected $table = 'rutas';
    protected $fillable = ['id', 'zona', 'cp'];
    public $timestamps = false;

    public function drivers()
    {
        return $this->hasMany(Drivers::class, 'id_ruta', 'id');
    }
}