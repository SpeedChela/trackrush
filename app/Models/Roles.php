<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id', 'rol'];
    public $timestamps = false;

    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'id_rol', 'id');
    }
}