<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use App\Models\User;
use App\Models\File;
use App\Mail\FilesentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $files = File::where('owner', '=', Auth::user()->id)->get();
        return view("send.send", compact('users', 'files'));
    }
    public function send(Request $request)
    {

        foreach($request->select as $filename) {
            
            // if (Storage::disk('public')->exists('./public/'.$request->address.'/'.$filename)) {
            //     return back()
            //     ->with('error','Sorry, you have already sent '.$filename.' file to your address!');
                
            // }
            // Storage::disk('public')->copy('./public/'.'/'.$filename, './public/'.$request->address.'/'.$filename);
    
            $fileModel = new File;

            $size = Storage::size('./public/'.$request->address.'/'.$filename);
            $fileModel->name = $filename;
            $fileModel->file_path = 'storage/'.$request->address.'/'.$filename;
            $fileModel->size = $size;
            $fileModel->owner = $request->address;
            $fileModel->sender = Auth::user()->id;
            $fileModel->sendername = Auth::user()->name;
            //$fileModel->save();

            return redirect()->action([IndexController::class, 'index'])->with('success','File has been sent.');

        }

    }
}
