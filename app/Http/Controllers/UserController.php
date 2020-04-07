<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Group;


class UserController extends Controller
{

    public function getGroup(){
        $user= Auth::user();
        return view('groups', ['user'=>$user]);
    }

    // Configuracion de datos personales
    public function config(){
        $user= Auth::user();
        return view('update', ['user'=>$user]);
    }

    // Validacion formulario datos personales
    public function update($request, $id){
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');

        $user->save();
    }  
}