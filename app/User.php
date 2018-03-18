<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
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
     * Returning name of role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){

        return $this->belongsTo('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo() {

        return $this->belongsTo('App\Photo');
    }

    /**
     * Checking if user is an admin
     * @return true or false
     */
    public function isAdmin() {
        if(!empty($this->role)) {
            return ($this->role->name == "administrator" && $this->is_active == '1') ? true : false;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post() {

        return $this->hasMany('App\Post');
    }
  }