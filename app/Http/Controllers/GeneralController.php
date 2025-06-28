<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Materia;
use App\Models\Calificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function index(){

        $userId = Auth::id();

        $calificaciones =   Calificacion::all();
     
        // Obtener todas las calificaciones con relaciones
       
        $estudiantes = Student::all();
        $materias = Materia::all();

        // Total de estudiantes únicos calificados
        $totalEstudiantes = $estudiantes->count();

        // Promedio general de las notas
        $promedioGeneral = $calificaciones->avg('nota');

        // Porcentaje de aprobados (nota >= 51)
        $totalNotas = $calificaciones->count();
        $aprobados = $calificaciones->where('nota', '>=', 51)->count();
        $porcentajeAprobados = $totalNotas > 0 ? round(($aprobados / $totalNotas) * 100, 2) : 0;

        // Total de materias distintas calificadas
        $totalMaterias = $calificaciones->pluck('materia_id')->unique()->count();
       // dd($totalMaterias,$calificaciones);

       // dd($calificaciones, $totalEstudiantes, $promedioGeneral, $porcentajeAprobados, $totalMaterias);
        return view('Estudiantes.vistaGeneral', compact(
            'calificaciones',
            'totalEstudiantes',
            'promedioGeneral',
            'porcentajeAprobados',
            'totalMaterias',
            'estudiantes',
            'materias'
        ));
    }
}
