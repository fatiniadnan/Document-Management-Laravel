<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserSearchController extends Controller
{

    public function search(Request $request)
    {
        if(isset($_GET['query'])){
            
            $search = $_GET['query'];
            $user = DB::table('users')->where('name', 'LIKE', '%'. $search .'%')->paginate(10);
            $user->appends($request->all());

            return view('users.index', ['users' => $user]);

        }else{
            return view('users.index');
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users, Request $request)
    {
       //;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(User $user, Request $request)
    {
        // $search = $request->get('query');
        // $user = User::where('name', '=', Auth::user()->id ?? '')->orderBy('id')
        //     ->where('name', 'LIKE', '%'. $search .'%')->paginate(10);
        $user = DB::table('users')->orderBy('name', 'ASC')->get();
        
        return view('users.index', ['users' => $user]);

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
        // $user = User::where('id', '=', $id ?? '')->get();

        // return view('users.index', ['users' => $user]);
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
