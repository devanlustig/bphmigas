<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsosiasiKapalController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\LintasanOperasiController;
use App\Http\Controllers\RealisasiPengisianBbmController;
use App\Http\Controllers\TbbmController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/asosiasikapal/kembalikansemua', [AsosiasiKapalController::class, 'kembalikansemua']);
Route::get('/asosiasikapal/kembalikan/{id}', [AsosiasiKapalController::class, 'kembalikan']);
Route::get('/asosiasikapal/permanensemua', [AsosiasiKapalController::class, 'permanensemua']);
Route::get('/asosiasikapal/permanen/{id}', [AsosiasiKapalController::class, 'permanen']);
Route::get('/asosiasikapal/softasos/{id}', [AsosiasiKapalController::class, 'softasos']);
Route::get('/asosiasikapal/trash', [AsosiasiKapalController::class, 'trash']);
Route::resource('asosiasikapal', AsosiasiKapalController::class);


Route::get('/caripengisian', [RealisasiPengisianBbmController::class, 'caripengisian']);
Route::post('/realisasipengisianbbm/upload', [RealisasiPengisianBbmController::class, 'upload']);
Route::resource('realisasipengisianbbm', RealisasiPengisianBbmController::class);

Route::resource('kapal', KapalController::class);

Route::get('/carilintasan', [LintasanOperasiController::class, 'carilintasan']);
Route::resource('lintasan', LintasanOperasiController::class);

Route::get('/caritbbm', [TbbmController::class, 'caritbbm']);
Route::resource('tbbm', TbbmController::class);

Route::get('/carioperator', [OperatorController::class, 'carioperator']);
Route::resource('operator', OperatorController::class);

Route::get('/pemilik/exportexceldetail/{id}', [PemilikController::class, 'exportexceldetail']);
Route::get('/pemilik/exportexcel', [PemilikController::class, 'exportexcel']);
Route::get('/pemilik/exportpdfdetail/{id}', [PemilikController::class, 'exportpdfdetail']);
Route::get('/pemilik/exportpdf', [PemilikController::class, 'exportpdf']);
Route::get('/cari', [PemilikController::class, 'cari']);
Route::resource('pemilik', PemilikController::class);

