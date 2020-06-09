<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Group;
use App\Board;
use App\Notes;

class NoteController extends Controller
{
    // create board
    public function create($id){
        $board = Board::findOrFail($id);
        return view('createNote', ['board'=>$board, 'group'=>$board->group_id]);
    }

    //validate form create board
    public function save(Request $request){
        $group = Group::find($request->input('group'));
        $note = DB::table('notes')->insert(array(
            'board_id' => $request->input('id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => 'clean'
        ));

        return redirect()->action('BoardController@getNotes', ['board'=>$request->input('id'), 'group'=>$group]);
    }

    public function config($id){
        $note = Notes::findOrFail($id);
        return view('updateNote', ['note'=>$note]);
    }

    public function update(Request $request, $id){
        $validate = $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255'
        ]);
        
        $note = Notes::find($id);
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $image_path = $request->file('image_path');

        $board = Board::find($note->board_id);
        $group = Group::find($board->group_id);

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('notes')->put($image_path_name, File::get($image_path));
            $note->image_path = $image_path_name;
        }

        $note->save();
        return redirect()->action('BoardController@getNotes', ['note'=>$note->board_id, 'group', $group]);
    }

    public function getImage($filename){
        return Storage::disk('notes')->get($filename);
    }

    public function delete($id){
        $note = Notes::find($id);
        $board = Board::find($note->board_id);
        $group = Group::find($board->group_id);
        $note->delete();

        return redirect()->action('BoardController@getNotes', ['board'=>$board->id, 'group'=>$group]);
    }
}
