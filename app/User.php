<?php

namespace Corp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles(){
        return $this->hasMany('\Corp\Article');
    }

    public function roles(){
        return $this->belongsToMany('\Corp\Role', 'role_user');
    }

    public function canDo($permission, $require = false){

        if(is_array($permission)){
            foreach($permission as $permName)
            {
                $permName = $this->canDo($permName);

            if($permName && !$require)
            {

                return true;

            }
            else if(!$permName && $require)
            {
                return false;
            }

        }
                    
            return $require;
               
            
        } else {

            foreach($this->roles as $role){
               foreach($role->perms as $perm){
                // foo* foobar
                if(str_is($permission, $perm->name)){
                    return true;
                }
               } 
            }

        }


    }

    public function hasRole($name, $require = false){

        if(is_array($name)){
            foreach($name as $roleName)
            {
                $hasRole = $this->hasRole($roleName);

            if($hasRole && !$require)
            {

                return true;

            }
            else if(!$hasRole && $require)
            {
                return false;
            }

        }
                    
            return $require;
               
            
        } else {

            foreach($this->roles as $role){
               foreach($role->perms as $perm){
                // foo* foobar
                if(str_is($role->name, $role)){
                    return true;
                }
               } 
            }

            return false;
        }


    }
}
