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
        $group = DB::table('groups')->insert(array(
            'name' => $request->input('name')
        ));

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

    public function adduser(Request $request){
        $user = DB::table('users')->where('email', $request->input('email'))->first();
        if($user == NULL){
            return redirect()->route('add', ['id' => $request->input('id')])->with('error', 'Usuario no encontrado');
        }

        $group = Group::find($request->input('id'));
        $relationship = DB::table('group_user')->insert(array(
            'user_id' => $user->id,
            'group_id' => $group->id
        ));
        return redirect()->route('add', ['id' => $request->input('id')])->with('user', 'Usuario añadido correctamente');
    }
}
