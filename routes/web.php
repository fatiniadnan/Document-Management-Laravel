<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\SendController;

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
    Route::get('order-by-update', [IndexController::class, 'order'])->name('index-order');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('update-pass', [ProfileController::class, 'update'])->name('update-pass');
    Route::get('upload.file-upload', [FileUpload::class, 'createForm'])->name('upload-file');
    Route::post('upload.file-upload', [FileUpload::class, 'fileUpload'])->name('fileUpload');
    Route::post('delete/{id}', [FileUpload::class, 'delete'])->name('delete');
    Route::get('download/{id}', [IndexController::class, 'download'])->name('download');
    Route::get('upload.show/{id}', [IndexController::class, 'show'])->name('upload.show/{id}');
    Route::get('upload.edit/{id}', [IndexController::class, 'edit'])->name('upload.edit/{id}');
    Route::post('update/{id}', [IndexController::class, 'update'])->name('update');
    Route::get('text.new', [TextController::class, 'index'])->name('text.new');
    Route::post('text.new', [TextController::class, 'store'])->name('uploadText');
    Route::get('send.send', [SendController::class, 'index'])->name('send.send');
    Route::get('sendFiles', [SendController::class, 'send'])->name('sendFiles');
    Route::get('send-mail', function () {
        $details = [
        'title' => 'Mail from Example Site',
        'body' => 'This is for testing email using smtp'
        ];
        Mail::to('test@test.com')->send(new \App\Mail\FilesentMail($details));
        dd("Email is Sent.");
        });
});
