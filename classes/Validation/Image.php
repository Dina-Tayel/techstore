<?php 
namespace TechStore\Classes\Validation;

 class Image implements ValidationRule{

    public function check(string $name,$value){
        $allowedExtensions=['png','jpg','jpeg','gif'];
        $ext=pathinfo($value['name'],PATHINFO_EXTENSION);
        if(! in_array($ext,$allowedExtensions)){
          return "This $name extension is not allowed " ;
        }
        
        return false;
    }
    
}
