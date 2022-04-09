<?php 
namespace TechStore\Classes\Validation;

 class RequiredFiles implements ValidationRule{

    public function check(string $name,$value){

        if($value['error'] != 0){
          return "This $name is required" ;
        }
        
        return false;
    }
    
}
