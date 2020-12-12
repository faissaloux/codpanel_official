<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Provider extends Authenticatable
{
    protected $guarded = ['id'];

    public function lists(){
        return $this->hasMany('App\Lists', 'provider_id');
    }

    public function delivredLists(){
        return $this->hasMany('App\Lists', 'provider_id')->where('delivred_at', '<>', NULL);
    }

    public function color(){
        return (new \App\System\Helper())->random_color();
    }

    protected  $guard  ="provider";
}
