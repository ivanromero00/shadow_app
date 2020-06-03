<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Group;


class GroupController extends Controller
{
    // create group
    public function create(){
        return view('createGroup');
    }

    //validate form create group
    public function save(Request $request){
        if($request->has('public')){
            $group = DB::table('groups')->insert(array(
                'name' => $request->input('name'),
                'public' => $request->input('public')
            ));
        } else {
            $group = DB::table('groups')->insert(array(
                'name' => $request->input('name'),
                'public' => 0
            ));
        }

        $group = DB::table('groups')->where('name',$request->input('name'))->first();

        $user = Auth::user();
        $relationship = DB::table('group_user')->insert(array(
            'user_id' => $user->id,
            'group_id' => $group->id
        ));

        return redirect()->action('UserController@getGroup');
    }

    // Edit group
    public function config($id){
        $group = Group::findOrFail($id);
        return view('updateGroup', ['group'=>$group]);
    }

    // validate form edit group
    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);
        
        $group = Group::find($id);
        $group->name = $request->input('name');

        $group->save();
        return redirect()->action('UserController@getGroup');
    }

    // delete group
    public function delete($id){
        $group = DB::table('groups')->where('id',$id)->delete();

        return redirect()->action('UserController@getGroup');
    }

    // get group's boards
    public function getBoards($id){
        $group = Group::find($id);
        return view('boards', ['group'=>$group]);
    }

    // add user to group
    public function add($id){
        $group = Group::find($id);
        return view('adduser', ['group'=>$group]);
    }

    public function usersearch(Request $request, $id){
        $group = Group::find($id);
        $email = $request->input('email');
        $name = $request->input('name');
        $nick = $request->input('nick');

        if($email){
            $user = User::where('email', $email)->first();
            if($user == NULL){
                return redirect()->route('add', ['id' => $group])->with('error', 'Usuario no encontrado');
            }
            return view('userlist', ['group'=>$group, 'user'=>$user])->with('single', 'user');
        }

        if($name && $nick==""){
            $user = User::where('name', $name)->get();
            if(count($user) == 0){
                return redirect()->route('add', ['id' => $group])->with('error', 'Usuario no encontrado');
            }
            return view('userlist', ['group'=>$group, 'user'=>$user])->with('multiple', 'users');
        }
        
        if($nick && $name=="" || $nick && $name){
            $user = User::where('nick', $nick)->get();
            if(count($user) == 0){
                return redirect()->route('add', ['id' => $group])->with('error', 'Usuario no encontrado');
            }
            return view('userlist', ['group'=>$group, 'user'=>$user])->with('single', 'user');
        }
        
        if($email == NULL && $name == NULL && $nick == NULL){
            return redirect()->route('add', ['id' => $request->input('id')])->with('error', 'Error de busqueda. Por favor introduzca alguno de los campos.');
        }

    }
    
    public function adduser($id_user, $id_group){
        $relationship = DB::table('group_user')->insert(array(
            'user_id' => $id_user,
            'group_id' => $id_group
        ));
        return redirect()->route('add', ['id' => $id_group])->with('user', 'Usuario añadido correctamente');
    }
}
