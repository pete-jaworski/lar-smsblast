<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);      
        $this->call(UserRolesSeeder::class);   
        $this->call(DatasourceSeed::class);
        $this->call(TaskSeeder::class);        
    }
}
