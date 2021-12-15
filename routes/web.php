<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TextController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('update-pass', [ProfileController::class, 'update'])->name('update-pass');
    Route::get('upload.file-upload', [FileUpload::class, 'createForm'])->name('upload-file');
    Route::post('upload.file-upload', [FileUpload::class, 'fileUpload'])->name('fileUpload');
    Route::post('delete/{id}', [FileUpload::class, 'delete'])->name('delete');
    Route::get('upload.show/{id}', [IndexController::class, 'show'])->name('upload.show/{id}');
    Route::get('upload.edit/{id}', [IndexController::class, 'edit'])->name('upload.edit/{id}');
    Route::post('update/{id}', [IndexController::class, 'update'])->name('update');
    Route::get('text.new', [TextController::class, 'index'])->name('text.new');
    Route::post('text.new', [TextController::class, 'store'])->name('uploadText');
    
});

Route::get('storage//{foldername}//{filename}', [FileController::class, 'getFile'])->where('filename', '^[^/]+$');