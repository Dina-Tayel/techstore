<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");
if($request->postHas("submit")){
    $id=$request->post("id");
    $name=$request->post("name");
    $pieces_no=$request->post("pieces_no");
    $price=$request->post("price");
    $desc=$request->post("desc");
    $img=$request->files("img");
    $cat_id=$request->post("cat_id");
    
    // validation
    $validator=new Validator;
    $validator->validate("name",$name,['required','max','str']);
    $validator->validate("cat_id",$cat_id,['required','numeric']);
    $validator->validate("price",$price,['required','numeric']);
    $validator->validate("pieces_no",$pieces_no,['required','numeric']);
    $validator->validate("desc",$desc,['required','str']);
    if($img['error'] == 0){
        $validator->validate("img",$img,['image']);
    }
    if($validator->hasErrors()){
       $session->setSession("errors",$validator->getErrors());
       $request->aredirect("edit-product.php?id=$id");
    }else{
        $pr=new Product;
        $prod=$pr->select("products","img")->where("id","=",$id)->getRow();
        $imgName=$prod['img'];
        // echo $imgName;die;
        if($img['error'] == 0){
        unlink(PATH . "uploads/$imgName");
        $file=new File($img);
        $imgName=$file->rename()->upload();
        }

       $podas= $pr->update("products",['name'=>$name,'cat_id'=>$cat_id,'price'=>$price,
        'pieces_no'=>$pieces_no,'desc'=>$desc,'img'=>$imgName])->where("id","=",$id)->excute();
        // print_r($podas);die;
           
        // MAKING FLASH MESSEGE
        $session->setSession("success","Product is updated successfilly !");
        $request->aredirect("products.php");

    }
  
 
}else{
    $request->aredirect("edit-products.php");
}