<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\UserIndex;
use Illuminate\Http\Request;
use App\Http\Requests\UserstoreRequest;
use App\Http\Requests\UserupdateRequest;




class UserIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $userSearching = UserIndex::searchFilter($request->get('searchName') )
        ->orderBy('id','desc')
        ->paginate(4);



        return Inertia::render("User/Index",[
            'users' =>$userSearching,
            'search_Name'=>$request->searchName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("User/Create",[
            'data_user'=>new UserIndex //this is user method
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserstoreRequest $request)
    {

         $user =$this->data($request);
        UserIndex::create($user);

        return redirect()->route('user#index')
                        ->with('user_create','User data is successfully created!');


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
    public function edit(UserIndex $userIndex,$id)
    {
        return Inertia::render("User/Edit",[
            'data_user' =>UserIndex::where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserIndex  $userIndex
     * @return \Illuminate\Http\Response
     */
    public function update(UserupdateRequest $request, UserIndex $userIndex,$id)
    {





        if($request->password){
        $data=$this->data($request);
        $userIndex->where("id",$id)
                  ->update($data);
        }


       return redirect()->route('user#index')
                        ->with("user_update",'User data have been Update!');
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

    private function data($request){



        $dataUser= [
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>bcrypt($request->password)
        ];

        return $dataUser;
    }
}
