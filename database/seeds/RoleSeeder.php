<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            [
            'id'    => 1,
            'title' => 'Administrator',
            'f1'    => '',
            'f2'    => '',
            'f3'    => '',
            'f4'    => '',
            'f5'    => '',            
            ],
            [
            'id'    => 2,
            'title' => 'Bramka SMS',
            'f1'    => '',
            'f2'    => '',
            'f3'    => '',
            'f4'    => '',
            'f5'    => '',            
            ],            
        ));
    }
}
          