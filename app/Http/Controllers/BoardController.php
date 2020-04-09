<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Group;
use App\Board;

class BoardController extends Controller
{
    // create board
    public function create($id){
        $group = Group::findOrFail($id);
        return view('createBoard', ['group'=>$group]);
    }

    //validate form create board
    public function save(Request $request){
        $board = DB::table('boards')->insert(array(
            'group_id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ));

        return redirect()->action('GroupController@getBoards', ['group'=>$request->input('id')]);
    }

    public function config($id){
        $board = Board::findOrFail($id);
        return view('updateBoard', ['board'=>$board]);
    }

    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        
        $board = Board::find($id);
        $board->name = $request->input('name');
        $board->description = $request->input('description');

        $board->save();
        return redirect()->action('GroupController@getBoards', ['group'=>$board->group_id]);
    }

    public function delete($id){
        $group_id = DB::table('boards')->where('id',$id)->first();
        $board = DB::table('boards')->where('id',$id)->delete();

        return redirect()->action('GroupController@getBoards', ['group'=>$group_id->group_id]);
    }
}
