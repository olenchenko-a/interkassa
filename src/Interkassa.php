<?php

namespace olenchenkoA\interkassa;

class Interkassa{
 
 protected $config;
 
 
 public function __construct(){
    $this->config = config('interkassa');
 }
 
 
 public function show($key, $data =[]){

    if(isset($this->config[$key])){
    	return $this->config[$key];
    } else {
    	return false;
    }

 }
}