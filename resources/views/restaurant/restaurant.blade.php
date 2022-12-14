@include('layouts.app')



@include('layouts.header')



<div class="offer-section py-3 resturant-banner">

	<div class="container position-relative">
       
       <div class="resturant-banner-inner"> 
		<img alt="#"  src="" class="restaurant-pic" id="restaurant-pic">
       </div>
	</div>

</div>

<div class="container">

	<div class="pb-3 rounded position-relative text-dark rest-basic-detail">

		<div class="d-flex align-items-start">

			<div class="text-dark">

			<h2 class="font-weight-bold h6" id="vendor_title"></h2>
			<div class="d-flex">

			<p class="text-dark m-0" id="vendor_address"><span class="fa fa-map-marker "></span> </p>
			<div class="rest-time">
				<span class="text-dark-50 font-weight-bold m-0 pl-3 time"></span><span class="text-dark m-0 font-weight-bold" id="vendor_open_time1"></span>
			    </div>
			</div>

			<div class="rating-wrap d-flex align-items-center mt-2" id="restaurant_ratings"></div>


		</div>

			<div class="feather_icon ml-auto">
			<!-- 	<a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i class="p-2 bg-light rounded-circle font-weight-bold  feather-upload"></i></a> -->
				<div class="row fu-review">
					<a href="javascript:goToRatingAndReviews()" class="text-decoration-none mx-1 p-2 rest-right-btn"><i class="font-weight-bold feather-star view_ratings_review"></i></a>
					<a  class="text-decoration-none mx-1 p-2 rest-right-btn restaurant_location_btn" target="_blank"><i class="font-weight-bold feather-map-pin"></i></a>
					<a href="{{route('contact_us')}}" class="btn">{{trans('lang.contact')}}</a>
				</div>
				<div class="row fu-time">					
					<a class="text-decoration-none mx-1 p-2 rest-right-btn" style="pointer-events: none">
						<span class="text-dark-50 font-weight-bold m-0 pl-3 time ">{{trans('lang.time')}} : </span>
						<span class="text-dark m-0 font-weight-bold" id="vendor_open_time"></span>
					</a>					
				</div>
				<div class="row fu-status">					
					<a class="text-decoration-none mx-1 p-2 rest-right-btn">
						<span class="text-dark m-0 font-weight-bold" style="pointer-events: none" id="vendor_shop_status"></span>
					</a>					
				</div>
					<div class="row fu-status">					
					<a class="text-decoration-none mx-1 p-2 rest-right-btn">
						<span class="text-dark m-0 font-weight-bold" style="pointer-events: none" id="vendor_shop_status"></span>
					</a>				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="container">
	<div class="">
		<p class="font-weight-bold pt-4 m-0">
			FEATURED ITEMS
		</p>
		<div id="most_popular_products" class="trending-slider"></div>
	</div>
</div> -->
<div class="container position-relative">

	<div class="pt-4 pb-2 title d-flex align-items-center">
		<h5 class="m-0">{{trans('lang.offers')}} & {{trans('lang.discount')}}</h5>
	</div>

<div class="offers-coupons mb-4" id="offers_coupons"></div>

	<div class="row">

		<div class="col-md-8 pt-3 restaurant-detail-left">

			<div class="mb-3 overflow-hidden" id="vendor_menu"></div>

			<div class="mb-3">

				<!--<div id="ratings-and-reviews" class="d-flex align-items-center py-3 mb-3 clearfix restaurant-detailed-star-rating border-bottom">

					<h6 class="mb-0">Rate this Place</h6>

					<div class="star-rating ml-auto">

						<div class="d-inline-block h6 m-0" id="vendor_review_star">

							

						</div>

						<b class="text-black ml-2" id="vendor_review_count"></b>

					</div>

				</div>

				<div class="py-2 mb-3 clearfix graph-star-rating">

					<h4 class="mb-0 mb-1 h6">Ratings and Reviews</h4>

					<p class="text-muted mb-4 mt-1 small" id="vendor_rated"></p>

					<div class="graph-star-rating-body">

						<div class="rating-list">

							<div class="rating-list-left font-weight-bold small">

								5 Star

							</div>

							<div class="rating-list-center">

								<div class="progress">

									<div role="progressbar" id="five_star_percent" class="progress-bar bg-info" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>

								</div>

							</div>

							<div class="rating-list-right font-weight-bold small" id="five_star"></div>

						</div>

						<div class="rating-list">

							<div class="rating-list-left font-weight-bold small">

								4 Star

							</div>

							<div class="rating-list-center">

								<div class="progress">

									<div role="progressbar" id="for_star_percent" class="progress-bar bg-info" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100"></div>

								</div>

							</div>

							<div class="rating-list-right font-weight-bold small" id="for_star"></div>

						</div>

						<div class="rating-list">

							<div class="rating-list-left font-weight-bold small">

								3 Star

							</div>

							<div class="rating-list-center">

								<div class="progress">

									<div role="progressbar" id="three_star_percent" class="progress-bar bg-info" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>

								</div>

							</div>

							<div class="rating-list-right font-weight-bold small" id="three_star"></div>

						</div>

						<div class="rating-list">

							<div class="rating-list-left font-weight-bold small">

								2 Star

							</div>

							<div class="rating-list-center">

								<div class="progress">

									<div role="progressbar" id="two_star_percent" class="progress-bar bg-info" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>

								</div>

							</div>

							<div class="rating-list-right font-weight-bold small" id="two_star"></div>

						</div>

						<div class="rating-list">

							<div class="rating-list-left font-weight-bold small">

								1 Star

							</div>

							<div class="rating-list-center">

								<div class="progress">

									<div role="progressbar" id="one_star_percent" class="progress-bar bg-info" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>

								</div>

							</div>

							<div class="rating-list-right font-weight-bold small" id="one_star"></div>

						</div>

					</div>

					<div class="graph-star-rating-footer text-center mt-3">

						<button type="button" class="btn btn-primary btn-block btn-sm">

							Rate and Review

						</button>

					</div>

				</div> -->

				<div class="py-2 mb-3 restaurant-detailed-ratings-and-reviews">

					<!-- <a class="text-primary float-right" href="javascript:void(0);">Top Rated</a> -->

					<h4 class="font-weight-bold h6 w-100 mb-3">{{trans('lang.ratings_and_reviews')}}</h4>

					<div id="customers_ratings_and_review"></div>

					<div class="see_all_review_div" style="display:none"><button class="btn btn-primary btn-block btn-sm see_all_reviews">
						{{trans('lang.see_all_reviews')}}</button></div>

					<p class="no_review_fount" style="display:none">{{trans('lang.no_review_found')}}</p>

				</div>





				<div id="map"></div>









				<!-- <div class="bg-white p-3 rating-review-select-page rounded shadow-sm">

					<h6 class="mb-3">Leave Comment</h6>

					<div class="d-flex align-items-center mb-3">

						<p class="m-0 small">

							Rate the Place

						</p>

						<div class="star-rating ml-auto">

							<div class="d-inline-block">

								<i class="feather-star text-warning"></i>

								<i class="feather-star text-warning"></i>

								<i class="feather-star text-warning"></i>

								<i class="feather-star text-warning"></i>

								<i class="feather-star"></i>

							</div>

						</div>

					</div>

					<form>

						<div class="form-group">

							<label class="form-label small">Your Comment</label>							<textarea class="form-control"></textarea>

