<?php 
  namespace TechStore\Classes\Validation;
//   require_once ("ValidationRule.php");
//   require_once("Max.php");
//   require_once("RequiredFiles.php");
//   require_once("Required.php");
//   require_once("Email.php");
//   require_once("Str.php");

//   require_once("Numeric.php");
 
 
class Validator{
    
    private $errors=[];

    public function validate( $name,$value,array $rules){
        
        foreach($rules as $rule){
            $className= "TechStore\\Classes\\Validation\\" . $rule;
            $object=new $className;
            $error= $object->check($name,$value);
            if($error !== false){
                $this->errors[] = $error;
                break;
           } 
        }
    }

    public function getErrors() : array{      
               return $this->errors;       
    }
    public function hasErrors(){
        return ! empty($this->errors);  
    }
}

