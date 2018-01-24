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
        DB::table('users')->insert(array(
            [
            'name'      => 'Piotr Jaworski',
            'email'     => 'piotrjaworski@hotmail.com',                
            'password'  => bcrypt('1234'),      
            'f1'        => '',
            'f2'        => '',
            'f3'        => '',
            'f4'        => '',
            'f5'        => 1,            
            ],
            [
            'name'      => 'Paweł Maziarz',
            'email'     => 'p.maziarz@mktserwis.pl',                
            'password'  => bcrypt('1234'),      
            'f1'        => '',
            'f2'        => '',
            'f3'        => '',
            'f4'        => '',
            'f5'        => 0,             
            ],    
            [
            'name'      => 'Katarzyna Kurek',
            'email'     => 'k.kurek@mktserwis.pl',                
            'password'  => bcrypt('1234'),      
            'f1'        => '',
            'f2'        => '',
            'f3'        => '',
            'f4'        => '',
            'f5'        => 0,             
            ], 
            [
            'name'      => 'Karolina Starzyk',
            'email'     => 'k.starzyk@mktserwis.pl',                
            'password'  => bcrypt('1234'),      
            'f1'        => '',
            'f2'        => '',
            'f3'        => '',
            'f4'        => '',
            'f5'        => 0,             
            ],             
        ));
    }
}

 
 
  
 