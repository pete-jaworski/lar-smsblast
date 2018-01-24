<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Holds Admin DB table ID
     */
    const ADMIN_ID = 1;
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'f1', 'f2', 'f3', 'f4', 'f5'
    ];
    
    
    /**
     * @return \App\User::class
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }    
}
           