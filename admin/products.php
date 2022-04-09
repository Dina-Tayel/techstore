<?php

use TechStore\Classes\Models\Product;

 include("inc/header.php"); ?>
<?php 
 $pro=new Product;
$prods=$pro->select("products","products.id AS proId,products.name AS proName,
price,pieces_no,img,products.created_at,cats.name AS catName")
->join("inner","cats","products.cat_id","cats.id")->order("products.id","DESC")->getAllRows();
// print_r($prod);


?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Products</h3>
                    <a href="<?= AURL. "add-product.php" ?>" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pieces</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($prods as $index=>$prod): ?>
                      <tr>
                        <th scope="row"><?= $index+1 ?></th>
                        <td><?= $prod["proName"] ?></td>
                        <td><?= $prod["catName"] ?></td>
                        <td>
                            <img src="<?= URL . "uploads/".  $prod["img"]?>" height="50px" alt="">
                        </td>
                        <td><?= $prod["pieces_no"] ?></td>
                        <td>$<?= $prod["price"] ?></td>
                        <td><?= date("d M Y h:i A",strtotime($prod["created_at"]))  ?></td>
                        
                        <td>
                            <!-- <a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-eye"></i>
                            </a> -->
                            <a class="btn btn-sm btn-info" href="<?= AURL."edit-product.php?id=". $prod["proId"] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="<?= AURL."handlers/delete-product.php?id=" . $prod["proId"] ?>">
                                <i class="fas fa-trash"></i>
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
