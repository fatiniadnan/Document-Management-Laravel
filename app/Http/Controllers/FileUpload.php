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
        'file' => 'required|mimes:csv,txt,xlx,xls,png,pdf,doc,docx,png,jpeg,jpg,gif,svg,ppt,pptx,odp,mp3,mp4|max:20048'
        ]);

        $fileModel = new File;

        
        if($req->file('file')) {

         
            $fileName = $req->file->getClientOriginalName();
            $req->file('file')->storeAs('./public/', $fileName);
            $size = $req->file('file')->getSize();
            $fileModel->name = $req->file->getClientOriginalName();
            $fileModel->file_path = 'storage/'.'/'.$fileName;
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
         Storage::disk('public')->delete('./'.'/'.$name);

         $destroy = File::find($id);

         $destroy->delete();
     
         return redirect()->action([IndexController::class, 'index'])->with('success','File has been deleted.');
        }

}