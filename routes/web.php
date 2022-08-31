<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Models\Todo;
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




Route::get('/', [TodosController::class, 'home'])->name('/');
Route::get('/todos', [TodosController::class, 'index'])->name('todos');
Route::get('/new-todo', [TodosController::class, 'create'])->name('new-todo');
Route::post('/store-todo', [TodosController::class, 'store'])->name('store-todo');
Route::get('/todos/{todoId}', [TodosController::class, 'show'])->name('show');
Route::get('/edit/{id}', [TodosController::class, 'edit'])->name('edit-todo');
Route::post('/update-todo/{id}', [TodosController::class, 'update'])->name('update-todo');
Route::post('/delete-todo/{id}', [TodosController::class, 'destroy'])->name('delete-todo');
Route::get('/complete-todo/{id}', [TodosController::class, 'complete'])->name('complete-todo');
Route::get('/completed', [TodosController::class, 'todoCompleted'])->name('completed');


//Route::get('/completed',function(){
//    return view('completed')->with('todos',Todo::all());
//})->name('complete');
