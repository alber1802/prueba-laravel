<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'ci','foto'];

    public function calificacions(): HasMany
    {
        return $this->hasMany(Calificacion::class); // Un estudiante tiene muchas notas
    }
}
