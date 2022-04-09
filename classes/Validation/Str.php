<?php 
namespace TechStore\Classes\Validation;

class Str implements ValidationRule{

    public function check(string $name,$value){

        if(is_numeric($value)){
           return "This $name must be string" ;
        }
        return false;
    }

}

