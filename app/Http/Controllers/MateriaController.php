<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use Illuminate\Support\Facades\Storage;

class MateriaController extends Controller
{
    public function index(Request $request)
    {
        $query = Materia::query();
        
        // Aplicar filtros
    
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        
        $subjects = $query->orderBy('id','desc')->paginate(10);
        
        return view('Estudiantes.AgregarMateria', compact('subjects'));
    }
    
    public function edit(Request $request ,Materia $materia)
    {
        $query = Materia::query();
        $subjects = $query->orderBy('id','desc')->paginate(10);
        return view('Estudiantes.AgregarMateria', compact('materia', 'subjects'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:materias',
            'description' => 'required|string',
        ]);
        
        Materia::create($request->all());
        
        return redirect()->route('materias.index')
            ->with('success', 'Materia creada exitosamente');
    }
    
 
    
    public function update(Request $request, Materia $materia)
    {
       
        $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'required|string',
        ]);
       
        $materia->update($request->all());
        
        return redirect()->route('materias.index')
            ->with('success', 'Materia actualizada exitosamente');
    }
    
    public function destroy(Materia $materia)
    {
        $materia->delete();
        
        return redirect()->route('materias.index')
            ->with('success', 'Materia eliminada exitosamente');
    }
}
