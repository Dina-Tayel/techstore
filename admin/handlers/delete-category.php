<?php

use TechStore\Classes\Models\Cat;

require_once("../../app.php");
if($request->getHas("id")){
    $id=$request->get("id");
    $c=new Cat;
    $c->delete("cats")->where("id","=",$id)->excute(); 
    $session->setSession("success","category deletd successfully");
    $request->aredirect("categories.php");
    
}else{
    $id=1;
}