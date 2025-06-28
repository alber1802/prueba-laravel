<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'califications';
    
    protected $fillable = ['student_id', 'materia_id', 'user_id', 'nota'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class); // Relación inversa a estudiante
    }

    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class); // Relación inversa a materia
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // Relación inversa a profesor
    }
}
