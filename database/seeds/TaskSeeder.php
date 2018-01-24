<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(array(
            [
            'id'            => 1,
            'status'        => 1,
            'type'          => 'sms',
            'name'          => 'Powiadomienia Klientów, którym zbliża się okres badania technicznego',
            'schedule'      => 'l',
            'date'          => 'Tuesday',
            'user_id'       => 1,
            'datasource_id' => 2,
            'params'        => json_encode(array('days' => 7, 'idFakSKP' => 89)),
            'message'       => 'MKT SERWIS : Przypominamy o terminie badanie technicznego{%if wiersz.nrrej %} dla pojazdu ({{wiersz.nrrej}}){% endif %},ktory uplywa {{wiersz.nastep_badanie}}. Prosimy o kontakt pod numerem 175830550 w celu umowienia wizyty',
            'sql'           => 'SELECT TOP 1000 [id] ,[name] ,[phone] FROM [laravel].[dbo].[sms]',
            'f1'    => '',
            'f2'    => '',
            'f3'    => '',
            'f4'    => '',
            'f5'    => '',            
            ],
            [
            'id'            => 2,
            'status'        => 1,
            'type'          => 'sms',
            'name'          => 'Wiadomość do Klientów określonego modelu Skody',
            'schedule'      => 'd',
            'date'          => '12',                
            'user_id'       => 1,
            'datasource_id' => 3,
            'params'        => json_encode(array('model' => 28393)),
            'message'       => 'MKTSERWIS : zapraszamy do naszego salonu',
            'sql'           => 'SELECT TOP 1000 [id] ,[name] ,[phone] FROM [laravel].[dbo].[sms]',
            'f1'    => '',
            'f2'    => '',
            'f3'    => '',
            'f4'    => '',
            'f5'    => '',            
            ],     
            [
            'id'            => 3,
            'status'        => 0,
            'type'          => 'sms',
            'name'          => 'Wiadomość do Klientów umówionych na serwis jutro',
            'schedule'      => 'd-m',
            'date'          => '12-12',                  
            'user_id'       => 2,
            'datasource_id' => 2,
            'params'        => json_encode(array()),
            'message'       => 'DEMO : Przypominamy o jutrzejszej wizycie w serwisie o godzinie {{wiersz.Start}}. W celu odwolania wizyty prosimy o SMS zwrotny lub kontakt tel 123456789',
            'sql'           => 'SELECT TOP 1000 [id] ,[name] ,[phone] FROM [laravel].[dbo].[sms]',
            'f1'    => '',
            'f2'    => '',
            'f3'    => '',
            'f4'    => '',
            'f5'    => '',            
            ],              
        ));
    }
}
