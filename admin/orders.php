<?php

use TechStore\Classes\Models\Order;

 include("inc/header.php"); ?>
<?PHP 
 $ord=new Order;
 $orders=$ord->select("orders","orders.id,orders.name,orders.phone,orders.status,orders.created_at,SUM(qty*price)AS total")
 ->join("inner","order_details","orders.id","order_details.order_id")
 ->join("inner","products","products.id","order_details.product_id")->groupBy("orders.id")
 ->getAllRows();
 ;
// print_r($orders);

?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Orders</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($orders as $index=>$order): ?>
                      <tr>
                        <td><?= $index+1 ?></td>
                        <td><?= $order["name"] ?></td>
                        <td><?= $order["phone"] ?></td>
                        <td>$<?= $order["total"] ?></td>
                        <td><?= date("dM,Y h:i a",strtotime($order["created_at"])) ?></td>
                        <td><?= $order["status"] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?= AURL . "order.php?id=" . $order["id"] ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
<?php include("inc/footer.php"); ?>