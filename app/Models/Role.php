<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Relación con usuario (muchos a muchos)

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
