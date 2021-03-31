<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function check()
    {
       $id = auth()->user()->id;
       $results = DB::select('select * from users where id = '.$id.' and nivel = 1 or nivel = 2 or nivel = 3' );
       if($results){
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'));
       }else{
        return redirect()->route('home')
        ->with('success','Você não tem acesso ');
       }
       exit();
      
            
    }
    public function index()
    {
         
        $users = User::latest()->paginate(5);
  
        return view('users.index',compact('users'));
            
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
      
            $user->update($request->all());
      
            return redirect()->route('users.index')
                            ->with('success','Usuário atualizado com sucesso');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
