<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");
if($request->postHas('submit')){
    $name=$request->post("name");

    //validation
    $validator=new Validator;
    $validator->validate("name",$name,['required','max','str']);
    if($validator->hasErrors()){
        $session->setSession("errors",$validator->getErrors());
        $request->aredirect("add-category.php");

    }else{
        $c=new Cat;
       $c->insert("cats",['name'=>$name])->excute();
    //    print_r($cat);die;
        $session->setSession("success","Category is added successfully:)");
        $request->aredirect("categories.php");
        
    }
    
}else{
   $request->aredirect("add-category.php"); 
}