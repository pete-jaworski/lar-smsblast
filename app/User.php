<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'f1', 'f2', 'f3', 'f4', 'f5'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * User Role
     * @return \App\Role::class
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Role::class, 'user_roles', 'user_id', 'role_id');
    }
    
    
    /**
     * Checks if current user is admin
     * @return int|NULL
     */
    public function isAdmin()
    {
         return count(\DB::select("SELECT id FROM user_roles WHERE role_id = ".\App\Role::ADMIN_ID." AND user_id = ".$this->id));
    }
    
    
    /**
     * User Tasks
     * @return \App\Task::class
     */
    public function tasks()
    {
        return $this->hasMany(\App\Task::class);
        
    }
    
}


 