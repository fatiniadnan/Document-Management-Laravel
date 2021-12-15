<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $req->file('file')->storeAs('./public/'. Auth::user()->id, $fileName);
            $size = $req->file('file')->getSize();
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = 'storage/'.Auth::user()->id.'/'.$fileName;
            $fileModel->size = $size;
            $fileModel->owner = Auth::user()->id;
            $fileModel->save();

            return redirect()->action([IndexController::class, 'index'])
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    
   }
}
        public function delete($id){

          $name = File::where('id', '=', $id)->value('name');
         Storage::disk('public')->delete('./'.Auth::user()->id.'/'.$name);

         $destroy = File::find($id);

         $destroy->delete();
     
         return redirect()->action([IndexController::class, 'index'])->with('success','File has been deleted.');
        }

}