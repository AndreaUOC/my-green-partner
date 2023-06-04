<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

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
//Routes to the app
Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/database', [PlantController::class, 'database'])->name('database');;
Route::get('about', [AppController::class, 'about'])->name('about');;
Route::get('application', [PlantController::class, 'tableApp'])->name('plantTable');


//Routes to the Community 
Route::resource('questions', QuestionController::class);
Route::resource('answers', AnswerController::class, ['except' => ['index', 'create', 'show']]);
Route::get('/community', [QuestionController::class, 'index'])->name('index');


//Routes to the auth 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
