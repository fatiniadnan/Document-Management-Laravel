<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        return view("text.new");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Storage::disk('public')->exists('./public/'.'/'.$request->name.'.txt')) {
            return back()
            ->with('error','Sorry, this file name exist! Please choose another one.');
            
        }
        Storage::disk('public')->put('./public/'.'/'.$request->name.'.txt', $request->text);

        $fileModel = new File;
        $size = Storage::size('./public/'.'/'.$request->name.'.txt');
        $fileModel->name = $request->name.'.txt';
        $fileModel->file_path = 'storage/'.'/'.$request->name.'.txt';
        $fileModel->size = $size;
        $fileModel->owner = Auth::user()->id;
        $fileModel->save();



        return redirect()->action([IndexController::class, 'index'])->with('success','File has been uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
