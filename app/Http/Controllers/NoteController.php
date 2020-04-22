<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Board;
use App\Notes;

class NoteController extends Controller
{
    // create board
    public function create($id){
        $board = Board::findOrFail($id);
        return view('createNote', ['board'=>$board]);
    }

    //validate form create board
    public function save(Request $request){
        $note = DB::table('notes')->insert(array(
            'board_id' => $request->input('id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => 'clean'
        ));

        return redirect()->action('BoardController@getNotes', ['board'=>$request->input('id')]);
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
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('notes')->put($image_path_name, File::get($image_path));
            $note->image_path = $image_path_name;
        }

        $note->save();
        return redirect()->action('BoardController@getNotes', ['note'=>$note->board_id]);
    }

    public function getImage($filename){
        return Storage::disk('notes')->get($filename);
    }

    public function delete($id){
        $board_id = DB::table('notes')->where('id',$id)->first();
        $note = DB::table('notes')->where('id',$id)->delete();

        return redirect()->action('BoardController@getNotes', ['board'=>$board_id->board_id]);
    }
}
