<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(File $files, Request $request)

    {
        
        $search = $request->get('search');
        $files = File::orderBy('name')
        ->where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('index', ['files' => $files]);

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(File $files, Request $request)
    {
        $search = $request->get('search');
        $files = File::orderBy('updated_at')
        ->where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('index', ['files' => $files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     

        $files = File::where('id', '=', $id ?? '')->get();
 
       

        return view('upload.show',compact('files'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = File::where('id', '=', $id ?? '')->get();
 
        $nameext = File::where('id', '=', $id)->value('name');
        $name = rtrim($nameext, ".txt");
        $text = Storage::disk('public')->get('./public/'.'/'.$nameext);

        return view('upload.edit',compact('files', 'name', 'text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nameext = File::where('id', '=', $id)->value('name');
        $namewithout = rtrim($nameext, ".txt");
        if($request->name == $namewithout) {
            Storage::disk('public')->put('./public/'.'/'.$request->name.'.txt', $request->text);
            $size = Storage::disk('public')->size('./public/'.'/'.$request->name.'.txt');
            $data= File::findOrFail($id);
            $data->size = $size;
            $data->save();
        } else {

            Storage::disk('public')->move('./public/'.'/'.$nameext, '/'.$request->name.'.txt');
            Storage::disk('public')->put('./public/'.'/'.$request->name.'.txt', $request->text);
            $size = Storage::disk('public')->size('./public/'.'/'.$request->name.'.txt');
            $data= File::findOrFail($id);
            $data->name = $request->name.'.txt';
            $data->file_path = 'storage/'.'/'.$request->name.'.txt';
            $data->size = $size;
            $data->save();

        }   

        return redirect()->action([IndexController::class, 'index'])->with('success','File has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = File::where('id', '=', $id)->value('name');
        return Storage::download('./public/'.'/'.$file);
    }
}
