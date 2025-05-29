<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['id', 'nombre'];
    public $timestamps = false;

    public function bodegas()
    {
        return $this->hasMany(Bodegas::class, 'id_empresa', 'id');
    }
}