<?php 

namespace App\System;
use \App\System\Listing;


class Api {

	private $query;

	public function __construct(){
		$this->init();
	}

    public function init(){
        $this->query = Listing::full();
        return $this;
    }



    public function get($type = false){

        if($type == 'array'){
            return $this->query->get()->toArray();
        }
        
        if($type == 'count'){
            return $this->query->count();
        }

        if($type == 'json'){
            return $this->query->toJson();
        }

        return $this->query->get();
        
    }

}
