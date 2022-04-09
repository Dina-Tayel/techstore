<?php

use TechStore\Classes\Models\Product;

  include "inc/header.php" ?>

<?php 
if($request->getHas("id")){
	$id= $request->get("id");
}else{
	$id=1;
}
$ctegory=$c->select("cats")->where("id","=","$id")->getRow();
$pro=new Product;
$prods=$pro->select("products","id,name,price,img")->where("cat_id","=","$id")->getAllRows();
// print_r($prods);
// echo $id;
?>
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?=  URL ?>assets/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">
				<?php if(!empty($ctegory)): ?>
				<?= $ctegory['name']; ?>
				<?php else : ?>
					<?= "No Category found" ?>
				<?php endif; ?>
			</h2>
		</div>
	</div>

	<!-- Shop -->
<?php if (!empty($ctegory)): ?>
	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
							<?php foreach($cats as $cat): ?>
									<li><a href="category.php?id=<?= $cat["id"]?>"><?= $cat['name'] ?> 
										 <i class="fas fa-chevron-right ml-auto"></i></a></li>
										 <?php endforeach; ?>
								<!-- <li><a href="#">Cameras & Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones & Tablets</a></li>
								<li><a href="#">TV & Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games & Consoles</a></li>
								<li><a href="#">Accessories</a></li> -->
							</ul>
						</div>
						
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">

						<div class="product_grid">
							<div class="product_grid_border"></div>


							<!-- Product Item -->

							<?php foreach($prods as $prod):?>
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center">
									<img src="<?= URL. "uploads/".$prod['img'] ?>" alt=""></div>
								<div class="product_content">
									<div class="product_price">$<?= $prod['price'] ?></div>
									<div class="product_name"><div>
										<a href="<?php URL; ?>product.php?id=<?=$prod['id'] ?> " tabindex="0"><?= $prod['name'] ?></a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-cart-plus"></i></div>
							</div>
							<?php endforeach; ?>

						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		<div class="shop">

		</div>	
<?php endif; ?>
	<?php  include "inc/footer.php" ?>