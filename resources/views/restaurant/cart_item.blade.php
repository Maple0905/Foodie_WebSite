				

				<?php if(@$order_complete){ ?>

					<div class="d-flex siddhi-cart-item-profile bg-white p-3">

						<p>{{trans('lang.your_order_placed_successfully')}}</p>

					</div>

				<?php } ?>

				<?php /* if(@$cart['restaurant']['id']){  ?>

							<div class="d-flex siddhi-cart-item-profile bg-white p-3">

								<img alt="siddhi" src="<?php echo @$cart['restaurant']['image']; ?>" class="mr-3 rounded-circle img-fluid">

								<div class="d-flex flex-column mt-3">

									<h6 class="mb-1 font-weight-bold"><?php echo @$cart['restaurant']['name']; ?></h6>

									<p class="mb-0 small text-muted">

										<i class="feather-map-pin"></i> <?php echo @$cart['restaurant']['location']; ?>

									</p>

								</div>

							</div>

				<?php }else{ ?>



					<div class="d-flex border-bottom siddhi-cart-item-profile bg-white p-3" id="restaurant_place" style="display: none;">

						<img alt="siddhi" id="restaurant_image_place" src="" style="display:none;" class="mr-3 rounded-circle img-fluid">

						<div class="d-flex flex-column mt-3">

							<h6 class="mb-1 font-weight-bold" id="restaurant_name_place"></h6>

							<p class="mb-0 small text-muted" id="restaurant_location_place">

								<i class="feather-map-pin"></i>

							</p>

						</div>

					</div>



				<?php }  */ ?>	

			<?php $item_count=0; $total_price=0; $total_item_price=0;  if(@$cart['item']){ foreach ($cart['item'] as $key => $value_restaurant) {  $item_count++; ?>
				<div class="sidebar-header p-3">
					<h3 class="font-weight-bold h6 w-100">{{trans('lang.cart')}}</h3>
				</div>
				<div class="bg-white p-3 sidebar-item-list">
					<h6 class="pb-3">{{trans('lang.item')}}</h6>

				<input type="hidden" name="main_restaurant_id" value="<?php echo @$key; ?>" id="main_restaurant_id">

					<?php foreach ($value_restaurant as $key1 => $value_item) { ?>



				<div class="product-item gold-members row align-items-center py-2 border mb-2 rounded-lg m-0" id="item_<?php echo @$key1; ?>" data-id="<?php echo @$key1; ?>">

					<input type="hidden" id="price_<?php echo @$key1; ?>" value="<?php echo floatval($value_item['price'])+ floatval($value_item['extra_price']); ?>">
					<input type="hidden" id="item_price_<?php echo @$key1; ?>" value="<?php echo floatval($value_item['item_price']);?>">


					<input type="hidden" id="photo_<?php echo @$key1; ?>" value="<?php echo $value_item['image']; ?>">

					<input type="hidden" id="name_<?php echo @$key1; ?>" value="<?php echo $value_item['name']; ?>">

					<input type="hidden" id="quantity_<?php echo @$key1; ?>" value="<?php echo $value_item['quantity']; ?>">

										<div class="media align-items-center col-md-6">

											<?php //var_dump($value_item); 
											 if ( isset($value_item['veg']) && $value_item['veg'] === "true" ) { ?>
												
												<div class="mr-2 text-success veg">
													&middot;
												</div>
											<?php }else{ ?>
												<div class="mr-2 text-danger non_veg">
												&middot;
												</div>
											<?php } ?>


											<div class="media-body">

												<p class="m-0">

													<?php echo $value_item['name']; ?>

												</p>

												<?php if(@$value_item['extra']){ ?>

													<div class="extras">

													<span>{{trans('lang.extra')}}</span>

													<?php if(@is_array($value_item['extra'])){ foreach ($value_item['extra'] as $key3 => $extra) { ?>

													<input type="hidden" class="extras_<?php echo @$key1; ?>" value="<?php echo $extra; ?>">

														<p><?php echo $extra; ?></p>

													<?php } } ?>

													</div> 

												<?php } ?>

												<input type="hidden" id="extras_price_<?php echo @$key1; ?>" value="<?php echo @$value_item['extra_price']; ?>">

												<?php if(@$value_item['size']){ ?>

													<div class="size">

													<span>{{trans('lang.size')}}</span>

														<p><?php echo $value_item['size']; ?></p>

													</div>

												<?php } ?>

												<input type="hidden" id="size_<?php echo @$key1; ?>" value="<?php echo @$value_item['size']; ?>">
												<input type="hidden" id="vegs_<?php echo @$key1; ?>" value="<?php echo @$value_item['veg']; ?>">

											</div>



										</div>

										<div class="d-flex align-items-center count-number-box col-md-5">

											<span class="count-number float-right">

												<button type="button" data-restaurant="<?php echo $key; ?>" data-id="<?php echo $key1; ?>" class="count-number-input-cart btn-sm left dec btn btn-outline-secondary">

													<i class="feather-minus"></i>

												</button>

												<input class="count-number-input count_number_<?php echo $key1; ?>"  type="text" readonly value="<?php echo $value_item['quantity']; ?>">

												<button type="button" data-restaurant="<?php echo $key; ?>" data-id="<?php echo $key1; ?>" class="count-number-input-cart btn-sm right inc btn btn-outline-secondary">

													<i class="feather-plus"></i>

												</button></span>

											<p class="text-gray mb-0 float-right ml-3 text-muted small">
												<span class="currency-symbol-left"></span><span class="cart_iteam_total_<?php echo $key1; ?>"><?php echo @floatval($value_item['price'])+ (@floatval($value_item['iteam_extra_price']) * @floatval($value_item['quantity'])); ?></span><span class="currency-symbol-right"></span>

											</p>

										</div>

										<div class="close remove_item col-md-1" data-restaurant="<?php echo $key; ?>" data-id="<?php echo $key1; ?>"><i class="fa fa-times"></i></div>

									</div>

									<?php $total_price=$total_price+(floatval($value_item['price'])+( @floatval($value_item['iteam_extra_price']) * @floatval($value_item['quantity']))); } ?>




							<?php } ?> 
							<?php $total_item_price=$total_price; ?>
							</div>



							<div class="bg-white px-3 clearfix">
                               
                               <div class="border-bottom pb-3">
								<div class="input-group-sm mb-2 input-group">

									<input placeholder="Enter promo code" data-restaurant="<?php echo @$key1; ?>" value="<?php echo @$cart['coupon']['coupon_code'] ?>" id="coupon_code" type="text" class="form-control">

									<div class="input-group-append">

										<button type="button" class="btn btn-primary"  id="apply-coupon-code">

											<i class="feather-percent"></i> {{trans('lang.apply')}}

										</button>

									</div>

								</div>
								</div>

								<!-- <div class="mb-0 input-group">

									<div class="input-group-prepend">

										<span class="input-group-text"><i class="feather-message-square"></i></span>

									</div>

									<textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control"></textarea>

								</div> -->

							</div>



							<?php  } ?>

							

						<?php if($item_count==0){ ?>

							<div class="bg-white border-bottom py-2">

								<div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom"><span>{{trans('lang.your_cart_is_empty')}}</span>

								</div>

							</div>

						<?php } ?>

				<?php 

				if(@$cart['tip_amount']){

					$tip_amount=$cart['tip_amount'];

				}else{

					$tip_amount='';

				}

				?>



				<div class="bg-white p-3 clearfix delivery-box">

						<h3>{{trans('lang.delivery_option')}}</h3>

						<div class="delevery-option">
							<?php $delivery_option=''; 
								  if(@$cart['delivery_option']){
									$delivery_option=$cart['delivery_option'];
								  }else{ 
								  	
								  	$delivery_option=@$cart['delivery_option'];
								  	Session::get('takeawayOption');
								  	if(Session::get('takeawayOption')=="true"){
								  		$delivery_option="takeaway";	
								  	}else{
								  		$delivery_option="delivery";	
								  	}
								  } ?>
							<input type="hidden" name="delivery_option" value="<?php echo $delivery_option; ?>">
							<?php if($delivery_option=="takeaway"){ ?>
								<label class="custom-control-labels" for="takeaway">{{trans('lang.take_away')}}({{trans('lang.free')}})</label>
							<?php }else{ ?>
								<label class="custom-control-labels" for="takeaway">Delivery <?php if(@$cart['deliverychargemain']){ ?> (<span class="currency-symbol-left"></span><?php echo @$cart['deliverychargemain']; ?><span class="currency-symbol-right"></span>) <?php } ?></label>
							<?php } ?>

							<?php /*
							<div class="custom-control custom-radio border-bottom py-2">

					            <input type="radio" disabled name="delivery_option" id="delivery" value="delivery" class="this_delivery_option custom-control-input" <?php if(@$cart['delivery_option']!="takeaway"){ ?> checked <?php } ?>>

					            <label class="custom-control-label" for="delivery">Delivery($<?php echo @$cart['deliverychargemain']; ?>)</label>

					        </div>

					        <div class="custom-control custom-radio border-bottom py-2">

					            <input type="radio" disabled name="delivery_option" id="takeaway" value="takeaway" class="this_delivery_option custom-control-input" <?php if(@$cart['delivery_option']=="takeaway"){ ?> checked <?php } ?>>

					            <label class="custom-control-label" for="takeaway">Takeaway(Free)</label>

					        </div>
					        */?>

						</div>

				</div>	



				<div class="bg-white px-3 clearfix delevery-partner" style="<?php if(@$cart['delivery_option']=="takeaway"){ ?> display:none; <?php } ?>">
					<div class="border-bottom py-3">

						<h3>{{trans('lang.tip_your_delivery_partner')}}</h3>

						<span class="float-center">100% of the {{trans('lang.tip_go_to_your_delivery_partner')}}</span>

						<div class="tip-box">

							<div class="custom-control custom-radio border-bottom py-2">

					            <input type="radio" name="tip" id="10" value="10" class="this_tip custom-control-input" <?php if(@$tip_amount==10){ ?> checked <?php } ?>>

					            <label class="custom-control-label" for="10"><span class="currency-symbol-left"></span>10<span class="currency-symbol-right"></span></label>

					        </div>

					        <div class="custom-control custom-radio border-bottom py-2">

					            <input type="radio" name="tip" id="20" value="20" class="this_tip custom-control-input" <?php if(@$tip_amount==20){ ?> checked <?php } ?>>

					            <label class="custom-control-label" for="20"><span class="currency-symbol-left"></span>20<span class="currency-symbol-right"></span></label>

					        </div>

					        <div class="custom-control custom-radio border-bottom py-2">

					            <input type="radio" name="tip" id="30" value="30" class="this_tip custom-control-input" <?php if(@$tip_amount==30){ ?> checked <?php } ?>>

					            <label class="custom-control-label" for="30"><span class="currency-symbol-left"></span>30<span class="currency-symbol-right"></span></label>

					        </div>

					        <div class="custom-control custom-radio border-bottom py-2">

					            <input type="radio" name="tip" id="Other_tip" value="Other" class="custom-control-input" <?php if($tip_amount && (@$tip_amount!=10 && @$tip_amount!=20 && @$tip_amount!=30)){ ?> checked <?php } ?>>

					            <label class="custom-control-label" for="Other_tip">{{trans('lang.other')}}</label>

					        </div>

					        <div class="custom-control custom-radio border-bottom py-2" style="display: none;" id="add_tip_box">

					        	<input type="number" onchange="tipAmountChange()" name="tip_amount" id="tip_amount" value="<?php echo @$cart['tip_amount']; ?>">

					        </div>

					        

						</div>
					</div>

					</div>	

				

				<div class="bg-white p-3 clearfix btm-total">

					<p class="mb-2">

						{{trans('lang.sub_total')}} <span class="float-right text-dark"><span class="currency-symbol-left"></span><?php echo $total_price; ?><span class="currency-symbol-right"></span></span>

					</p>

					



					
					<?php if($item_count && $total_price && @$cart['deliverycharge']){ 
							
						?>

						<?php  $total_price=$total_price+$cart['deliverycharge']; ?>

						<p class="mb-2">

							{{trans('lang.deliveryCharge')}} <span class="float-right text-dark"><span class="currency-symbol-left"></span><?php echo @$cart['deliverycharge']; ?><span class="currency-symbol-right"></span> <?php if(@$cart['deliverykm']){ ?> (<?php echo round($cart['deliverykm'],2); ?>Km) <?php } ?> </span>

						</p>

					<?php } ?>

					<?php if($item_count && $tip_amount){ $total_price=$total_price+$tip_amount; ?>

						<p class="mb-2">

							{{trans('lang.tip_amount')}} <span class="float-right text-dark"><span class="currency-symbol-left"></span><?php echo $tip_amount; ?><span class="currency-symbol-right"></span></span>

						</p>

					<?php } ?>
					
						<?php if($item_count && $total_price && @$cart['tax_label'] && @$cart['tax']){ ?>
						
						<?php  $total_price=$total_price+$cart['tax']; ?>

						<p class="mb-2"><?php echo $cart['tax_label']; if(@$cart['taxValue']){ ?>  <?php if($cart['taxValue']['type']=='fix'){ ?> ( <span class="currency-symbol-left"></span><?php echo $cart['taxValue']['tax']; ?><span class="currency-symbol-right"></span> ) <?php }else{ ?> ( <?php echo $cart['taxValue']['tax']; ?> % ) <?php } ?> <?php } ?><span class="float-right text-dark"><span class="currency-symbol-left"></span><?php echo @$cart['tax']; ?><span class="currency-symbol-right"></span> </span>

						</p>

					<?php } ?>	
					
					<input type="hidden"  id="tax_label" value="<?php echo @$cart['tax_label']; ?>">

					<input type="hidden"  id="tax" value="<?php echo @$cart['tax']; ?>">

					<input type="hidden" value="<?php echo @$cart['deliverycharge']; ?>" id="deliveryCharge">

					<input type="hidden" value="" id="deliveryChargeMain">

					<input type="hidden" id="adminCommission" value="0">

					<input type="hidden" id="adminCommissionType" value="Fix Price">

					<!-- <p class="mb-1">

						Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">$10</span>

					</p> -->

					<!-- <p class="mb-1 text-success">

						Total Discount<span class="float-right text-success">$1884</span>

					</p> -->



					<?php  $discount_amount=0; $coupon_id=''; $coupon_code=''; $discount=''; $discountType=''; if(@$cart['coupon'] && $cart['coupon']['discountType']){ ?>

						<p class="mb-1 text-success">

							<?php $discountType=$cart['coupon']['discountType'];

								  $coupon_code=$cart['coupon']['coupon_code'];

								  $coupon_id=@$cart['coupon']['coupon_id'];

								  $discount=$cart['coupon']['discount'];

								if($discountType=="Fix Price"){

									$discount_amount=$cart['coupon']['discount'];	

								  	$total=$total_price-$discount_amount;

								  	if($discount_amount>$total){

										$discount_amount=$total;

									}

									if($total<0){

										$total=0;

									}

								}else{

									$discount_amount=$cart['coupon']['discount'];	

									$discount_amount=($total_item_price*$discount_amount)/100;

									$total=$total_price-$discount_amount;

									if($discount_amount>$total){

										$discount_amount=$total;

									}

									if($total<0){

										$total=0;

									}

								}



							 ?>

							{{trans('lang.total')}} {{trans('lang.discount')}} <span class="float-right text-success"><span class="currency-symbol-left"></span><?php echo $discount_amount; ?><span class="currency-symbol-right"></span></span>

						</p>

					<?php }else{ ?>

							<?php $total=$total_price; ?>

					<?php } ?>

					<hr>

					<input type="hidden"  id="discount_amount" value="<?php echo $discount_amount; ?>">

					<input type="hidden"  id="coupon_id" value="<?php echo $coupon_id; ?>">

					<input type="hidden"  id="coupon_code_main" value="<?php echo $coupon_code; ?>">

					<input type="hidden"  id="discount" value="<?php echo $discount; ?>">

					<input type="hidden"  id="discountType" value="<?php echo $discountType; ?>">

					<input type="hidden"  id="total_pay" value="<?php echo $total; ?>">

					<h6 class="font-weight-bold mb-0">{{trans('lang.total')}} <p class="float-right"><span class="currency-symbol-left"></span><span><?php echo $total; ?></span><span class="currency-symbol-right"></span></p></h6>


				</div>

				<div class="p-3">

					<?php if($item_count==0){ ?>

						<a class="btn btn-primary btn-block btn-lg disable" href="javascript:void(0)">{{trans('lang.pay')}} <span class="currency-symbol-left"></span><?php echo $total; ?><span class="currency-symbol-right"></span><i class="feather-arrow-right"></i></a>

					<?php }else if(@$is_checkout){ ?>

						<a class="btn btn-primary btn-block btn-lg" href="javascript:void(0)" onclick="finalCheckout()">{{trans('lang.pay')}} <span class="currency-symbol-left"></span><?php echo $total; ?><span class="currency-symbol-right"></span><i class="feather-arrow-right"></i></a>

					<?php }else{ ?>

						<a class="btn btn-primary btn-block btn-lg" href="{{route('checkout')}}">{{trans('lang.pay')}} <span class="currency-symbol-left"></span><?php echo $total; ?><span class="currency-symbol-right"></span><i class="feather-arrow-right"></i></a>

					<?php } ?>

				</div>
