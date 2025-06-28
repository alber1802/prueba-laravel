<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();
    
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
    
        if ($request->has('ci') && $request->ci != '') {
            $query->where('ci', $request->ci);
        }
    
        if ($request->has('email') && $request->email != '') {
            $query->where('email', $request->email);
        }
    
        if ($request->has('fecha') && $request->fecha != '') {
            $query->whereDate('created_at', $request->fecha);
        }
    
        $estudiantes = $query->orderBy('id', 'desc')->paginate(10);

        //dd($estudiantes);
    
        return view('Estudiantes.AgregarEstudiantes', compact('estudiantes'));
    
    }

    public function actualizar(Student $student)
    {
        $query = Student::query();  
        $estudiantes=$query->orderBy('id', 'desc')->paginate(10);
        return view('Estudiantes.AgregarEstudiantes', compact('student','estudiantes'));
    }
    
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'ci' => 'required|numeric|min:8|max:8',
            'email' => 'required|email',
            'foto' => 'nullable', // Validación de imagen
        ]);
    
        $data = $request->except('foto');
     
        if ($request->has('foto')) {
            
            $path = $request->file('foto')->store('students', 'public');
            $data['foto'] = $path;
        }
      
        Student::create($data);
    
        return redirect()->route('AgregarEstudiantes.index')
            ->with('success', 'Estudiante registrado exitosamente');
    }

    public function update(Student $student, Request $request)
    { 
       // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'ci' => 'required|numeric',
            'email' => 'required|email',
            'foto' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ]);
      
        $data = $request->except('foto');
        
        if ($request->hasFile('foto')) {

            if($student->foto){
                Storage::disk('public')->delete($student->foto);  
            }     

            $path = $request->file('foto')->store('students', 'public');
            $data['foto'] = $path;
        }
        
        $student->update($data);
        
        return redirect()->route('AgregarEstudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente');
    }

    public function destroy(Student $student)
    {
       
        if($student->foto){
           
            Storage::disk('public')->delete($student->foto);
            
        }
        $student->delete();
        return redirect()->route('AgregarEstudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente');
    }
}
