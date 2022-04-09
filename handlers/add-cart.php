<?php
 require_once ("../app.php");
use TechStore\Classes\Cart;


 if($request->postHas("submit")){
    $id=$request->post("id");
    $name=$request->post("name");
    $qty= $request->post("qty");
    $price=$request->post("price");
    $img=$request->post("img");

    
 $products_data=["name"=>$name,"price"=>$price,"qty"=>$qty,"img"=>$img];
 $cart=new Cart;
$c= $cart->add($id,$products_data);
$cart->redirect("products.php");
// //  unset($_SESSION['catr']);
//  echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>"; 
 }


// echo $qty;
// echo "<br>";
// echo $id;
// echo "<br>";
// echo $price;
// echo $img;
?>