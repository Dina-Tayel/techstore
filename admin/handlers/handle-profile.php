<?php

require_once("../../app.php");

use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;

if($request->postHas("submit")){
    $name=$request->post("name");
    $email=$request->post("email");
    $password=$request->post("password");
    $confirm_password=$request->post("confirm_password");
   
    // validation
    $validator=new Validator;
    $validator->validate("name",$name,['required','str','max']);
    $validator->validate("email",$email,['required','email','max']);
    if(!empty($password) and $password==$confirm_password){
        $validator->validate("password",$password,['required','str','max']);

    }

    // get validation errors
    if($validator->hasErrors()){
        $session->setSession("errors",$validator->getErrors());
        $request->aredirect("profile.php");
    }else{
        $admin=new Admin();
        if(!empty($password)){
            // update query with password
            $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
            $id=$session->getSession("adminId") ;
            $admin->update("admins",["name"=>$name,"email"=>$email,"password"=>$hashedPassword])->where("id","=",$id)->excute();
        }else{
            // update query without password
            $id=$session->getSession("adminId") ;
           $admin->update("admins",["name"=>$name,"email"=>$email])->where("id","=",$id)->excute();
        }
        $session->setSession("success","profile updated successfully");
        $request->aredirect("handlers/handle-logout.php"); 
    }


}else{
    $request->aredirect("login.php");
}