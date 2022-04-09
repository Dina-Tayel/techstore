<?php

use TechStore\Classes\Models\Product;

  include "inc/header.php" ?>

<?php 

if($request->getHas("id")){
	$id=$request->get("id");
}else{
	$id=1;
}
$pro=new Product;


$pro=new Product;$prod=$pro->select("products","products.id AS proId,products.name AS proName,price,`desc`,img,cats.name AS cat_name")
->join("inner","cats","products.cat_id","cats.id")->where("products.id","=",$id)->getRow();
// print_r($prod);
// echo $id;
?>
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<!-- <div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/single_4.jpg"><img assets/images/single_4.jpg" alt=""></li>
						<li data-image="images/single_2.jpg"><img assets/images/single_2.jpg" alt=""></li>
						<li data-image="images/single_3.jpg"><img assets/images/single_3.jpg" alt=""></li>
					</ul>
				</div> -->

				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><img src="<?=  URL."uploads/".$prod["img"]?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description">
						<div class="product_category"><?= $prod["cat_name"] ?></div>
						<div class="product_name"><?= $prod["proName"] ?></div>
						<div class="product_text"><p> <?= $prod["desc"] ?></p></div>
						<div class="order_info d-flex flex-row">
							<form method="POST" action="<?php URL ?> handlers/add-cart.php">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" name="qty" pattern="[0-9]*" value="1">
										<input type="hidden" name="id" value="<?= $prod["proId"] ?>">
										<input type="hidden" name="name" value="<?= $prod["proName"] ?>">
										<input type="hidden" name="price" value="<?=$prod["price"] ?>">
										<input type="hidden" name="img" value="<?php URL ?>uploads/<?= $prod["img"] ?>">
										
										
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

                                    <div class="product_price">$<?= $prod["price"] ?></div>

								</div>
								<?php if(! $cart->has($prod["proId"] )): ?>

								<div class="button_container">
									<button type="submit" name="submit"  class="button cart_button">Add to Cart</button>
								</div>
								<?php endif; ?>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<?php  include "inc/footer.php" ?>