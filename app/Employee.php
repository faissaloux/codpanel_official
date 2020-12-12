<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Employee extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $guarded = ['id'];

    public function lists(){
        return $this->hasMany('App\Lists', 'employee_id');
    }

    public function delivredLists(){
        return $this->hasMany('App\Lists', 'employee_id')->where('delivred_at', '<>', NULL);
    }

    public function color(){
        return (new \App\System\Helper())->random_color();
    }

    protected  $guard  ="employee";
}
