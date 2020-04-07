<?php

use Illuminate\Database\Seeder;

class notesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->arrayNotes = array(
            array(
                'board_id' => '1',
                'title' => 'titulo 1',
                'content' => 'contoendasfjdlskñfjalsdf',
                'image_path' => 'https://img.icons8.com/material/4ac144/256/user-male.png',
            ),
            array(
                'board_id' => '1',
                'title' => 'titulo 2',
                'content' => 'asdf asdfasdfsadfasfqwfcasfasf',
                'image_path' => 'https://img.icons8.com/material/4ac144/256/user-male.png',
            ),
            array(
                'board_id' => '2',
                'title' => '197titulo 3',
                'content' => 'asdfq fadsgag crqwexfsd fasdf',
                'image_path' => 'https://img.icons8.com/material/4ac144/256/user-male.png',
            ),
            array(
                'board_id' => '3',
                'title' => 'titulo 4',
                'content' => 'asdfqew asv a fweqfqwef asdf',
                'image_path' => 'https://img.icons8.com/material/4ac144/256/user-male.png',
            ),
        );

        DB::table('notes')->delete();
        foreach( $this->arrayNotes as $note ) {
            $p = new Note;
            $p->board_id = $note['board_id'];
            $p->title = $note['title'];
            $p->content = $note['content'];
            $p->image_path = $note['image_path'];
            $p->save();
        }
    }
}
