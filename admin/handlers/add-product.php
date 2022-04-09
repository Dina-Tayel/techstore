<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once("../../app.php");

if($request->postHas("submit")){
    $name=$request->post('name');
    $cat_id=$request->post("cat_id");
    $price=$request->post("price");
    $pieces_no=$request->post("pieces_no");
    $desc=$request->post("desc");
    $img=$request->files("img");
    
    // validation

    $validator=new Validator;
    $validator->validate("name",$name,['required','max','str']);
    $validator->validate("cat_id",$cat_id,['required','numeric']);
    $validator->validate("price",$price,['required','numeric']);
    $validator->validate("pieces_no",$pieces_no,['required','numeric']);
    $validator->validate("desc",$desc,['required','str']);
    $validator->validate("img",$img,['RequiredFiles','image']);
    // $validator->validate("img",$img,)

    if($validator->hasErrors()){
        $session->setSession("errors",$validator->getErrors());
        $request->aredirect("add-product.php");
    }else{
        //uploaed imege
        $file=new File($img);
        $imgUploadName=$file->rename()->upload();

        //db query
        $pr=new Product;
        $pr->insert("products",["name"=>$name,"desc"=>$desc,"price"=>$price,"cat_id"=>$cat_id,"img"=>$imgUploadName,"pieces_no"=>$pieces_no])->excute();
        
        
        // MAKING FLASH MESSEGE
        $session->setSession("success","Product is added successfilly !");
        $request->aredirect("products.php");
    }

}else{
    $request->aredirect("add-product.php");
}