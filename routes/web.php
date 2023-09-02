<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",[CrudController::class,"index"])->name("index");

// ruta para añadir un nueva persona
Route::post("/registrar-personal",[CrudController::class,"create"])->name("create");

// ruta para editar el personal
Route::post("/modificar-personal", [CrudController::class,"update"])->name("update");

// ruta para eliminar personal
Route::get("/eliminar-personal-{id}", [CrudController::class,"delete"])->name("delete");
