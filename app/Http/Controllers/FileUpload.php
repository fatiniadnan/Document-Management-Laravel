<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Auth;

class FileUpload extends Controller
{
  public function createForm(){
    return view('upload.file-upload');
  }

  public function fileUpload(Request $req){

    foreach($req as $file){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,png,pdf|max:2048'
        ]);

        $fileModel = new File;

        
        if($req->file('file')) {

         
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs(Auth::user()->id, $fileName);
            $size = $req->file('file')->getSize();
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/app/' . $filePath;
            $fileModel->size = $size;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    
   }
}

}