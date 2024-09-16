<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Models\File;
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
    $files = File::latest()->take(8)->get();
    return view('welcome', compact('files'));
});

Route::get('/all', [FileController::class, 'index'])->name('file.all');

Route::get('/home', ['as' => 'homme_path', 'uses' => function () {
    $files = File::latest()->take(8)->get();
    return view('welcome', compact('files'));
}]);

Route::get('/login', [LoginController::class, 'signIn']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(["middleware" => "auth"], function () {
    Route::get('/admin', function () {
        $files = File::orderBy('id', 'DESC')->get();
        return view('admin', compact('files'));
    })->name('admin');
    Route::post('/admin/create', [FileController::class, 'store'])->name('file.store');
    Route::put('/admin/update', [FileController::class, 'update'])->name('file.update');
    Route::delete('/admin/delete', [FileController::class, 'destroy'])->name('file.destroy');
});
