<?php 
namespace TechStore\Classes\Validation;

class Max implements ValidationRule{

public function check(string $name,$value){

    if(strlen($value)>255){
        return "This $name must be less than 255 character" ;
    }
    return false;
}

}
