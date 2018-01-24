<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);             
            $table->string('type')->default('sms'); 
            $table->string('name')->default('Nienazwany...');   
            $table->string('schedule')->default('d-m');   
            $table->string('date')->default('01-01');             
            $table->integer('user_id')->default(1);
            $table->integer('datasource_id')->default(1);            
            $table->integer('category_id')->default(1);
            $table->string('subject')->default('');                          
            $table->string('params')->default(json_encode(array()));   
            $table->text('message')->nullable();              
            $table->text('sql')->nullable();             
            $table->string('f1')->default('');
            $table->string('f2')->default('');
            $table->string('f3')->default('');
            $table->string('f4')->default('');
            $table->string('f5')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
