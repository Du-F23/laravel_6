<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // proteger rutas con un constructor auth

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
/* metod index user */
    public function index(){

        $users = User::all();
        return view('users.index',[
            'users' => $users
        ]);
        return back();

    }
    public function store(){

    }
    /* metododo delete */
    public function delete(User $user){

        $user->delete();

        return (' el usuario se ha eliminado de manera correcta');

    }

    public function edit($id){
        $users=User::findOrFail($id);
        return view('users.edit',['users'=>$users]);
    }


    public function update(Request $request, $id){
        $users=User::findOrFail($id);

        $users->update($request->all());

        return redirect('/users')->with('mesageUpdate', 'El usuario se a modificado correctamente!');
    }
}
