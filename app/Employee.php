<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Employee extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $guarded = ['id'];

    public function color(){
        return (new \App\System\Helper())->random_color();
    }

    protected  $guard  ="employee";
}
