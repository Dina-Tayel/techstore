<?php

use TechStore\Classes\Models\Product;

require_once("../../app.php");
if($request->getHas("id")){
    $id=$request->get("id");
    
    $pr=new Product;
    $prod=$pr->select("products","img")->where("id","=",$id)->getRow();
    $imgName=$prod["img"];
    unlink(PATH . "uploads/$imgName");
    
    $pr->delete("products")->where("id","=","$id")->excute();

    $session->setSession("success","producet is deletd successfully");
    $request->aredirect("products.php");

}else{
    $id=1;
}