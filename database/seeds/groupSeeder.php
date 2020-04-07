<?php

use Illuminate\Database\Seeder;

class groupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->arrayGroups = array(
            array(
                'name' => 'Buffete Abogados Bernardo S.L.',
            ),
            array(
                'name' => 'Asociacion de Arquitectos Fede S.L.',
            )
        );

        DB::table('groups')->delete();
        foreach( $this->arrayGroups as $group ) {
            $p = new Group;
            $p->name = $group['name'];
            $p->save();
        }
    }
}
