<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\peternakanController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\priodeController;
use App\Http\Controllers\fcrController;
use App\Http\Controllers\pbbhController;
use Illuminate\Support\Facades\Route;
use App\Livewire\InputData;
use App\Http\Controllers\ExportController;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/',[LoginController::class,'loginView']);
Route::resource('pengguna',UserController::class)->middleware('auth');
Route::resource('user', UserController::class);
Route::resource('password', petugasController::class);
Route::resource('peternakan',peternakanController::class)->middleware('auth');
Route::resource('laporan',LaporanController::class)->middleware('auth');
Route::get('select',[LaporanController::class,'select'])->name('select.select')->middleware('auth');
// Route::get('/laporan/create/{id}', [LaporanController::class, 'create'])->name('laporan.create')->middleware('auth');
// Route::post('/laporan/store/{id}', [LaporanController::class, 'store'])->name('laporan.store')->middleware('auth');

Route::resource('petugas',petugasController::class)->middleware('auth');
Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::resource('priode',priodeController::class)->middleware('auth');
Route::get('/priode/create/{id}', [priodeController::class, 'create'])->name('priode.create')->middleware('auth');
Route::post('/priode/store/{id}', [priodeController::class, 'store'])->name('priode.store')->middleware('auth');

// route::get('/fcr', [fcrController::class, 'create'])->name('fcr.create');
// route::post('/fcr', [fcrController::class, 'store'])->name('fcr.store');
// route::get('/pbbh', [pbbhController::class, 'create'])->name('pbbh.create');
// route::post('/pbbh', [pbbhController::class, 'store'])->name('pbbh.store');


Route::get('laporan/create/{priode_id}', InputData::class)->name('laporan.create')->middleware('auth');


