<?php  include "inc/header.php" ?>
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<?php if($session->sessionHas('errors')): ?>
								<div class="alert alert-danger">
									<?php foreach($session->getSession("errors") as $error): ?>
									<p class="mb-3"><?= $error; ?></p>
									<?php endforeach;$session->remove("errors") ?>
								</div>
								<?php endif; ?>
								<?php if ($cart->getAll()): ?>
								<?php foreach($cart->getAll() as $id=>$cartProds): ?>
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="<?= $cartProds['img']; ?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
											
											<div class="cart_item_text"><?= $cartProds['name'] ?></div>
										</div>
										<div class="cart_item_quantity cart_info_col">
							
											<div class="cart_item_text"><?= $cartProds['qty'] ?></div>
										</div>
										<div class="cart_item_price cart_info_col">
											
											<div class="cart_item_text">$<?= $cartProds['price'] ?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											
											<div class="cart_item_text">$<?= $cartProds['price'] * $cartProds['qty'] ?></div>
                                        </div>
                                        <div class="cart_item_action cart_info_col">
											<div class="cart_item_title">Remove</div>
											<div class="cart_item_text">
                                                <a href="<?php URL ?>handlers/remove-cart.php?id=<?= $id ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
										</div>
									</div>
								</li>
								<?php endforeach; ?>
								<?php endif; ?>
							</ul>
							
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">$<?= $cart->total(); ?></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>
    
    <div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Fill in your info</div>
						<?php if($session->sessionHas('errors')): ?>
						<div class="alert alert-danger">
							<?php foreach($session->getSession("errors") as $error) : ?>
										<p><?= $error; ?></p>
							<?php endforeach; ?>

						</div>
						<?php  endif ;?>
						<form method="POST" action="<?= URL; ?>handlers/add-order.php" id="order_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="name" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name">
								<input type="text" name="email" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email">
								<input type="text" name="phone" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
							</div>
							<div class="contact_form_text">
								<textarea name="address" id="contact_form_message" class="text_field contact_form_message" rows="4" placeholder="Your address"></textarea>
							</div>
							
							<div class="contact_form_button">
								<button type="submit" name="submit" class="button contact_submit_button">Submit Order</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
    </div>
    
	<?php  include "inc/footer.php" ?>