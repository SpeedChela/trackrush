<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bodegas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bodegas';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'municipio_id',
        'estatus_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    // Relaciones
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class);
    }

    public function paquetesOrigen()
    {
        return $this->hasMany(Paquetes::class, 'bodega_origen_id');
    }

    public function paquetesDestino()
    {
        return $this->hasMany(Paquetes::class, 'bodega_destino_id');
    }

    // Scopes
    public function scopeActivas($query)
    {
        return $query->where('estatus_id', 1);
    }

    // Accesores
    public function getUbicacionCompletaAttribute()
    {
        return "{$this->direccion}, {$this->municipio->nombre}, {$this->municipio->entidad->nombre}";
    }

    public function getEstadoActualAttribute()
    {
        return $this->estatus ? $this->estatus->nombre : 'Sin estado';
    }
}