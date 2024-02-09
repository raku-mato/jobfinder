<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AboutController;

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

// BUAT ROUTE UNTUK MENGARAHKAN KE HALAMAN DEPAN WEBSITE
Route::get('/', [FrontEndController::class, 'index']);

// CRUD About

// C -> Create Data
// mengarahkan ke halaman form untuk menambah data about
Route::get('/about/create',[AboutController::class,"create"]);

// memasukan data about ke dalam database
Route::post('/about',[AboutController::class,"store"]);

// R - Read Data
// menampilkan seluruh data about
Route::get('/about',[AboutController::class,"index"]);

// menampilkan data about berdasarkan id
Route::get('/about/{id}',[AboutController::class,"show"]);

// U - Update Data
// mengarahkan ke halaman update about
Route::get('/about/{id}/edit',[AboutController::class,"edit"]);

//Mengubah data ke database berdasarkan Id
Route::put('/about/{id}',[AboutController::class,"update"]);

// D - Delete Data
// menghapus data dari database berdasarkan Id
Route::delete('/about/{id}',[AboutController::class,"destroy"]);

// CRUD Film
// Route::resource('film', FilmController::class);