</div>						<div class="form-group mb-0">

							<button type="button" class="btn btn-primary btn-block">

								Submit Comment

							</button>

						</div>

					</form>

				</div> -->

			</div>

		</div>

		<div class="col-md-4 pt-3 restaurant-detail-right">

			<div class="siddhi-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar" id="cart_list">
				<!-- <div class="sidebar-header p-3">
					<h3 class="font-weight-bold h6 w-100">Cart</h3>
				</div> -->

					@include('restaurant.cart_item')

					<?php /*

					<?php $total_price=0; ?>



					<?php if(@$cart['restaurant']['id'] && !empty($value_restaurant)){ ?>

					<div class="d-flex border-bottom siddhi-cart-item-profile bg-white p-3">

						<img alt="siddhi" src="<?php echo @$cart['restaurant']['image']; ?>" class="mr-3 rounded-circle img-fluid">

						<div class="d-flex flex-column">

							<h6 class="mb-1 font-weight-bold"><?php echo @$cart['restaurant']['name']; ?></h6>

							<p class="mb-0 small text-muted">

								<i class="feather-map-pin"></i> <?php echo @$cart['restaurant']['location']; ?>

							</p>

						</div>

					</div>

					<?php }else{ ?>



					<div class="d-flex border-bottom siddhi-cart-item-profile bg-white p-3" id="restaurant_place" style="display: none;">

						<img alt="siddhi" id="restaurant_image_place" src="" class="mr-3 rounded-circle img-fluid">

						<div class="d-flex flex-column">

							<h6 class="mb-1 font-weight-bold" id="restaurant_name_place"></h6>

							<p class="mb-0 small text-muted" id="restaurant_location_place">

								<i class="feather-map-pin"></i>

							</p>

						</div>

					</div>



					<?php } ?>

					<?php $item_count=0; ?>

				   <?php if(@$cart['item']){ foreach ($cart['item'] as $key => $value_restaurant) { ?>

					<div class="bg-white border-bottom py-2">

					<?php foreach ($value_restaurant as $key1 => $value_item) { if(@$key1==''){ continue; } ?>

					<?php $item_count++; ?>

					<div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom" id="item_<?php echo $key1; ?>">

										<div class="media align-items-center">

											<div class="mr-2 text-danger">

												&middot;

											</div>

											<div class="media-body">

												<p class="m-0">

													<?php echo $value_item['name']; ?>

												</p>

												<?php if(@$value_item['extra']){ ?>

													<div class="extras">

													<span>Extra</span>

													<?php foreach ($value_item['extra'] as $key3 => $extra) { ?>

														<p><?php echo $extra; ?></p>

													<?php } ?>

													</div> 

												<?php } ?>

												<?php if(@$value_item['size']){ ?>

													<div class="size">

													<span>Size</span>

														<p><?php echo $value_item['size']; ?></p>

													</div>

												<?php } ?>

											</div>



										</div>

										<div class="d-flex align-items-center">

											<span class="count-number float-right">

												<button type="button" data-restaurant="<?php echo $key; ?>" data-id="<?php echo $key1; ?>" class="count-number-input-cart btn-sm left dec btn btn-outline-secondary">

													<i class="feather-minus"></i>

												</button>

												<input class="count-number-input count_number_<?php echo $key1; ?>"  type="text" readonly value="<?php echo $value_item['quantity']; ?>">

												<button type="button" data-restaurant="<?php echo $key; ?>" data-id="<?php echo $key1; ?>" class="count-number-input-cart btn-sm right inc btn btn-outline-secondary">

													<i class="feather-plus"></i>

												</button></span>

											<p class="text-gray mb-0 float-right ml-2 text-muted small">

												$<?php echo @$value_item['price']+@$value_item['extra_price']; ?>

											</p>

										</div>

										<div class="close remove_item" data-restaurant="<?php echo $key; ?>" data-id="<?php echo $key1; ?>"><i class="fa fa-trash"></i></div>

									</div>

									<?php $total_price=$total_price+(@$value_item['price']+@$value_item['extra_price']); } ?>

							<?php } ?>

								</div>

							 <?php } ?>

							<?php if($item_count==0){ ?>

								<div class="bg-white border-bottom py-2">

									<div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom"><span>Your Cart is Empty</span>

									</div>

								</div>

							<?php } ?>

				

				<?php //print_r($cart['coupon']); ?>

				<div class="bg-white p-3 py-3 border-bottom clearfix">

					<div class="input-group-sm mb-2 input-group">

						<input placeholder="Enter promo code" value="<?php echo @$cart['coupon']['coupon_code'] ?>" id="coupon_code" type="text" class="form-control">

						<div class="input-group-append">

							<button type="button" class="btn btn-primary" id="apply-coupon-code">

								<i class="feather-percent"></i> APPLY

							</button>

						</div>

					</div>

					<!-- <div class="mb-0 input-group">

						<div class="input-group-prepend">

							<span class="input-group-text"><i class="feather-message-square"></i></span>

						</div>

						<textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control"></textarea>

					</div> -->

				</div>

				<div class="bg-white p-3 clearfix border-bottom">

					<p class="mb-1">

						Item Total <span class="float-right text-dark">$<?php echo $total_price; ?></span>

					</p>

					<!-- <p class="mb-1">

						Restaurant Charges <span class="float-right text-dark">$62.8</span>

					</p> -->

					<!-- <p class="mb-1">

						Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">$10</span>

					</p> -->

					<?php if(@$cart['coupon'] && $cart['coupon']['discountType']){ ?>

						<p class="mb-1 text-success">

							<?php $discountType=$cart['coupon']['discountType'];

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

									$discount_amount=($total_price*$discount_amount)/100;

									$total=$total_price-$discount_amount;

									if($discount_amount>$total){

										$discount_amount=$total;

									}

									if($total<0){

										$total=0;

									}

								}



							 ?>

							Total Discount<span class="float-right text-success">$<?php echo $discount_amount; ?></span>

						</p>

					<?php }else{ ?>

							<?php $total=$total_price; ?>

					<?php } ?>

					<hr>

					<h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">$<?php echo $total; ?></span></h6>

				</div>

				<div class="p-3">

					<a class="btn btn-success btn-block btn-lg" href="{{route('checkout')}}">PAY $<?php echo $total; ?><i class="feather-arrow-right"></i></a>

				</div>



				*/?>



			</div>

			</div>

		</div>

	</div>

</div>



<!-- <div class="siddhi-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">

	<div class="row">

		<div class="col">

			<a href="home.html" class="text-dark small font-weight-bold text-decoration-none">

			<p class="h4 m-0">

				<i class="feather-home text-dark"></i>

			</p> Home </a>

		</div>

		<div class="col selected">

			<a href="trending.html" class="text-danger small font-weight-bold text-decoration-none">

			<p class="h4 m-0">

				<i class="feather-map-pin"></i>

			</p> Trending </a>

		</div>

		<div class="col bg-white rounded-circle mt-n4 px-3 py-2">

			<div class="bg-danger rounded-circle mt-n0 shadow">

				<a href="{{route('checkout')}}" class="text-white small font-weight-bold text-decoration-none"> <i class="feather-shopping-cart"></i> </a>

			</div>

		</div>

		<div class="col">

			<a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">

			<p class="h4 m-0">

				<i class="feather-heart"></i>

			</p> Favorites </a>

		</div>

		<div class="col">

			<a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">

			<p class="h4 m-0">

				<i class="feather-user"></i>

			</p> Profile </a>

		</div>

	</div>

</div> -->

<input type="hidden" name="restaurant_id" id="restaurant_id" value="<?php echo $_GET['id']; ?>">

<input type="hidden" name="restaurant_name" id="restaurant_name" value="">

<input type="hidden" name="restaurant_location" id="restaurant_location" value="">

<input type="hidden" name="restaurant_latitude" id="restaurant_latitude" value="">

<input type="hidden" name="restaurant_longitude" id="restaurant_longitude" value="">


<input type="hidden" name="restaurant_image" id="restaurant_image" value="">

</div>



@include('layouts.footer')



@include('layouts.nav')



