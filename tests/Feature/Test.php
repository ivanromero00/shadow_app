<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Group;
use App\Board;
use App\Notes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;

class ExampleTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /* * @test */
    
    public function test_page_is_working(){
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_view_login(){
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_logged_cant_view_login(){
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }
    
    public function test_user_create_group(){
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/group/create');
        $response->assertStatus(200);
    }

    public function test_user_edit_group(){
        $user = factory(User::class)->make();
        factory(Group::class)->create();

        $response = $this->actingAs($user)->get('/group/config/1');
        $response->assertStatus(200);
    }

    public function test_user_create_board(){
        $user = factory(User::class)->make();
        $group = factory(Group::class)->create();

        $response = $this->actingAs($user)->get('/board/create/'.$group->id);
        $response->assertStatus(200);
    }

    public function test_user_edit_board(){
        $user = factory(User::class)->make();
        $group = factory(Group::class)->create();
        factory(Board::class)->create([
            'group_id' => $group->id
        ]);

        $response = $this->actingAs($user)->get('/board/config/1');
        $response->assertStatus(200);
    }

    public function test_user_create_note(){
        $user = factory(User::class)->make();
        $group = factory(Group::class)->create();
        $board = factory(Board::class)->create([
            'group_id' => $group->id
        ]);

        $response = $this->actingAs($user)->get('/note/create/'.$board->id.'/'.$group->id);
        $response->assertStatus(200);
    }

    public function test_user_edit_note(){
        $user = factory(User::class)->make();
        $group = factory(Group::class)->create();
        $board = factory(Board::class)->create([
            'group_id' => $group->id
        ]);
        $note = factory(Notes::class)->create([
            'board_id' => $board->id
        ]);

        $response = $this->actingAs($user)->get('/note/config/'.$note->id);
        $response->assertStatus(200);
    }
}
