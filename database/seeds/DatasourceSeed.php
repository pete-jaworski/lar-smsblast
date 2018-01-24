<?php

use Illuminate\Database\Seeder;

class DatasourceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datasources')->insert(array(
            [
            'id'    => 1,
            'name'  => 'MySQL',
            'code'  => 'mysql'            
            ],
            [
            'id'    => 2,
            'name'  => 'MSSQL KIA',
            'code'  => 'sqlsrv_kia'            
            ],
            [
            'id'    => 3,
            'name'  => 'MSSQL SKODA',
            'code'  => 'sqlsrv_skoda'            
            ],            
        ));
    }
}
