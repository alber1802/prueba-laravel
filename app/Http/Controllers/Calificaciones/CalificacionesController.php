<?php

namespace App\Http\Controllers\Calificaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Materia;
use App\Models\Calificacion;
use Illuminate\Support\Facades\Auth;

class CalificacionesController extends Controller
{
    
    public function index()
    {
        $estudiantes = Student::all();
        $materias = Materia::all();

        //dd($estudiantes, $materias);

        return view('Estudiantes.AgregarCalificaciones', compact('estudiantes', 'materias'));
    }
    
    public function store(Request $request)
    {
      
        $request->validate([
            'student_id' => 'required',
            'materia_id' => 'required',
            'nota' => 'required|numeric|min:31|max:100',
        ]);

        $calificacion = new Calificacion([
            'student_id' => $request->student_id,
            'materia_id' => $request->materia_id,
            'user_id' => Auth::user()->id,
            'nota' => $request->nota,
        ]);

        $calificacion->save();

        return redirect()->route('AgregarCalificaciones')->with('success', 'Calificación agregada exitosamente');
    }



    
    



}
