<?php


use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatistikController;
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
Route::get('/berita/search', [BeritaController::class, 'search']);
Route::get('/lokasi/search', [LokasiController::class, 'search']);
//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    
    Route::resource('/lokasi', LokasiController::class);
    Route::resource('/berita', BeritaController::class)->except(['show']);
    
    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::resource('/lokasi', LokasiController::class)->only(['store', 'index']);
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::resource('/berita', BeritaController::class)->only(['index'])->except(['show']);
Route::get("/statistik/covid", [StatistikController::class, 'getStatistikCovid']);
Route::get("/statistik/vaksin", [StatistikController::class, 'getStatistikVaksinasi']);

