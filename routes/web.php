<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaddingController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\PrincipalController;

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

//Route::post('readding', [ReaddingController::class, 'readding'])->name('readding');
//Route::post('import', [ExcelImportController::class, 'import'])->name('import');
Route::post('mainTigger', [PrincipalController::class, 'mainTigger'])->name('mainTigger');