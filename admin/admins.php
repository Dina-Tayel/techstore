<?php

use TechStore\Classes\Models\Admin;

 include("inc/header.php"); ?>

<?php 
$admin=new Admin;
$adminData=$admin->select("admins")->getRow();
// print_r($adminData);
?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td><?= $adminData["name"] ?></td>
                        <td><?= $adminData["email"] ?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="#">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
 <?php include("inc/footer.php"); ?>