<div class="modal fade" id="extras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title">{{trans('lang.extras')}}</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

			</div>

			<div class="modal-body">

				<form>



					<div class="recepie-body">

						<div class="custom-control custom-radio border-bottom py-2">

							<input type="radio" id="customRadio1f" name="location" class="custom-control-input" checked>

							<label class="custom-control-label" for="customRadio1f">Tuna <span class="text-muted">+$35.00</span></label>

						</div>

						<div class="custom-control custom-radio border-bottom py-2">

							<input type="radio" id="customRadio2f" name="location" class="custom-control-input">

							<label class="custom-control-label" for="customRadio2f">Salmon <span class="text-muted">+$20.00</span></label>

						</div>

						<div class="custom-control custom-radio border-bottom py-2">

							<input type="radio" id="customRadio3f" name="location" class="custom-control-input">

							<label class="custom-control-label" for="customRadio3f">Wasabi <span class="text-muted">+$25.00</span></label>

						</div>

						<div class="custom-control custom-radio border-bottom py-2">

							<input type="radio" id="customRadio4f" name="location" class="custom-control-input">

							<label class="custom-control-label" for="customRadio4f">Unagi <span class="text-muted">+$10.00</span></label>

						</div>

						<div class="custom-control custom-radio border-bottom py-2">

							<input type="radio" id="customRadio5f" name="location" class="custom-control-input">

							<label class="custom-control-label" for="customRadio5f">Vegetables <span class="text-muted">+$5.00</span></label>

						</div>

						<div class="custom-control custom-radio border-bottom py-2">

							<input type="radio" id="customRadio6f" name="location" class="custom-control-input">

							<label class="custom-control-label" for="customRadio6f">Noodles <span class="text-muted">+$30.00</span></label>

						</div>

						<h6 class="font-weight-bold mt-4">{{trans('lang.quantity')}}</h6>

						<div class="d-flex align-items-center">

							<p class="m-0">

								{{trans('lang.item')}}

							</p>

							<div class="ml-auto">

								<span class="count-number">

									<button type="button" class="btn-sm left dec btn btn-outline-secondary">

										<i class="feather-minus"></i>

									</button>

									<input class="count-number-input" type="text" readonly="" value="1" min="1">

									<button type="button" class="btn-sm right inc btn btn-outline-secondary">

										<i class="feather-plus"></i>

									</button></span>

							</div>

						</div>

					</div>

				</form>

			</div>

			<div class="modal-footer p-0 border-0">

				<div class="col-6 m-0 p-0">

					<button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">

						{{trans('lang.close')}}

					</button>

				</div>

				<div class="col-6 m-0 p-0">

					<button type="button" class="btn btn-primary btn-lg btn-block">

						{{trans('lang.apply')}}

					</button>

				</div>

			</div>

		</div>

	</div>

</div>

  <!-- GeoFirestore -->

<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>

<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>

<script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>

 <!-- <script

      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJA_hkZfMcOtoPzF3k-RYI-KNjLXgrp_8&callback=initMap&libraries=&v=weekly"

      async

    ></script> -->

