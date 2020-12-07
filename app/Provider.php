<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Provider extends Authenticatable
{
    protected $guarded = ['id'];

    public function color(){
        return (new \App\System\Helper())->random_color();
    }

    protected  $guard  ="provider";
}
