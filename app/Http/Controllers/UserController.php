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
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
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
}