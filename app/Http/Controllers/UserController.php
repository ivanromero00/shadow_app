<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use App\User;
use App\Group;


class UserController extends Controller
{

    public function getGroup(){
        $user = Auth::user();
        return view('home', ['user'=>$user]);
    }

    // Edit personal data
    public function config(){
        $user= Auth::user();
        return view('updateUser', ['user'=>$user]);
    }

    public function getAvatar($filename){
        return Storage::disk('users')->get($filename);
    }

    // validate form edit personal data
    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'nick' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->nick = $request->input('nick');
        $user->email = $request->input('email');

        $image_path = $request->file('image_path');
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            $user->image_path = $image_path_name;
        }

        $user->save();
        return view('home', ['user'=>$user]);
    }

    public function usersearch(Request $request){
        $nick = $request->input('nick');
        if($nick){
            $user = User::where('nick', $nick)->get();
            if(count($user) == 0){
                return redirect()->route('home')->with('error', 'Usuario no encontrado');
            }
            return view('profile', ['user'=>$user]);
        } else {
            return redirect()->route('home')->with('error', 'Error de busqueda. Por favor introduzca alguno de los campos.');
        }
        
    }

}