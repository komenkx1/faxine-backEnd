<?php


use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('/lokasi', LokasiController::class);

    Route::get('/berita', [BeritaController::class, 'index']);
    Route::get('/berita/{berita}', [BeritaController::class, 'show']);
    Route::put('/berita/{berita}', [BeritaController::class, 'update']);
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy']);
    Route::post('/berita', [BeritaController::class, 'store']);
    // Route::resource('/c/berita', BeritaController::class);


    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
