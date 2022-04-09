<?php

use TechStore\Classes\Models\Order;

require "../../app.php";
if($request->getHas("id")){
    $id=$request->get("id");
}
$ord=new Order;
$ord->update("orders",["status"=>"canceled"])->where("id","=","$id")->excute();
$session->setSession("success","Order Approved");
$request->aredirect("order.php?id=".$id );
// print_r($ord);
// AURL . "order.php?id=" . $order["id"]