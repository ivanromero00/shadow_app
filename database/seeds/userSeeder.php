<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->arrayUsers = array(
            array(
                'name' => 'Ivan',
                'nick' => 'ivanro',
                'image_path' => 'defecto',
                'email' => 'ivan@gmail.com',
                'password' => 'pestillo',
            ),
            array(
                'name' => 'pepe',
                'nick' => 'pepelu',
                'image_path' => 'defecto',
                'email' => 'pepe@gmail.com',
                'password' => 'pestillo',
            ),
            array(
                'name' => 'pepe',
                'nick' => 'pepito',
                'image_path' => 'defecto',
                'email' => 'pepito@gmail.com',
                'password' => 'pestillo',
            )
        );

        DB::table('users')->delete();
        foreach( $this->arrayUsers as $user ) {
            $p = new User;
            $p->name = $user['name'];
            $p->nick = $user['nick'];
            $p->image_path = $user['image_path'];
            $p->email = $user['email'];
            $p->password = $user['password'];
            $p->save();
            }
    }
}
