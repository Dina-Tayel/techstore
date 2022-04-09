<?php

// require_once "classes/Request.php";
// require_once "classes/Session.php";
// require_once "classes/models/Db.php";
// require_once "classes/models/Order.php";
// require_once "classes/vlaidation/ValidationRule.php";
// require_once "classes/vlaidation/Max.php";
// require_once "classes/vlaidation/Required.php";
// require_once "classes/vlaidation/Numeric.php";
// require_once "classes/vlaidation/Str.php";
// require_once "classes/vlaidation/Email.php";
// require_once "classes/vlaidation/Validator.php";

use TechStore\Classes\Cart;
use TechStore\Classes\Models\Admin;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once("app.php");

// // // class request
// // $request=new Request();
// // var_dump($request->getHas('username')) ;
// // echo $request->get('username');

// // // class session

// // $session=new Session();
// // $session->setSession('name','dina tayel');
// // $session->setSession('address','cairo');
// // print_r($_SESSION);
// // echo "<br>";
// // $value=$session->getSession('name');
// // print_r($value);
// // echo "<br>";
// // $session->remove('name');
// // print_r($_SESSION);
// // echo "<br>";
// // $session->destroy();
// // print_r($_SESSION);
// // echo "<br>";

// // class Db

// // $db=new Order();
// // print_r($db->select('cats')->getAllRows());
// // print_r($db->getCount('name','cats'));
// // $data=['name'=>"dina",'title'=>"kjsao"];
// // print_r($db->select("products")->search("name","lenovo")->getAllRows());
// // print_r($db->select('cats')->where("id","=","2")->andWhere("name","=","Laptops")->getRow());
 
// // validation

// $v= new Validator;
// $v->validate('age',8768,['Required','Numeric']);
// echo "<pre>";
// print_r($v->getErrors());
// echo "</pre>";

// // // app.php
// // echo $absolute_path;
// echo PATH;
// // echo URL;
// ECHO $request->get('name');
// if($request->getHas("id")){
// 	$id=$request->get("id");
// }else{
// 	$id=1;
// }
// $pro=new Product;$prod=$pro->select("products","products.id AS proId,products.name AS proName,price,img,cats.name AS cat_name")
// ->join("inner","cats","products.cat_id","cats.id")->where("products.id","=",$id)->getRow();// print_r($prod);
// // echo $id;
// print_r($prod);
//SELECT products.id AS proId,products.name AS proName,price,img,cat_id FROM products 
//  JOIN `cats` ON products.id = cat_id
//  WHERE products.id=1;

// if($request->getHas("keyword")){
// 	$keyword=$request->get("keyword");
// }else{
// $keyword="";
// }
// // echo $keyword;

// $pr=new Product;
// $prod=$pr->select("products","name,price,img")->search("name","=",$keyword);
// echo "<pre></pre>";
// print_r($prod);

// if($request->postHas("submit")){
//     $id=$request->post("id");
//     $name=$request->post("name");
//     $qty= $request->post("qty");
//     $price=$request->post("price");
//     $img=$request->post("img");

    
//  $products_data=["name"=>$name,"price"=>$price,"qty"=>$qty,"img"=>$img];
 $cart=new Cart;
//  $cart->add($id,$products_data);
//  $cart->redirect("products.php");

//  echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>"; 
//  }
// $name="dina";
// $email="dinjhai";
// $phone="lkljzx";
// $address="lkzJXo";

// $order=new Order;
// $orderDetail=new OrderDetail;
// $cart=new Cart;
//   $orderId=$order->insertAndGetId("orders",
//   ['name'=>$name,'email'=>$email,'phone'=>$phone,'phone'=>$address]);

// 	foreach($cart->getAll() as $productId=>$productData){
// 		$qty=$productData['qty'];
// 		echo "<pre>";
// 		print_r($orderDetail->insert("order_details",["order_id"=>$orderId,"product_id"=>$productId,"qty"=>$qty]))
// 		;
	
// 	}


// $admin=new Admin;
// $res=$admin->login("dina@gmail.com",'123456',$session);
// echo"<pre>";
// var_dump($res);
// print_r($_SESSION);
// echo "</pre>";

// $admin->logout($session);
// echo"<pre>";

// print_r($_SESSION);
// echo "</pre>";
$v=new Validator;
$v1=$v->validate('age','123',['required','str']);
print_r($v);