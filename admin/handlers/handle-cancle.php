<?php

use TechStore\Classes\Models\Order;

require "../../app.php";
if($request->getHas("id")){
    $id=$request->get("id");
}
$ord=new Order;
$ord->update("orders",["status"=>"cancled"])->where("id","=","$id")->excute();
$session->setSession("success","Order cancled");
$request->aredirect("order.php?id=".$id );









