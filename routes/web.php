<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Calificaciones\CalificacionesController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\GeneralController;




//para la parte de bienvenida
Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');


Route::prefix('/Auth')->group(function(){

    //ruta para vista e login
    Route::get('/login',[LoginController::class, 'login'])->name('login');
    //ruta para vista de registro
    Route::view('/register','register')->name('register');
});


//ruta protegida para acceder al dashboard
Route::get('/dashboard',[LoginController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


//ruta para cerrar sesion
Route::get('/logout',[LoginController::class, 'logout'])->middleware(['auth'])->name('logout');



//ruta para registrar un nuevo usuario
Route::post('/registrase',[LoginController::class, 'register'])->name('registrase');

//ruta para iniciar sesion
Route::post('/iniciarSesion',[LoginController::class, 'iniciarSesion'])->name('iniciarSesion');





Route::prefix('/Calificaciones')->middleware('auth')->group(function(){

    Route::get('/AgregarCalificaciones',[CalificacionesController::class, 'index'])->name('AgregarCalificaciones');

    Route::post('/Agregar',[CalificacionesController::class, 'store'])->name('Agregar');
});



Route::prefix('/inicio')->middleware('auth')->group(function(){

    //vista de la pagina de estudientes  
    Route::get('/General',[GeneralController::class, 'index'])->name('General');
});


//Route::view('/AgregarEstudiantes','Estudiantes.AgregarEstudiantes')->name('AgregarEstudiantes');


Route::prefix('/Estudiantes')->middleware('auth')->group(function(){

    Route::get('/AgregarEstudiantes',[EstudianteController::class, 'index'])->name('AgregarEstudiantes.index');
    
    Route::get('/AgregarEstudiantes/{student}',[EstudianteController::class, 'actualizar'])->name('AgregarEstudiantes.actualizar');
    //actualizar datos  
    Route::put('/AgregarEstudiantes/{student}',[EstudianteController::class, 'update'])->name('AgregarEstudiantes.update');
    Route::post('/AgregarEstudiantes',[EstudianteController::class, 'store'])->name('AgregarEstudiantes.store');
   
    Route::delete('/AgregarEstudiantes/{student}',[EstudianteController::class, 'destroy'])->name('AgregarEstudiantes.destroy');

});

Route::prefix('/Materias')->middleware('auth')->group(function(){

    Route::get('/index',[MateriaController::class, 'index'])->name('materias.index');

    Route::get('/edit/{materia}',[MateriaController::class, 'edit'])->name('materias.edit');

    Route::post('/store',[MateriaController::class, 'store'])->name('materias.store');

    Route::put('/update/{materia}',[MateriaController::class, 'update'])->name('materias.update');

    Route::delete('/destroy/{materia}',[MateriaController::class, 'destroy'])->name('materias.destroy');
});
