<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Materia;
use App\Models\Calificacion;
use App\models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function dashboard(){
      
        $userId = Auth::id();
        $user = Auth::user();

        // Obtener todas las calificaciones con relaciones
        $calificaciones = Calificacion::all();
   

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


        
        //dd($user->all());
        return view('Estudiantes.vistaGeneral',compact(
        'calificaciones',
        'totalEstudiantes',
        'promedioGeneral',
        'porcentajeAprobados',
        'totalMaterias',
        'estudiantes',
        'materias',
        'user'
    ));
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required | max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        Auth::login($user);

        return redirect(route('dashboard')) ;
    }

    public function iniciarSesion(Request $request) {
       // dd($request->all());

       $request->validate([
           'email' => 'required|email|max:255',
           'password' => 'required',
       ]);

        $credentials = [ 
            "email" => $request->email,
            "password" => $request->password,

        ];

        $remember = ($request->has('remember')? true : false); 

        if(Auth::attempt($credentials,$remember)) 
        {
            $request ->session()->regenerate();

            return redirect(route('dashboard'));
        }else{
            return redirect(route('inicio'));
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }


}
