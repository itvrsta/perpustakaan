<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksAuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/authors', [AuthorsController::class, 'index'])->name('authors.index');
//Route::get('/authors/create', [AuthorsController::class, 'create'])->name('authors.create');
//Route::post('/authors', [AuthorsController::class, 'store'])->name('authors.store');
//Route::get('/authors/{id}/edit', [AuthorsController::class, 'edit'])->name('authors.edit');
//Route::put('/authors/{id}', [AuthorsController::class, 'update'])->name('authors.update');
//Route::delete('/authors/{id}', [AuthorsController::class, 'destroy'])->name('authors.destroy');

Route::resource('authors', AuthorsController::class)->middleware('auth');
Route::resource('publisher', PublisherController::class);
Route::resource('books', BooksController::class);
Route::resource('authors_id', BooksAuthorController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
