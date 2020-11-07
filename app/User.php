<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lists(){
        return  $this->belongsTo('App\User', 'id', 'provider_id');
    }

    public function color(){
        return (new \App\System\Helper())->random_color();
    }

    public function scopeEmployee($query){
        return  $query->where('role', 'employee');
    }

    public function scopeProvider($query){
        return  $query->where('role', 'provider');
    }


}
