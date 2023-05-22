<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inmueble extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = ['titulo', 'etiquetas', 'descripcion', 'precio', 'ubicacion', 'contacto', 'imagen'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['etiqueta'] ?? false) {
            $query->where('etiquetas', 'like', '%' . request('etiqueta') . '%');
        }

        if ($filters['busqueda'] ?? false) {
            $query->where('titulo', 'like', '%' . request('busqueda') . '%')->orWhere('descripcion', 'like', '%' . request('busqueda') . '%')->orWhere('etiquetas', 'like', '%' . request('busqueda') . '%');
        }
    }

    // Relación Usuarios
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
