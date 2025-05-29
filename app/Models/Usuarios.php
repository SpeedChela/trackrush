<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['id', 'Nombre', 'Ap_pat', 'Ap_mat', 'correo', 'contraseña', 'id_rol', 'id_municipio'];
    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo(Roles::class, 'id_rol', 'id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipios::class, 'id_municipio', 'id');
    }

    public function moderadores()
    {
        return $this->hasMany(Moderadores::class, 'id_usuario', 'id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculos::class, 'id_usuario', 'id');
    }
}