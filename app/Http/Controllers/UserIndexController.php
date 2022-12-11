<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\UserIndex;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("User/Index",[
            'users' => UserIndex::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("User/Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creatData =$this->data($request);
        UserIndex::create($creatData);

        return redirect()->route('user#index')
                        ->with('user_create','User data is successfully created!');

    //    $data =UserIndex::create($creatData);
    }

    private function data($request){
        $dataUser= [
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password
        ];

        return $dataUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserIndex  $userIndex
     * @return \Illuminate\Http\Response
     */
    public function show(UserIndex $userIndex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserIndex  $userIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(UserIndex $userIndex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserIndex  $userIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserIndex $userIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserIndex  $userIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserIndex $id)
    {


       $id->delete();
       return redirect()->route('user#index')->with("user_delete",'User data have been delete!');

    }
}