<script type="text/javascript">



	var review_pagesize=4;
	var review_start= null;
	var vendorOpen = false;
	var vendorId =  "<?php echo $_GET['id']; ?>";
	var currentCurrency = '';
	var currencyAtRight = false;
	var refCurrency = database.collection('currencies').where('isActive', '==' , true);
	var deliveryChargemain=[];
	refCurrency.get().then( async function(snapshots){  
	    var currencyData = snapshots.docs[0].data();
	    currentCurrency = currencyData.symbol;
	    currencyAtRight = currencyData.symbolAtRight;
		loadcurrency();  
	}); 


	var vendorDetailsRef= database.collection('vendors').where('id',"==",vendorId);

	var vendorProductsRef = database.collection('vendor_products').where('vendorID',"==",vendorId);

	var vendorRatings = database.collection('foods_review').where('VendorId',"==",vendorId);

	var DeliveryCharge = database.collection('settings').doc('DeliveryCharge');

	var taxValue='';
	var taxSetting = database.collection('settings').doc('taxSetting');
	
	var placeholderImageRef = database.collection('settings').doc('placeHolderImage');

	var vendorsRef= database.collection('vendors');

	var popularRestauantRef = database.collection('vendors').where("reviewsSum",">=",3);

	var vendorAllProductsRef = database.collection('vendor_products');
	var restaurantLongitude = '';
	var restaurantLatitude = '';
	var placeholderImage = '';
  	var placeholder = database.collection('settings').doc('placeHolderImage');
 	
  	placeholder.get().then( async function(snapshotsimage){
    	var placeholderImageData = snapshotsimage.data();
    	placeholderImage = placeholderImageData.image;
  	})
  	var diveinEnabledFromAdmin = '';
  	var refDineinForRestaurant = database.collection('settings').doc("DineinForRestaurant");
  	  	refDineinForRestaurant.get().then( async function(snapshotsDineinForRestaurant){
    	var dineinForRestaurantData = snapshotsDineinForRestaurant.data();
    	diveinEnabledFromAdmin = dineinForRestaurantData.isEnabledForCustomer;
  	})
  	var couponsRef= database.collection('coupons').where('isEnabled', '==' ,true).where("resturant_id","==",vendorId).orderBy("expiresAt").startAt(new Date());

    couponsRef.get().then( async function(couponListSnapshot){  
      offers_coupons = document.getElementById('offers_coupons');
      offers_coupons.innerHTML='';
      if(couponListSnapshot.docs.length > 0){
      		var couponlistHTML=buildHTMLCouponList(couponListSnapshot);
      offers_coupons.innerHTML=couponlistHTML;
      }else{
      offers_coupons.innerHTML= "<p>No Coupons are Available</p>";
      }
      
      if ($('.offers-coupons').hasClass('slick-initialized')) {
          $('.offers-coupons').slick('destroy');
          slickcouponCarousel();
      }
    })

	
	

	/* Set Old Product takeawayOption:False
	vendorAllProductsRef.get().then( async function(vendorAllProductsRefSnapshots){
		console.log(vendorAllProductsRefSnapshots);
		await vendorAllProductsRefSnapshots.docs.forEach( async (doc) => {
			doc=doc.data();
			if(doc.takeawayOption==undefined){
				console.log(doc.id);
				database.collection('vendor_products').doc(doc.id).update({'takeawayOption':false}).then(function(result) {
					console.log("doc");
				});
			}
		});
	});*/

	var geoFirestore = new GeoFirestore(firestore);

	var placeholderImageSrc = '';

	placeholderImageRef.get().then( async function(placeholderImageSnapshots){

		var placeHolderImageData = placeholderImageSnapshots.data();

		placeholderImageSrc = placeHolderImageData.image;
		/*console.log(placeholderImageSrc);
		console.log("placeholderImageSrc");*/
	})

	function loadcurrency() {
		if(currencyAtRight){
			jQuery('.currency-symbol-left').hide();
			jQuery('.currency-symbol-right').show();
		    jQuery('.currency-symbol-right').text(currentCurrency);
		}else{
			jQuery('.currency-symbol-left').show();
			jQuery('.currency-symbol-right').hide();
		    jQuery('.currency-symbol-left').text(currentCurrency);
		}
	}


	$(document).ready(function() {


		
		

		getVendorDetails();

		getMenuDetails();

		getUsersReviews(true);

		/*getMostPopularRestaurantsDetails();*/

		getRestaurantMap();



	});

	

	async function getVendorDetails(){



		/*const lat = 51.5074;

		const lng = 0.1278;*/



		



		geocollection = geoFirestore.collection('vendors');

		const query = geocollection.near({ center: new firebase.firestore.GeoPoint(23.3970984, 70.6526456), radius: 200 });

		query.get().then((value) => {

		  // All GeoDocument returned by GeoQuery, like the GeoDocument added above

		});





			/*vendorsRef.get().then( async function(vendorsSnapshots){

			

			vendorsSnapshots.forEach((doc) => {

				vendorRate = doc.data();

				console.log(vendorRate.longitude);

				console.log(vendorRate.latitude);

				if((-180 < vendorRate.latitude && vendorRate.latitude < 180) && (-180 < vendorRate.longitude && vendorRate.longitude < 180) && vendorRate.latitude && vendorRate.longitude && typeof vendorRate.latitude == 'number' && typeof vendorRate.longitude == 'number'){

					coordinates=new firebase.firestore.GeoPoint(vendorRate.latitude,vendorRate.longitude);

					console.log(coordinates);

					console.log("vendorRate");



		            geoFirestore.collection('vendors').doc(vendorRate.id).update({'coordinates':coordinates}).then(() => {

		                console.log('Provided document has been updated in Firestore');

		              }, (error) => {

		                console.log('Error: ' + error);

		              });



				}

			});

		});*/






		DeliveryCharge.get().then( async function(deliveryChargeSnapshots){

					deliveryChargemain=deliveryChargeSnapshots.data();

					deliveryCharge=deliveryChargemain.amount;

					$("#deliveryChargeMain").val(deliveryCharge);

					$("#deliveryCharge").val(deliveryCharge);

			});

		taxSetting.get().then( async function(taxSettingSnapshots){

					taxValue=taxSettingSnapshots.data();
					if(taxValue.active==false){
						taxValue='';
					}

			});

		vendorDetailsRef.get().then( async function(vendorSnapshots){

			var vendorDetails = vendorSnapshots.docs[0].data();

			$("#vendor_title").append(vendorDetails.title);

			$("#restaurant_name").val(vendorDetails.title);

			$("#vendor_address").append(vendorDetails.location);

			$("#restaurant_location").val(vendorDetails.location);

			$("#restaurant_latitude").val(vendorDetails.latitude);

			$("#restaurant_longitude").val(vendorDetails.longitude);

			$("#restaurant_image").val(vendorDetails.photo);

			$("#vendor_open_time").append(vendorDetails.opentime+' - '+ vendorDetails.closetime);
			/*if(vendorDetails.hasOwnProperty('enabledDiveInFuture')  && vendorDetails.enabledDiveInFuture == true && diveinEnabledFromAdmin == true){
				$("#table_book_btn").show();	
			}*/
			var newdeliveryCharge=[];

			console.log("deliveryChargemain "+deliveryChargemain.vendor_can_modify);
			try{
				if(deliveryChargemain.vendor_can_modify){
					if(vendorDetails.DeliveryCharge){
						if(vendorDetails.DeliveryCharge.delivery_charges_per_km && vendorDetails.DeliveryCharge.minimum_delivery_charges && vendorDetails.DeliveryCharge.minimum_delivery_charges_within_km){
							deliveryChargemain=vendorDetails.DeliveryCharge;
						
						}
					}
				}
				/*if(newdeliveryCharge.length){
					deliveryChargemain=newdeliveryCharge;
				}*/
			}catch(error){

			}

			
			$(".restaurant_location_btn").attr("href", "http://maps.google.com?q="+vendorDetails.latitude+","+vendorDetails.longitude);

			if (vendorDetails.hasOwnProperty('reststatus') && vendorDetails.reststatus == true) {
				$("#vendor_shop_status").append("{{trans('lang.open')}}");
				$("#vendor_shop_status").addClass('open');
        		vendorOpen = vendorDetails.reststatus;
			}else{
				$("#vendor_shop_status").append("{{trans('lang.closed')}}");
				$("#vendor_shop_status").addClass('close');
			}

			/*$("#vendor_reviews").append('('+vendorDetails.reviewsSum+' Reviews)');*/
			var rating=0;
			

			if( vendorDetails.hasOwnProperty('reviewsCount') && vendorDetails.reviewsCount!=0 ){
			    //console.log(parseFloat(vendorDetails.reviewsSum) +'/ '+ parseInt(vendorDetails.reviewsCount) )
			    rating = Math.round(parseFloat(vendorDetails.reviewsSum)/parseInt(vendorDetails.reviewsCount)); 
			   // rating =Math.round(rating);
			}else{
			    rating =0;
			}

			if(vendorDetails.hasOwnProperty('photo') && vendorDetails.photo != ''){
				$('#restaurant-pic').attr('src', vendorDetails.photo);
			}else{
				$('#restaurant-pic').attr('src', placeholderImage);
			}
			if(vendorDetails.hasOwnProperty('reviewsCount') && vendorDetails.reviewsCount != ''){
				reviewsCount=vendorDetails.reviewsCount;
			}else{
				reviewsCount=0;
			}		
				
			var html_rating='<ul class="rating" data-rating="'+rating+'">';
              html_rating=html_rating+'<li class="rating__item"></li>';
              html_rating=html_rating+'<li class="rating__item"></li>';
              html_rating=html_rating+'<li class="rating__item"></li>';
              html_rating=html_rating+'<li class="rating__item"></li>';
              html_rating=html_rating+'<li class="rating__item"></li>';
            html_rating=html_rating+'</ul><p class="label-rating ml-2 small" id="vendor_reviews">('+reviewsCount+' Reviews)</p>';

            $("#restaurant_ratings").html(html_rating);
            

			if($("#restaurant_place").length){

				$("#restaurant_name_place").html(vendorDetails.title);

				if(vendorDetails.photo){

					$("#restaurant_image_place").attr('src',vendorDetails.photo);

					setTimeout(function() { $("#restaurant_image_place").show() }, 1000);

				}else{

					$("#restaurant_image_place").remove();

				}

				$("#restaurant_location_place").html('<i class="feather-map-pin"></i>'+vendorDetails.location);

				$("#restaurant_place").show();

			}

		})

		

		let Star5 = Star4 = Star3 = Star2 = Star1 = 0;

		let percent1 = percent2 = percent3 = percent4 = percent5 = 0.0;

		

		vendorRatings.get().then( async function(vendorRateSnapshots){

		

			var reviw_html = '';

			vendorRateSnapshots.docs.forEach((doc) => {

				let vendorRate = doc.data()

				if(vendorRate.rating == 5 || vendorRate.rating == 4.5){

					Star5++;

				}

				if(vendorRate.rating == 4 || vendorRate.rating == 3.5){

					Star4++;

				}

				if(vendorRate.rating == 3 || vendorRate.rating == 2.5){

					Star3++;

				}

				if(vendorRate.rating == 2 || vendorRate.rating == 1.5){

					Star2++;

				}

				if(vendorRate.rating == 1 || vendorRate.rating == 0.5){

					Star1++;

				}

			});

			

			let total = Star5 + Star4 + Star3 + Star2 + Star1;

			

			for(i=1;i<=5;++i){

			  if(i == 1){

			  	percent1 = Star1 * 100 / total;

			  	percent1 = percent1.toFixed(2);

			  }else if(i == 2){

			  	percent2 = Star2 * 100 / total;

			  	percent2 = percent2.toFixed(2);

			  }else if(i == 3){

			  	percent3 = Star3 * 100 / total;

			  	percent3 = percent3.toFixed(2);

			  }else if(i == 4){

			  	percent4 = Star4 * 100 / total;

			  	percent4 = percent4.toFixed(2);

			  }else if(i == 5){

			  	percent5 = Star5 * 100 / total;

			  	percent5 = percent5.toFixed(2);

			  	

			  }

			  for (j=1;j<=5;++j) {

			   	if(j <= i){

			   		reviw_html += '<i class="feather-star text-warning"></i>';	

			   	}

			  }

			}

			

			$("#five_star_percent").attr('aria-valuenow',percent5).attr('style','width:'+percent5+'%');

			$("#for_star_percent").attr('aria-valuenow',percent4).attr('style','width:'+percent4+'%');

			$("#three_star_percent").attr('aria-valuenow',percent3).attr('style','width:'+percent3+'%');

			$("#two_star_percent").attr('aria-valuenow',percent2).attr('style','width:'+percent2+'%');

			$("#one_star_percent").attr('aria-valuenow',percent1).attr('style','width:'+percent1+'%');

			

			$("#five_star").html(percent5+' %');

			$("#for_star").html(percent4+' %');

			$("#three_star").html(percent3+' %');

			$("#two_star").html(percent2+' %');

			$("#one_star").html(percent1+' %');


		})

	}



	async function getMenuDetails(){


		/*let menuHtmlx = vendorProductsRef.get();
		if(takeaway_options=='true'){
			menuHtmlx = vendorProductsRef.where('takeawayOption',true).get();
		}*/
		<?php if(Session::get('takeawayOption')=="true"){ ?>
			let menuHtmlx = vendorProductsRef.get().then( async function(vendorProductsRefSnapshots){	
		<?php }else{ ?>
			let menuHtmlx = vendorProductsRef.where('takeawayOption','==',false).get().then( async function(vendorProductsRefSnapshots){	
		<?php } ?>
		

			
 
			var vendorCategories = [];

			vendorProductsRefSnapshots.docs.forEach((doc) => {

				if(vendorCategories.indexOf(doc.data().categoryID) === -1){

					vendorCategories.push(doc.data().categoryID)

				}

			});

			

			vendorProducts=vendorProductsRefSnapshots.docs;

			var vendor_menu = '';

			vendor_menu += '<div class="d-flex item-aligns-center mb-3">';

				vendor_menu += '<h4 class="font-weight-bold h6 w-100">Explore Menu</h4>';

			vendor_menu += '</div>';

			

			for(let i = 0; i < vendorCategories.length; i++) {

				

				var categoryID = vendorCategories[i];

				var vendorCategoryRef = database.collection('vendor_categories').where('id',"==",categoryID);

				

				let catHtml = '';

				let catHtmlRes = vendorCategoryRef.get().then( async function(vendorCategoryRefSnapshots){

					if(vendorCategoryRefSnapshots.docs.length==0){

						return;

					}

					var vendorCategory = vendorCategoryRefSnapshots.docs[0].data();

						

						/*var vendorProductsRef = database.collection('vendor_products').where('categoryID',"==",vendorCategory.id);

						vendorProducts =vendorProductsRef;*/

						let productHtml = '';

						let totalProduct = 0;

						/*let productsHtmlRes = vendorProductsRef.get().then( async function(vendorProductsRefRefSnapshots){*/

							/*vendorProductsRefRefSnapshots.docs.forEach((doc) => {*/

								

								

							if(vendorProductsRefSnapshots.docs && vendorProductsRefSnapshots.docs.length){

								await vendorProductsRefSnapshots.docs.forEach( async (doc) => {

									var vendorProduct = doc.data();

									var price=vendorProduct.price;

									var mainprice='';
									var mainprice=vendorProduct.price;
									if(vendorProduct.hasOwnProperty('disPrice') && vendorProduct.disPrice !='0'){

										price=vendorProduct.disPrice;

										mainprice=vendorProduct.price;

									}

									if(vendorProduct.vendorID == vendorId && vendorProduct.categoryID==vendorCategory.id && vendorProduct.publish == true){

										totalProduct = totalProduct + 1;

										productHtml += '<div class="col-md-12 px-0">';

											productHtml += '<div class="bg-white p-3 border rounded-lg mb-3 resitem-list-view">';

												productHtml += '<div class="gold-members d-flex align-items-center">';



													productHtml += '<div class="media">';

													let ptype = vendorProduct.nonveg?'Non veg':'Pure Veg';

													let pclass =  vendorProduct.nonveg?'badge badge-danger':'badge badge-success';

													let pclass2 =  vendorProduct.nonveg?'text-danger non_veg':'text-success veg';

														productHtml += '<div class="mr-3 font-weight-bold '+pclass2+'">.</div>';

														productHtml += '<div class="media-body">';

															productHtml += '<h6 class="mb-1">'+vendorProduct.name+' <span class="'+pclass+'">'+ptype+'</span></h6>';

															/*if(mainprice){

																productHtml += '<p class="text-muted mb-0">$'+price+'&nbsp;<span class="strick_price"><s>$'+mainprice+'</s></span></p>';

															}else{

																productHtml += '<p class="text-muted mb-0">$'+price+'</p>';

															}*/

															if(vendorProduct.hasOwnProperty('disPrice') && vendorProduct.disPrice != '' && vendorProduct.disPrice != '0' ){
											                    if(currencyAtRight){

											                        productHtml=productHtml+'<p class="text-muted mb-0">'+vendorProduct.disPrice+''+currentCurrency+'  <span class="strick_price"><s>'+vendorProduct.price+''+currentCurrency+'</s></span></p>';
											                    }else{
											                         productHtml=productHtml+'<p class="text-muted mb-0">'+''+currentCurrency+vendorProduct.disPrice+'  <span class="strick_price"><s>'+currentCurrency+''+vendorProduct.price+'</s> </span></p>';
											                    }
										                    
											                }else{    
											                
											                	if(currencyAtRight){
											                        productHtml=productHtml+'<p class="text-muted mb-0">'+vendorProduct.price+''+currentCurrency+'</p>';
											                    }else{
											                         productHtml=productHtml+'<p class="text-muted mb-0">'+currentCurrency+''+vendorProduct.price+'</p>';
											                    }
											                }


														productHtml += '</div>';

													productHtml += '</div>';
													var productphoto=placeholderImageSrc;
													if(vendorProduct.photo){
														productphoto=vendorProduct.photo;
													}

													if(vendorOpen){
														productHtml += '<div class="float-right add-btn ml-auto"><span class="menu-itemimg"><img src="'+productphoto+'"></span><span class="menu-itembtn"><a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras_'+vendorProduct.id+'">+ Add</a></span></div>';	
													}else{
														productHtml += '<div class="float-right add-btn ml-auto"><span class="menu-itemimg"><img src="'+productphoto+'"></span></div>';
													}
													



													productHtml +='<div class="modal fade" id="extras_'+vendorProduct.id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';

														productHtml +='<div class="modal-dialog modal-dialog-centered">';

															productHtml +='<div class="modal-content">';
															productHtml +='<div class="modal_header_error error_top" style="display:none"><p class="modal_header_error_text"></p></div>';
																
															productHtml +='<div class="modal-header">';



																    var modelproductHtml='Quantity';

																	if(vendorProduct.hasOwnProperty('addOnsPrice') || vendorProduct.hasOwnProperty('sizePrice')){

																		modelproductHtml='Extras';

																				

																	}

																	productHtml +='<h5 class="modal-title">'+modelproductHtml+'</h5>';

																	productHtml +='<button type="button" class="close" data-dismiss="modal" id="close_'+vendorProduct.id+'" aria-label="Close">';

																		productHtml +='<span aria-hidden="true">&times;</span>';

																	productHtml +='</button>';

																productHtml +='</div>';

																productHtml +='<div class="modal-body">';

																	productHtml +='<form>';



																		productHtml +='<div class="recepie-body" id="recepie-body_'+vendorProduct.id+'">';

																		if(vendorProduct.hasOwnProperty('sizePrice') && 

																			vendorProduct.sizePrice.length >0){

																			productHtml +='<h6 class="font-weight-bold">Customization</h6>';

																			var total_size=0;

																			vendorProduct.sizePrice.forEach( async (product_size) => {

																					productHtml +='<div class="custom-control custom-radio border-bottom py-2">';

																					productHtml +='<input type="radio" data-price="'+product_size+'" id="'+vendorProduct.id+'_size_'+total_size+'" name="size_'+vendorProduct.id+'" value="'+vendorProduct.size[total_size]+'" class="custom-control-input">';

																					productHtml +='<label class="custom-control-label" for="'+vendorProduct.id+'_size_'+total_size+'">'+vendorProduct.size[total_size]+' ('+vendorProduct.name+') <span class="text-muted">$'+product_size+'</span></label>';

																					productHtml +='</div>';

																					total_size++;

																			});

																		}

																		if(vendorProduct.hasOwnProperty('addOnsPrice') && vendorProduct.addOnsPrice.length >0){

																			if(vendorProduct.hasOwnProperty('sizePrice')){

																				if(vendorProduct.sizePrice.length >0){

																				productHtml +='<h6 class="font-weight-bold mt-4">Addons</h6>';

																			}else{

																				productHtml +='<h6 class="font-weight-bold">Addons</h6>';

																			}	

																			}

																			

																			var total=0;

																			vendorProduct.addOnsPrice.forEach( async (product_price) => {

																					productHtml +='<div class="custom-control custom-checkbox border-bottom py-2">';

																					productHtml +='<input data-price="'+product_price+'" type="checkbox" id="'+vendorProduct.id+'_extra_'+total+'" name="extra_'+vendorProduct.id+'" value="'+vendorProduct.addOnsTitle[total]+'" class="custom-control-input extra_'+vendorProduct.id+'">';

																					productHtml +='<label class="custom-control-label" for="'+vendorProduct.id+'_extra_'+total+'">'+vendorProduct.addOnsTitle[total]+' <span class="text-muted">+$'+product_price+'</span></label>';

																					productHtml +='</div>';

																					total++;

																			});

																		}



																		if(vendorProduct.hasOwnProperty('addOnsPrice') || vendorProduct.hasOwnProperty('sizePrice')){

																			

																		}else{

																			productHtml +='<h6 class="font-weight-bold mt-4">Quantity</h6>';

																		}

																		productHtml +='<div class="d-flex align-items-center product-item-box">';

																			productHtml +='<p class="m-0">';

																				productHtml +='Item';

																			productHtml +='</p>';

																			productHtml +='<div class="ml-auto">';

																				productHtml +='<span class="count-number">';

																					productHtml +='<button type="button" class="btn-sm left dec btn btn-outline-secondary food_count_decrese">';

																						productHtml +='<i class="feather-minus"></i>';

																					productHtml +='</button>';

																					productHtml +='<input class="count-number-input" name="quantity_'+vendorProduct.id+'" type="text"  value="1">';

																					productHtml +='<button type="button" class="btn-sm right inc btn btn-outline-secondary">';

																						productHtml +='<i class="feather-plus"></i>';

																					productHtml +='</button></span>';

																			productHtml +='</div>';

																			productHtml +='</div>';

																		productHtml +='</div>';

																	productHtml +='</form>';

																productHtml +='</div>';

																productHtml +='<div class="modal-footer p-0 border-0">';

																	productHtml +='<div class="col-6 m-0 p-0">';

																		productHtml +='<button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">';

																			productHtml +='Close';

																		productHtml +='</button>';

																	productHtml +='</div>';

																	productHtml +='<div class="col-6 m-0 p-0">';

																		productHtml +="<button data-id='"+String(vendorProduct.id)+"' type='button' class='add-to-cart btn btn-primary btn-lg btn-block'>";

																			productHtml +='Apply';

																		productHtml +='</button>';

																		productHtml +='<input type="hidden" name="name_'+vendorProduct.id+'" id="name_'+vendorProduct.id+'" value="'+vendorProduct.name+'">';

																		productHtml +='<input type="hidden" id="price_'+vendorProduct.id+'" name="price_'+vendorProduct.id+'" value="'+price+'">';

																		productHtml +='<input type="hidden" id="image_'+vendorProduct.id+'" name="image_'+vendorProduct.id+'" value="'+vendorProduct.photo+'">';

																		productHtml +='<input type="hidden" id="veg_'+vendorProduct.id+'" name="veg_'+vendorProduct.id+'" value="'+vendorProduct.veg+'">';

																	productHtml +='</div>';

																productHtml +='</div>';

															productHtml +='</div>';

														productHtml +='</div>';

													productHtml +='</div>';

												productHtml += '</div>';

										productHtml += '</div>';

									productHtml += '</div>';

								}

							});



						productHtmlObj = {'html':productHtml,'total':totalProduct}

						//return productHtmlObj;



						/*let productsHtmlObj = await productsHtmlRes.then(function (obj){ return obj; })*/

						let ptext = totalProduct == 1?' ITEM':' items';

						catHtml += '<div class="row m-0 mb-3">';

							catHtml += '<h6 class="pb-3 m-0 w-100">'+vendorCategory.title+' <small class="text-black-50">('+totalProduct+ptext+')</small></h6>';

							catHtml += productHtml;

						catHtml += '</div>';	

						return catHtml;

					}



					/*})*/

					

					/*let productsHtmlObj = await productsHtmlRes.then(function (obj){ return obj; })

					let ptext = productsHtmlObj.total == 1?' ITEM':' ITEMS';

					catHtml += '<div class="row m-0">';

						catHtml += '<h6 class="p-3 m-0 bg-light w-100">'+vendorCategory.title+' <small class="text-black-50">'+productsHtmlObj.total+ptext+'</small></h6>';

						catHtml += productsHtmlObj.html;

					catHtml += '</div>';	

					return catHtml;*/

				})

				

				let catsHtml = await catHtmlRes.then(function (html){ return html; })

				if(catsHtml!=undefined){

					vendor_menu += catsHtml;

				}

			}

			

			return vendor_menu;

		})

		

		let menuHtml = await menuHtmlx.then(function (html){ if(html!=undefined){ return html; } })

		

		$("#vendor_menu").html(menuHtml);

	}





	$( document ).ready(function() {

		$(document).on("click", '.add-to-cart', function (event) {


                var id = $(this).attr('data-id');
                var quantity = $('input[name="quantity_' + id + '"]').val();

                if (quantity == 0) {
                    $('.modal_header_error').show();
                    $('.modal_header_error_text').show();
                    $('.modal_header_error_text').text("Please choose more then 0 Quantity");
                    setTimeout(function () {
                        $('.modal_header_error_text').append();
                    }, 1000);

                    return;
                } else {
                    $('.modal_header_error_text').hide();
                }

                	console.log(JSON.stringify(deliveryChargemain));
                var deliveryCharge = $("#deliveryChargeMain").val();

                var extra = [];

                var size = $('input[name="size_' + id + '"]:checked').val();

                if (size) {

                    var price = parseFloat($('input[name="size_' + id + '"]:checked').attr('data-price'));

                } else {

                    var price = parseFloat($('input[name="price_' + id + '"]').val());

                }


                var item_price = price;


                var restaurant_id = $('input[name="restaurant_id"]').val();


                var restaurant_name = $('input[name="restaurant_name"]').val();


                var restaurant_latitude = $('input[name="restaurant_latitude"]').val();

                var restaurant_longitude = $('input[name="restaurant_longitude"]').val();

                setCookie('restaurant_longitude', restaurant_longitude, 365);

                setCookie('restaurant_latitude', restaurant_latitude, 365);

                setCookie('deliveryChargemain', JSON.stringify(deliveryChargemain), 356);

                var restaurant_location = $('input[name="restaurant_location"]').val();

                var restaurant_image = $('input[name="restaurant_image"]').val();

                var delivery_option = $('input[name="delivery_option"]').val();


                var name = $('input[name="name_' + id + '"]').val();

                var veg = $('input[name="veg_' + id + '"]').val();

                price = price * quantity;


                var image = $('input[name="image_' + id + '"]').val();

                var extra_price = 0;

                $('input:checkbox.extra_' + id).each(function () {

                    var sThisVal = (this.checked ? $(this).val() : "");

                    if (sThisVal != '') {

                        extra_price = parseFloat($(this).attr('data-price')) + extra_price;

                        extra.push(sThisVal);

                    }

                });
                var iteam_extra_price = extra_price;
                //extra_price = extra_price * quantity;
                var total_price = price + extra_price;
                $.ajax({

                    type: 'POST',

                    url: "<?php echo route('add-to-cart'); ?>",

                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        restaurant_id: restaurant_id,
                        extra: extra,
                        size: size,
                        id: id,
                        quantity: quantity,
                        name: name,
                        price: price,
                        image: image,
                        extra_price: extra_price,
                        item_price: item_price,
                        restaurant_location: restaurant_location,
                        restaurant_name: restaurant_name,
                        restaurant_image: restaurant_image,
                        deliveryCharge: deliveryCharge,
                        delivery_option: delivery_option,
                        veg: veg,
                        iteam_extra_price: iteam_extra_price,
                        taxValue: taxValue,
                        restaurant_latitude: restaurant_latitude,
                        restaurant_longitude: restaurant_longitude
                    },

                    success: function (data) {

                        data = JSON.parse(data);

                        $('#cart_list').html(data.html);
                        loadcurrency();

                        $('#close_' + id).trigger("click");

                    }

                });


            });



		$(document).on("click", '.remove_item', function(event) { 

	    	var id=$(this).attr('data-id');

	    	var restaurant_id=$(this).attr('data-restaurant');

	    	$.ajax({

               type:'POST',

               url:"<?php echo route('remove-from-cart'); ?>",

               data:{_token:'<?php echo csrf_token() ?>',restaurant_id:restaurant_id,id:id},

               success:function(data) {

               	   data=JSON.parse(data);

               	   $('#cart_list').html(data.html);
               	   loadcurrency();

               }

            });



	    });



		$(document).on("click", '.count-number-input-cart', function(event) { 


			var id=$(this).attr('data-id');
	    	var restaurant_id=$(this).attr('data-restaurant');

	    	var quantity=$('.count_number_'+id).val();
			$.ajax({

               type:'POST',

               url:"<?php echo route('change-quantity-cart'); ?>",

               data:{_token:'<?php echo csrf_token() ?>',restaurant_id:restaurant_id,id:id,quantity:quantity},

               success:function(data) {

               	   data=JSON.parse(data);

               	   $('#cart_list').html(data.html);
               	    loadcurrency();

               }

            });



	    });



		$(document).on("click", '#apply-coupon-code', function(event) { 

	    	var coupon_code=$("#coupon_code").val();

	    	var restaurant_id=$('input[name="restaurant_id"]').val();


	    	var endOfToday = new Date(); 
	    	/*endOfToday.setHours(23,59,59,999);*/
			var couponCodeRef = database.collection('coupons').where('code',"==",coupon_code).where('isEnabled',"==",true).where('expiresAt',">=",endOfToday);

			couponCodeRef.get().then( async function(couponSnapshots){

				if(couponSnapshots.docs && couponSnapshots.docs.length){

					var coupondata=couponSnapshots.docs[0].data();	
					if(coupondata.resturant_id!=undefined && coupondata.resturant_id!=''){

						if(coupondata.isEnabled!=true){
							
						}

						if(coupondata.expiresAt){
							
						}

						if(coupondata.resturant_id==restaurant_id){

							discount=coupondata.discount;

							coupon_id=coupondata.id;

							discountType=coupondata.discountType;	

							$.ajax({

				               type:'POST',

				               url:"<?php echo route('apply-coupon'); ?>",

				               data:{_token:'<?php echo csrf_token() ?>',coupon_code:coupon_code,discount:discount,discountType:discountType,coupon_id:coupondata.id},

				               success:function(data) {

				               	   data=JSON.parse(data);

				               	   $('#cart_list').html(data.html);
				               	    loadcurrency();

				               }

				            });	



						}else{

							alert("Coupon code is not valid.");

							$("#coupon_code").val('');

						}

					}else{

						discount=coupondata.discount;

						discountType=coupondata.discountType;	

						$.ajax({

			               type:'POST',

			               url:"<?php echo route('apply-coupon'); ?>",

			               data:{_token:'<?php echo csrf_token() ?>',coupon_code:coupon_code,discount:discount,discountType:discountType,coupon_id:coupondata.id},

			               success:function(data) {

			               	   data=JSON.parse(data);

			               	   $('#cart_list').html(data.html);
			               	    loadcurrency();

			               }

			            });

					}

				}else{

					alert("Coupon code is not valid.");

					$("#coupon_code").val('');

				}

				

				



			});

	    	



	    });



		$(document).on("click", '#Other_tip', function(event) { 

				$("#tip_amount").val('');
		        $("#add_tip_box").show();

		    });

		    $(document).on("click", '.this_tip', function(event) {

		        var this_tip=$(this).val();

		        $("#tip_amount").val(this_tip);

		        $("#add_tip_box").hide();

		        tipAmountChange();

		    });



		    /*$(document).on("onchange", '#tip_amount', function(event) {
		    		console.log("tip_amount");
		            tipAmountChange();

		    });*/



		$(document).on("click", '.this_delivery_option', function(event) {

		    var delivery_option=$(this).val();

		    var deliveryCharge=$("#deliveryChargeMain").val();

		    	

		    	$.ajax({

		           type:'POST',

		           url:"<?php echo route('order-delivery-option'); ?>",

		           data:{_token:'<?php echo csrf_token() ?>',delivery_option:delivery_option,deliveryCharge:deliveryCharge},

		           success:function(data) {

		               data=JSON.parse(data);

		               $('#cart_list').html(data.html);
		                loadcurrency();

		           }

		    }); 



		    	return false;

		    	 

		});



    });



function tipAmountChange() {

		        

    var this_tip=$("#tip_amount").val();

    $.ajax({

           type:'POST',

           url:"<?php echo route('order-tip-add'); ?>",

           data:{_token:'<?php echo csrf_token() ?>',tip:this_tip},

           success:function(data) {

               data=JSON.parse(data);

               $('#cart_list').html(data.html);
                loadcurrency();

           }

    }); 



}



function getUsersReviews(limit){

	customerRatingsAndReviews = document.getElementById('customers_ratings_and_review');


	if(limit && review_pagesize){

		var reviewHTML = '';

		vendorRatings.limit(review_pagesize).get().then( async function(snapshots){

		review_start = snapshots.docs[snapshots.docs.length - 1];
		if(snapshots.docs.length >  3){
			$(".see_all_review_div").show();
		}
		if(snapshots.docs.length == 0){
			$(".no_review_fount").show();
		}
			
	 	reviewHTML=buildRatingsAndReviewsHTML(snapshots);

	 	if(reviewHTML != ''){

	 		jQuery("#customers_ratings_and_review").append(reviewHTML);

		}

	}); 	

	}else if(review_start){

		

		/*customerRatingsAndReviews.innerHTML = reviewHTML;*/

		vendorRatings.startAfter(review_start).limit(review_pagesize).get().then( async function(snapshots){

		review_start = snapshots.docs[snapshots.docs.length - 1];
		reviewHTML=buildRatingsAndReviewsHTML(snapshots);

	 	if(reviewHTML != ''){

	 		jQuery("#customers_ratings_and_review").append(reviewHTML);

			

		}

	}); 

	}

}



$(".see_all_reviews").click(function(){



		getUsersReviews(false);

})



 function buildRatingsAndReviewsHTML(reviewsSnapshots){

        var reviewhtml='';

        var allreviewdata=[];

        reviewsSnapshots.docs.forEach((listval) => {

            var reviewDatas=listval.data();

				allreviewdata.push(reviewDatas);

        });



    	  allreviewdata.forEach((listval) => {

            var val=listval;

            var rating = val.rating;

				 reviewhtml=reviewhtml+ '<div class="reviews-members py-3 border-bottom mb-3"><div class="media">';

				 if(val.profile == '' || val.profile.indexOf('firebasestorage.googleapis.com')==-1){

				 	reviewhtml=reviewhtml+'<a href="javascript:void(0);"><img alt="#" src="'+placeholderImageSrc+'" class="mr-3 rounded-pill"></a>';

				 }else{
				 	try {
				 		reviewhtml=reviewhtml+'<a href="javascript:void(0);"><img alt="#" src="'+val.profile+'" class="mr-3 rounded-pill"></a>';
				 	}catch(err) {
				 		reviewhtml=reviewhtml+'<a href="javascript:void(0);"><img alt="#" src="'+placeholderImageSrc+'" class="mr-3 rounded-pill"></a>';
				 	}

				 }

				 

				 reviewhtml=reviewhtml+'<div class="media-body"><div class="reviews-members-header"><h6 class="mb-0"><a class="text-dark" href="javascript:void(0);">'+val.uname+'</a></h6><div class="star-rating"><div class="d-inline-block" style="font-size: 14px;">';

				 if(rating>1){

				 	reviewhtml=reviewhtml+'<i class="feather-star text-warning"></i>';	

				 }else{

				 	reviewhtml=reviewhtml+'<i class="feather-star"></i>';

				 }

				 if(rating>2 || rating >1.5){

				 	reviewhtml=reviewhtml+'<i class="feather-star text-warning"></i>';	

				 }else{

				 	reviewhtml=reviewhtml+'<i class="feather-star"></i>';

				 }

				 if(rating>3 || rating>2.5){

				 	reviewhtml=reviewhtml+'<i class="feather-star text-warning"></i>';	

				 }else{

				 	reviewhtml=reviewhtml+'<i class="feather-star"></i>';

				 }

				 if(rating>4 || rating>3.5){

				 	reviewhtml=reviewhtml+'<i class="feather-star text-warning"></i>';	

				 }else{

				 	reviewhtml=reviewhtml+'<i class="feather-star"></i>';

				 }

				 if(rating>5 || rating>4.5){

				 	reviewhtml=reviewhtml+'<i class="feather-star text-warning"></i>';	

				 }else{

				 	reviewhtml=reviewhtml+'<i class="feather-star"></i>';

				 }

				 reviewhtml=reviewhtml+'</div></div>';


				// <p class="text-muted small">Tue, 20 Mar 2020</p>

				reviewhtml=reviewhtml+ '</div>';

				reviewhtml=reviewhtml+'</div></div><div class="reviews-members-body w-100 pt-3"><p class="mb-2">'+val.comment+'</p></div></div>';







          });             

          return reviewhtml;      

}



    function getMostPopularRestaurantsDetails(){

    	var popularRestauranthtml = '';

      popularRestauantRef.limit(15).get().then( async function(popularRestauantSnapshot){  

     most_popular_products = document.getElementById('most_popular_products');

     most_popular_products.innerHTML='';

      popularRestauranthtml = buildHTMLPopularRestaurant(popularRestauantSnapshot);

      most_popular_products.innerHTML=popularRestauranthtml;

      //jQuery(".slick-track").append(popularRestauranthtml);

        if ($('.trending-slider').hasClass('slick-initialized')) {

          $('.trending-slider').slick('destroy');

          slicktrendingCarousel();

      }

    })

  }



   function buildHTMLPopularRestaurant(popularRestauantSnapshot){

  	 var popularRestaurantHTML='';

        var allPopulardata=[];

        popularRestauantSnapshot.docs.forEach((listval) => {

            var reviewDatas=listval.data();

				allPopulardata.push(reviewDatas);

        });

    	  allPopulardata.forEach((listval) => {

            var val=listval;

            var rating = val.rating;

            var vendor_id_single = val.id;

            var view_vendor_details = "{{ route('restaurant',':id')}}";

            view_vendor_details = view_vendor_details.replace(':id', 'id='+vendor_id_single);

              var rating = 0;

            if(val.reviewsSum != 0 && val.reviewsCount != 0){

              rating = (val.reviewsSum/val.reviewsCount);

              rating = Math.round(rating * 10) / 10;

            }





				     popularRestaurantHTML = popularRestaurantHTML+ '<div class="siddhi-slider-item"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';

				     popularRestaurantHTML = popularRestaurantHTML+ '<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i>'+rating+' ('+val.reviewsCount+'+)</span></div>';

            popularRestaurantHTML = popularRestaurantHTML +'<a href="'+view_vendor_details+'"><img alt="#" src="'+val.photo+'" class="img-fluid item-img w-100"></a></div><div class="p-3 position-relative"><div class="list-card-body"><h6 class="mb-1"><a href="'+view_vendor_details+'" class="text-black">'+val.title+'</a></h6><p class="text-gray mb-3"><span class="fa fa-map-marker"></span> '+val.location+'</p>';

             popularRestaurantHTML = popularRestaurantHTML+ '</div>';

              popularRestaurantHTML = popularRestaurantHTML+ '</div></div></div>';



          });             





          return popularRestaurantHTML;      

  }



   function slicktrendingCarousel() {

   

  $('.trending-slider').slick({

        //   centerMode: true,

        //   centerPadding: '30px',

        slidesToShow: 3,

        arrows: true,

        responsive: [{

                breakpoint: 768,

                settings: {

                    arrows: false,

                    centerMode: true,

                    centerPadding: '40px',

                    slidesToShow: 2

                }

            },

            {

                breakpoint: 650,

                settings: {

                    arrows: false,

                    centerMode: true,

                    centerPadding: '15px',

                    slidesToShow: 1

                }

            }

        ]

    });

}







async function getRestaurantMap(){



}

	function initMap() {

  // The location of Uluru

  const uluru = { lat: -25.344, lng: 131.036 };

  // The map, centered at Uluru

  const map = new google.maps.Map(document.getElementById("map"), {

    zoom: 4,

    center: uluru,

  });

  // The marker, positioned at Uluru

  const marker = new google.maps.Marker({

    position: uluru,

    map: map,

  });

 }

 $(".view_ratings_review").click(function() {
    $('html, body').animate({
        scrollTop: $("#customers_ratings_and_review").offset().top
    }, 2000);
});

//  $(".restaurant_location_btn").click(function() {
// 	// restaurantLongitude = vendorDetails.longitude;
// 	// restaurantLatitude = vendorDetails.latitude;

// 	window.location.replace("http://maps.google.com?q=48.8583736,2.2922926");

 				
// });

 function buildHTMLCouponList(couponListSnapshot){
        var html='';
        var alldata=[];
        couponListSnapshot.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
                
        alldata.forEach((listval) => {
            var val=listval;
           	var date='';
            var time='';
            if (val.hasOwnProperty('expiresAt') && val.expiresAt) {
                date =  val.expiresAt.toDate().toDateString();
                time = val.expiresAt.toDate().toLocaleTimeString('en-US');
            }

                var price_val='';
            
            if (currencyAtRight) {
                if (val.discountType =='Percent' || val.discountType =='Percentage') {
                    price_val = val.discount+"%";
                }else{
                    price_val = val.discount+""+currentCurrency;
                }
            }else{
                if (val.discountType =='Percent' || val.discountType == 'Percentage') {
                    price_val = val.discount+"%";
                }else{	
                    price_val = currentCurrency+""+val.discount;
                }
            }

            html = html+ "<div class='siddhi-slider-item'><div class='list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm'><div class='list-card-image'>";
       
            // html = html+"<img alt='#' src='img/trending1.png' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";



                if(val.hasOwnProperty('image') && val.image != ''){
                    html = html+"<img alt='#' src='"+val.image+"' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";
                }else{
                    html = html+"<img alt='#' src='"+placeholderImageSrc+"' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";
                }


          
            html = html + '<div class="media-body"><h6 class="date">Expires At: '+date+' '+time+'</h6><div class="offer_coupon_code" ><span class="offercoupan text-gray mb-3 offer_code"><p class="mb-0 badge">'+val.code+'</p><a href="javascript:void(0)" onclick="copyToClipboard(`'+val.code+'`)"><i class="fa fa-copy"></i></a></span></div></div>';

            html = html + '<div class="float-right ml-auto"><span class="price font-weight-bold h4">'+price_val+'</span></div>';



          
            html = html +"</div></div></div></div>";

        });
  return html;      
}


function slickcouponCarousel(){

    $('.offers-coupons').slick({
        slidesToShow: 3,
        arrows: true,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 650,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '15px',
                    slidesToShow: 1
                }
            }
        ]
    });
}


function copyToClipboard(text) {
   const elem = document.createElement('textarea');
   elem.value = text;
   document.body.appendChild(elem);
   elem.select();
   document.execCommand('copy');
   document.body.removeChild(elem);
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

</script>