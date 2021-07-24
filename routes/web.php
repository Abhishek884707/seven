<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database',[UserController::class,'getElequent']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/upload', function () {
    // dd(request()->all());
    // dd(request()->image);
    // dd(request()->file('image'));
    // dd(request()->hasFil`e('image'));
    // request()->image->store('images','public');
    // return "Uploadedddddd";
// });

// Route::middleware('auth')->group(function(){
    Route::get('/todos',[TodoController::class,'index'])->name('todo.index');
    Route::get('/todos/create',[TodoController::class,'create']);
    Route::get('/todos/{id}/edit',[TodoController::class,'edit']);
    // Route::get('/todos/{id:title}/edit',[TodoController::class,'edit']);
    Route::post('/todos/create',[TodoController::class,'store']);
    Route::patch('/todos/{id}/update',[TodoController::class,'update'])->name('todo.update');
    Route::put('todos/{delete}/delete',[TodoController::class,'delete'])->name('todo.delete');
// });

Route::post('/upload',[UserController::class,'upload']);

Route::get('todos/{todo}/show',[TodoController::class,'show'])->name('todo.show');

Route::put('todos/{complete}/completed',[TodoController::class,'completed'])->name('todo.completed');

Route::put('todos/{incomplete}/incompleted',[TodoController::class,'inCompleted'])->name('todo.incompleted');

