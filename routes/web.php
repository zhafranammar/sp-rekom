<?php

use App\Http\Controllers\FaktaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestAdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('admin/jurusan', JurusanController::class);
Route::resource('admin/fakta', FaktaController::class);

Route::get('/admin/test', [TestAdminController::class, 'index'])->name('admin.test.index');
Route::get('/admin/test/{id}', [TestAdminController::class, 'show'])->name('admin.test.show');

// Routes for the user
Route::get('/test/start', [TestController::class, 'start'])->name('test.start');
Route::post('/test/submit', [TestController::class, 'submit'])->name('test.submit');
Route::get('/test/result/{id}', [TestController::class, 'result'])->name('test.result');
Route::get('/get-certificate/{id}', [TestController::class, 'generateCertificate'])->name('get.certificate');



require __DIR__ . '/auth.php';
