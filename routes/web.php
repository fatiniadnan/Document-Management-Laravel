<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\IndexController;

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
    Route::get('upload.file-upload', [FileUpload::class, 'createForm'])->name('upload-file');
    Route::post('upload.file-upload', [FileUpload::class, 'fileUpload'])->name('fileUpload');
});

