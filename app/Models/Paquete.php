<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paquete extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'paquetes';

    protected $fillable = [
        'codigo',
        'peso',
        'dimensiones',
        'descripcion',
        'estatus_id',
        'ruta_id',
        'bodega_origen_id',
        'bodega_destino_id'
    ];

    protected $casts = [
        'peso' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    // Relaciones
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'ruta_id');
    }

    public function bodegaOrigen()
    {
        return $this->belongsTo(Bodega::class, 'bodega_origen_id');
    }

    public function bodegaDestino()
    {
        return $this->belongsTo(Bodega::class, 'bodega_destino_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estatus_id', 1);
    }

    public function scopeEnRuta($query)
    {
        return $query->whereNotNull('ruta_id');
    }

    // Mutadores
    public function setCodigoAttribute($value)
    {
        $this->attributes['codigo'] = strtoupper($value);
    }

    // Accesores
    public function getEstadoActualAttribute()
    {
        return $this->estatus ? $this->estatus->nombre : 'Sin estado';
    }

    public function getRutaActualAttribute()
    {
        return $this->ruta ? $this->ruta->nombre : 'Sin ruta asignada';
    }
} 