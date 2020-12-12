<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\JsonDecoder;

class Lists extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table = 'lists';


    
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('trashed', function (Builder $builder) {
            $handlers = ['provider','employee'];
            $auth_type = \System::auth_type();
            $scope = $auth_type.'s';
            if(in_array($auth_type,$handlers)){
               $builder->where($auth_type.'_id',\System::$auth_type()->id)->$scope();
            }
        });
    }

    public function total(){
        return $this->items->sum('price');
    }
    
    public function provider(){
        return  $this->belongsTo('App\Provider', 'provider_id')->withDefault(['name' => 'N-A']);
    }

    public function employee(){
        return  $this->belongsTo('App\Employee', 'employee_id')->withDefault(['name' => 'N-A']);
    }

    public function items(){
        return  $this->hasMany('App\Items', 'list_id');
    }

    public function city(){
        return  $this->belongsTo('App\Cities', 'city_id')->withDefault(['name' => 'N-A']);
    }

    public function scopeTrashed($query){
        return $query->whereNotNull('deleted_at');
    }
    
    
    public function scopeCurrentProvider($query){
        return $query->where('provider_id', Auth::user()->id);
    }

    public function scopeCurrentEmployee($query){
        return $query->where('employee_id', Auth::user()->id);
    }

    public function scopeEmployees($query){
        return $query->where('handler', 'employee');
    }

    public function scopeOrderByID($query){
        return $query->orderby('id','desc');
    }


    public function scopeByStatus($query,$status){
        return in_array($status,\Status::statuesList()) ? $query->where('status',$status) : $query;
    }



    public function scopeProviders($query){
        return $query->where('handler', 'provider');
    }

    public function scopeNew($query){
        return $query->where('status', 'new');
    }

    public function scopeConfirmed($query){
        return $query->where('status', 'confirmed');
    }

    public function scopeCanceled($query){
        return  $query->where('status', 'canceled');
    }

    public function scopeUnanswered($query){
        return  $query->where('status', 'unanswered');
    }

    public function scopeRecall($query){
        return  $query->where('status', 'recall');
    }

    public function scopeDelivred($query){
        return  $query->where('status', 'delivred');
    }


    public function displayHistory(){
        return json_decode($this->history); 
    }








}