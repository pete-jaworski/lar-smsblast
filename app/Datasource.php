<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datasource extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code'
    ];    
    /**
     * Tasks
     * @return \App\Task::class
     */
    public function tasks()
    {
        return $this->hasMany(\App\Task::class);
    }
}
