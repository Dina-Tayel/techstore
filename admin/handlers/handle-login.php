<?php
require_once("../../app.php");

use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;
if($request->postHas("submit")){
    
    // get values from the form

    $email=$request->post("email");
    $password=$request->post("password");

    // validation 

    $validator=new Validator;
    $validator->validate("email",$email,['required','email','max']);
    $validator->validate("password",$password,['required','numeric','max']);

    // errors check if we have errors put these in session to print these in form
    if($validator->hasErrors()){
        $session->setSession("errors",$validator->getErrors());
        $request->aredirect("login.php");
    }else{
     
        $admin=new Admin;
        $isLogin=$admin->login($email,$password,$session);
        if($isLogin){
            $request->aredirect("index.php");
        }else{
            $session->setSession('errors',['credentials are not correct']); 
            $request->aredirect("login.php");
        }
    }
}else{
    $request->aredirect("login.php");
}





// $admin=new Admin;
// $isLogin=$admin->login($email,$password,$session);
// if($isLogin){
//     $request->aredirect("index.php");
// }else{
//     $session->setSession('errors',['credentials are not correct']); 
//     $request->aredirect("login.php");
// }
