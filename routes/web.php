<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Student\StudentController;
use App\Http\Controllers\Modules\Student\MarkController;

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
    return view('Modules.welcome');
})->name('welcome');
Route::group(['prefix' => 'student/',  'as'=> 'student.'], function () {
    Route::get('index',[StudentController::class,'index'])->name('index');
    Route::get('create',[StudentController::class,'create'])->name('create');
    Route::post('store',[StudentController::class,'store'])->name('store');
    Route::get('show',[StudentController::class,'show'])->name('show');
    Route::get('edit',[StudentController::class,'edit'])->name('edit');
    Route::post('update',[StudentController::class,'update'])->name('update');
    Route::get('delete',[StudentController::class,'delete'])->name('delete');
});

Route::group(['prefix' => 'mark/',  'as'=> 'mark.'], function () {
    Route::get('index',[MarkController::class,'index'])->name('index');
    Route::get('create',[MarkController::class,'create'])->name('create');
    Route::post('store',[MarkController::class,'store'])->name('store');
    Route::get('show',[MarkController::class,'show'])->name('show');
    Route::get('edit',[MarkController::class,'edit'])->name('edit');
    Route::post('update',[MarkController::class,'update'])->name('update');
    Route::get('delete',[MarkController::class,'delete'])->name('delete');
});