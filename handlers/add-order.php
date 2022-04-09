<?php
 require_once ("../app.php");
 use TechStore\Classes\Cart;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;
use TechStore\Classes\Validation\Validator;
$cart=new Cart;
 if($request->postHas("submit") and $cart->count() != 0){
     $name=$request->post("name");
     $email=$request->post("email");
     $phone=$request->post("phone");
     $address=$request->post("address");

     // vaildation
    
     $validator=new Validator ;
     $validator->validate('name',$name,['required','str','max']);

     if(!empty($email)){
     $validator->validate('email',$email,['email','max']);
     }else{
       $email="NULL";
     }

     $validator->validate('phone',$phone,['required','max']);

     if(!empty($address)){
     $validator->validate('address',$address,['max','str']);
     }else{
       $address="NULL";
     }

     if($validator->hasErrors()){
        $session->setSession("errors",$validator->getErrors());
        $request->redirect("cart.php");
     }else{
      $order=new Order;
      $orderDetail=new OrderDetail;
      
        $orderId=$order->insertAndGetId("orders",
        ['name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address]);
      
          foreach($cart->getAll() as $productId=>$productData){
              $qty=$productData['qty'];
              echo "<pre>";
              $orderDetail->insert("order_details",["order_id"=>$orderId,"product_id"=>$productId,"qty"=>$qty])->excute();
             $cart->empty();
              $request->redirect("products.php");
          
          }
     }


 }else{
  $request->redirect("products.php");
 }