<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderadores extends Model
{
    protected $table = 'moderadores';
    protected $fillable = ['id', 'id_usuario', 'id_bodega'];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodegas::class, 'id_bodega', 'id');
    }
}