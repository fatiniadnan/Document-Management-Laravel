<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSearchController;
use App\Mail\FilesentMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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

Route::get('search-user', [UserSearchController::class, 'search'])->name('search');

//Route::resource('faculties', FacultyController::class);

Route::group(['middleware' => 'auth', 'verified'], function () {

    Route::resource('user', UserController::class);
    Route::resource('faculties', FacultyController::class);

    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('order-by', [UserSearchController::class, 'order'])->name('search-order');    
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
    Route::post('send-mail', [SendController::class, 'send'])->name('send-mail');
    // Route::get('send-mail', function () {
        
    //     $details = [
    //     'title' => 'Mail from Imarah Eco Friends',
    //     'body' => 'This is the attachment that you requested.'
    //     ];

    //     Mail::to(Auth::user()->email)->send(new FilesentMail($details));
        
    //     });

    Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
    
    

        //Verification
        Route::middleware(['auth', 'verified'])->group(function(){
            Route::get('profile', [ProfileController::class, 'index'])->name('profile');
            Route::get('text.new', [TextController::class, 'index'])->name('text.new');
            Route::get('send.send', [SendController::class, 'index'])->name('send.send');
            Route::get('upload.file-upload', [FileUpload::class, 'createForm'])->name('upload-file');
            Route::post('delete/{id}', [FileUpload::class, 'delete'])->name('delete');
            Route::resource('user', UserController::class);
            // Route::get('/', [IndexController::class, 'index'])->name('index');
        });

});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);


