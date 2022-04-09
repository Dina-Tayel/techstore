<?php
 require_once ("../app.php");
use TechStore\Classes\Cart;


  if($request->getHas("id")){
     $id= $request->get("id");
     unset($_SESSION['cart'][$id]);
     $cart=new Cart;
     $cart->redirect("cart.php");
  }
