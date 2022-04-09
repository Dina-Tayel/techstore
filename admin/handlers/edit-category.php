<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");
if($request->postHas("submit")){
    $id=$request->post("id");
    $name=$request->post("name");

    // validation
    $validator=new Validator;
    $validator->validate("name",$name,['required','max','str']);
    if($validator->hasErrors()){
        $session->setSession("errors",$validator->getErrors());
        $request->aredirect("edit-category.php?id=$id");
    }else{
        $c=new Cat;
       $c1= $c->update("cats",["name"=>$name])->where("id","=",$id)->excute();
    //    print_r($c1);die;
        $session->setSession("success","Ctegory is updated successfilly !");
        $request->aredirect("categories.php");
    }

}else{
    $request->aredirect("edit-category.php");
}