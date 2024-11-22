<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//CRUD ROUTES
Route::get('/',   [TaskController::class, 'index'])->name('home');
Route::get('/project-create',   [ProjectController::class, 'create'])->name('project.create');
Route::get('/view-project',   [ProjectController::class, 'index'])->name('all.project');
Route::get('/task-create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/task-edit/{id}',   [TaskController::class, 'edit'])->name('task.edit');


