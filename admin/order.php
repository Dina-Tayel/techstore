<?php

use TechStore\Classes\Models\Order;

 include("inc/header.php"); ?>
<?php 

if($request->gethas("id")){
  $id=$request->get("id");
}
$ord=new Order;
$order=$ord->select("orders","orders.*")->where("orders.id","=","$id")->getRow();
$orders=$ord->select("orders","products.name AS productName , products.price, order_details.qty,qty*price AS total")
->join("inner","order_details","orders.id","order_details.order_id")
->join("inner","products","products.id","order_details.product_id")->where("orders.id","=","$id")
->getAllRows();
// print_r($orders);
// //,products.name AS productName , products.price, order_details.qty 
;
?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order of id : <?= $order["id"] ?> here</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Name</th>
                                <td><?= $order["name"] ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                <td><?= $order["email"] ?? "...." ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                <td><?= $order["phone"] ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                <td><?= $order["address"] ?? "...." ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Time</th>
                                <td><?= date("dM,Y h:i a",strtotime($order["created_at"])) ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Status</th>
                                <td><?= $order["status"] ?></td>
                              </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php foreach($orders as $or): ?>
                              <tr>
                                <td><?= $or["productName"] ?></td>
                                <td><?= $or["qty"] ?></td>
                                <td>$<?= $or["price"] ?></td>
                              </tr>
                              <?php endforeach; ?>
                  
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <?php if($order["status"]== "pending"): ?>
                                    <th>Change Status</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>$<?= $or["total"] ?></td>
                                <td>
                                <?php if($order["status"]== "pending"): ?>
                                    <a class="btn btn-success" href="<?= AURL . "handlers/handle-approve.php?id=". $order["id"] ?>">Approve</a>
                                    <a class="btn btn-danger" href="<?=  AURL . "handlers/handle-cancle.php?id=". $order["id"] ?>">Cancel</a>
                                </td>
                                <?php endif; ?>
                              </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark" href="<?= AURL . "orders.php" ?>">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
<?php include("inc/footer.php"); ?>