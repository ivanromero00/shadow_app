<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
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
                'name' => 'Juan',
                'surnames' => 'Gomez Lopez',
                'image_path' => 'https://image.flaticon.com/icons/svg/21/21104.svg',
                'email' => 'juangomezlopez@gmail.com',
                'password' => 'pestillo',
            ),
            array(
                'name' => 'Borja',
                'surnames' => 'Fernandez Perez',
                'image_path' => 'https://image.flaticon.com/icons/svg/21/21104.svg',
                'email' => 'borjafernandezperez@gmail.com',
                'password' => 'pestillo',
            ),
            array(
                'name' => 'Laura',
                'surnames' => 'Rodriguez Baron',
                'image_path' => 'https://image.flaticon.com/icons/svg/21/21104.svg',
                'email' => 'laurarodriguezbaron@gmail.com',
                'password' => 'pestillo',
            ),
            array(
                'name' => 'Ana',
                'surnames' => 'Reyna Flores',
                'image_path' => 'https://image.flaticon.com/icons/svg/21/21104.svg',
                'email' => 'anareynaflores@gmail.com',
                'password' => 'pestillo',
            ),
            array(
                'name' => 'Jose',
                'surnames' => 'Casas Mena',
                'image_path' => 'https://image.flaticon.com/icons/svg/21/21104.svg',
                'email' => 'josecasasmena@gmail.com',
                'password' => 'pestillo',
            )
        );

        DB::table('users')->delete();
        foreach( $this->arrayUsers as $user ) {
            $p = new User;
            $p->name = $user['name'];
            $p->surnames = $user['surnames'];
            $p->image_path = $user['image_path'];
            $p->email = $user['email'];
            $p->password = $user['password'];
            $p->save();
            }
    }
}
