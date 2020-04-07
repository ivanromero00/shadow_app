<?php

use Illuminate\Database\Seeder;

class boardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->arrayBoards = array(
            array(
                'name' => 'Ventas',
                'group_id' => '1',
                'description' => 'Tabla de clientes para futuras ventas',
            ),
            array(
                'name' => 'Cosas por hacer',
                'group_id' => '2',
                'description' => 'cosas por hacer',
            ),
            array(
                'name' => 'facturas',
                'group_id' => '1',
                'description' => 'facturas de compras',
            )
        );

        DB::table('boards')->delete();
        foreach( $this->arrayBoards as $board ) {
            $p = new Board;
            $p->name = $board['name'];
            $p->group_id = $board['group_id'];
            $p->description = $board['description'];
            $p->save();
        }
    }
}
