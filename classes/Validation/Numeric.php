<?php 
namespace TechStore\Classes\Validation;
class Numeric implements ValidationRule{

    public function check(string $name,$value){

        if(! is_numeric($value)){
           return "This $name must contain only numbers" ;
        }
        return false;
    }

}