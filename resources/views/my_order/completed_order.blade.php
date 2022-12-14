@include('layouts.app')



@include('layouts.header')

<div class="d-none">
	<div class="bg-primary p-3 d-flex align-items-center">
		<a class="toggle togglew toggle-2" href="#"><span></span></a>
		<h4 class="font-weight-bold m-0 text-white">{{trans('lang.my_orders')}}</h4>
	</div>
</div>
<section class="py-4 siddhi-main-body">
	<div class="container">
		<div class="row">
			<div class="col-md-12 top-nav mb-3">
				<ul class="nav nav-tabsa custom-tabsa border-0 bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link border-0 text-dark py-3 active" href="{{url('my_order')}}"> <i class="feather-check mr-2 text-success mb-0"></i>
							{{trans('lang.completed')}}</a>
					</li>
					<li class="nav-item border-top" role="presentation">
						<a class="nav-link border-0 text-dark py-3" href="{{url('my_order')}}"> <i class="feather-clock mr-2 text-warning mb-0"></i>
							{{trans('lang.on_progress')}}</a>
					</li>
					<li class="nav-item border-top" role="presentation">
						<a class="nav-link border-0 text-dark py-3" href="{{url('my_order')}}"> <i class="feather-x-circle mr-2 text-danger mb-0"></i>
							{{trans('lang.canceled')}}</a>
					</li>
				</ul>
			</div>
			<div class="col-md-12">
				<section class="bg-white siddhi-main-body rounded shadow-sm overflow-hidden">
					<div class="container p-0">
						<div class="p-3 border-bottom gendetail-row">
							<div class="row">
								<div class="col-lg-6">
									<div class="card p-3">
										<h3>{{trans('lang.general_details')}}</h3>
										<div class="form-group widt-100 gendetail-col">
											<label class="control-label"><strong>{{trans('lang.date_created')}} : </strong><span id="order-date"></span></label>
										</div>
										<div class="form-group widt-100 gendetail-col">
											<label class="control-label"><strong>{{trans('lang.order_number')}} : </strong><span id="order-number"></span></label>
										</div>
										<div class="form-group widt-100 gendetail-col">
											<label class="control-label"><strong>{{trans('lang.status')}} : </strong><span id="order-status"></span></label>
										</div>
										<div class="form-group widt-100 gendetail-col">
											<label class="control-label"><strong>{{trans('lang.order_type')}} : </strong><span id="order-type"></span></label>
										</div>
									</div>
									
								</div>
								<div class="col-lg-6">
									<div class="card p-3">
										<h3>{{trans('lang.billing_details')}}</h3>
										<div class="form-group widt-100 gendetail-col">
											<!-- </strong><span id="order-addreess"></span></label> -->
											<div class="bill-address">
												<span id="billing_name"></span><br>
												<span id="billing_line1"></span><br>
												<span id="billing_line2"></span><br>
												<span id="billing_country" ></span>
											</div>
										</div>
										<div class="clear-both ml-auto addreview-btn">
											<!-- <a href="#" class="text-primary ml-auto text-decoration-none">Review</a> -->
											<!-- 	<a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm text-primary ml-auto text-decoration-none" data-toggle="modal" data-target="#review_order" style="pointer-events: none">Review</a>  -->
											
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModel" id="review_btn">
												{{trans('lang.add_review')}}
											</button>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="p-3 border-bottom order-secdetail">
							<div class="row">
								<div class="col-6">
									<!-- <div class="restaurant-details-box">
																<h6 class="font-weight-bold">{{trans('lang.restaurant')}}</h6>
															<div id="restaurant-details"></div>
									</div> -->
									<div class=" order-deta-btm-right">
										<div class="resturant-detail">
											<div class="card">
												<div class="card-header">
													<h4 class="card-header-title">{{trans('lang.restaurant')}}</h4>
												</div>
												<div class="card-body">
													<a href="#" class="row redirecttopage" id="resturant-view">
														<div class="col-4">
															<img src="" class="resturant-img rounded-circle" alt="restaurant" width="70px" height="70px">
														</div>
														<div class="col-8">
															<h4 class="restaurant-title"></h4>
														</div>
													</a>
													<h5 class="contact-info">{{trans('lang.contact_info')}}:</h5>
													<p><strong>{{trans('lang.phone')}}:</strong>
														<span id="restaurant_phone"></span>
													</p>
													<p><strong>{{trans('lang.address')}}:</strong>
														<span id="restaurant_address"></span>
													</p>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6">
									<!-- <div class="restaurant-details-box order_driver_details" id="order_driver_details" >
											<h6 class="font-weight-bold">Driver</h6>
													<div id="driver_details"></div>
									</div> -->
									<div class=" order-deta-btm-right">
										<div class="resturant-detail">
											<div class="card">
												<div class="card-header">
													<h4 class="card-header-title">{{trans('lang.driver')}}</h4>
												</div>
												<div class="card-body">
													<a href="#" class="row redirecttopage" id="resturant-view">
														<div class="col-4">
															<img src="" class="driver-img rounded-circle" alt="driver" width="70px" height="70px">
														</div>
														<div class="col-8">
															<h4 class="driver-name-title"></h4>
														</div>
													</a>
													<h5 class="contact-info">{{trans('lang.contact_info')}}:</h5>
													<p><strong>{{trans('lang.phone')}}:</strong>
														<span id="driver_phone"></span>
													</p>
													<p><strong>{{trans('lang.car_number')}}:</strong>
														<span id="driver_car_number"></span>
													</p>
													<!--  <p><strong>Car Name:</strong>
														<span id="driver_car_name"></span>
													</p> -->
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							

						<div class="row" id="order-note-box" style="display: none;">
								<div class="col-lg-12">

									<div class="p-3 border-bottom">

										<h6 class="font-weight-bold">{{trans('lang.order_notes')}}</h6>

										<div id="order-note" class="order-note"></div>

									</div>
									
								</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								
								
								<div class="p-3 border-bottom">

										<h6 class="font-weight-bold">{{trans('lang.order_items')}}</h6>

										<div id="order-items"></div>

									</div>
								<div class="p-3 border-bottom">

										<div class="d-flex align-items-center mb-2">

											<h6 class="font-weight-bold mb-1">{{trans('lang.order_subtotal')}}</h6>

											<h6 class="font-weight-bold ml-auto mb-1" id="order-subtotal"></h6>

										</div>

									</div>

									<div class="p-3 border-bottom">

										<div class="d-flex align-items-center mb-2">

											<h6 class="font-weight-bold mb-1">{{trans('lang.order_discount')}}t</h6>

											<h6 class="font-weight-bold ml-auto mb-1" id="order-discount"></h6>

										</div>

									</div>

									<div class="p-3 border-bottom order_tax_div" style="display:none;">
										<div class="d-flex align-items-center mb-2">
											<h6 class="font-weight-bold mb-1">{{trans('lang.order_tax')}}</h6>
											<h6 class="font-weight-bold ml-auto mb-1" id="order-tax"></h6>
										</div>
									</div>

									<div class="p-3 border-bottom order_shopping_div">

										<div class="d-flex align-items-center mb-2">

											<h6 class="font-weight-bold mb-1">{{trans('lang.order_shipping')}}</h6>

											<h6 class="font-weight-bold ml-auto mb-1" id="order-shipping"></h6>

										</div>

									</div>

								

									<div class="p-3 border-bottom used_coupon_code_div" style="display:none">

										<div class="d-flex align-items-center mb-2">

											<h6 class="font-weight-bold mb-1">{{trans('lang.used_coupon')}}</h6>

											<h6 class="font-weight-bold ml-auto mb-1" id="used_coupon_code"></h6>

										</div>

									</div>
								
								<div class="p-3 border-bottom order_tip_div">
									<div class="d-flex align-items-center mb-2">
										<h6 class="font-weight-bold mb-1">{{trans('lang.tip_amount')}}</h6>
										<h6 class="font-weight-bold ml-auto mb-1" id="order-tip-amount"></h6>
									</div>
								</div>

								<div class="p-3 bg-white">
									<div class="d-flex align-items-center mb-2">
										<h6 class="font-weight-bold mb-1">{{trans('lang.order_total')}}</h6>
										<h6 class="font-weight-bold ml-auto mb-1" id="order-total"></h6>
									</div>
									<p class="m-0 small text-muted">
										<br>
										{{trans('lang.thank_you_for_order')}}.
									</p>
								</div>
								
								<div class="p-3 border-bottom">
									<p class="font-weight-bold small mb-1">
										{{trans('lang.courier')}}
									</p>
									<img alt="#" src="img/logo_web.png" class="img-fluid sc-siddhi-logo mr-2"><span class="small text-primary font-weight-bold">{{trans('lang.grocery_courier')}} </span>
								</div>
							</div>
						</div>
						<div class="modal fade" id="reviewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">{{trans('lang.review_order')}}</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">{{trans('lang.rate')}}</label>
											<div class="col-sm-10">
												<!-- <input type="number" class="form-control review_rate" placeholder="Rate"> -->
												<select class="form-control review_rate">
													<option value="1">1</option>
													<option value="1.5">1.5</option>
													<option value="2">2</option>
													<option value="2.5">2.5</option>
													<option value="3">3</option>
													<option value="3.5">3.5</option>
													<option value="4">4</option>
													<option value="4.5">4.5</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">{{trans('lang.comment')}}</label>
											<div class="col-sm-10">
												<input type="text" class="form-control review_comment" placeholder="Review Comment">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">{{trans('lang.image')}}</label>
											<div class="col-sm-10">
												<input type="file" onChange="handleFileSelect(event)">
												<div id="uploding_image"></div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('lang.close')}}</button>
										<button type="button" class="btn btn-primary add_review_btn	">{{trans('lang.add_review')}}</button>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
</section>


@include('layouts.footer')



@include('layouts.nav')



<script type="text/javascript">

	
	var orderId =   "<?php echo $_GET['id']; ?>";
	var append_categories = '';
	var completedorsersref= database.collection('restaurant_orders').where('id',"==",orderId);
	var vendor= database.collection('vendors');
	var reviewOrderImage = '';
	var orderVendorId = '';
	var reviewUserName = '';
	var reviewUserProfile = '';
	$(document).ready(function() {
		getOrderDetails();
	});

	var place_image ='';
	var ref_place = database.collection('settings').doc("placeHolderImage");
 	ref_place.get().then( async function(snapshots){
    	var placeHolderImage = snapshots.data();            
    	place_image = placeHolderImage.image;
    
	});

	var currentCurrency ='';
    var currencyAtRight = false;
    var refCurrency = database.collection('currencies').where('isActive', '==' , true);
    refCurrency.get().then( async function(snapshots){
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;
    });

	var review_data = database.collection('foods_review').where('orderid',"==",orderId);
	//console.log('user_uuid '+user_uuid);
	
	review_data.get().then( async function(snapshots){
        if (snapshots.docs[0]) {
	        var r_data = snapshots.docs[0].data();
	        var orderid_data = r_data.orderid;
			//console.log('orderid_data '+orderid_data);
	        if (orderId === orderid_data) {
			//console.log('orderId '+orderId);
	        	$('#review_btn').hide();
	        	$('#reviewModel').hide();
	        }else{
			//console.log('orderId false'+orderId);
	        	$('#review_btn').show();
	        	$('#reviewModel').show();
	        }

        }

    });
	
    $(".add_review_btn").click(function(){
		var rating = parseFloat($(".review_rate").val());
		var comment = $(".review_comment").val();
		var photos = [];
		photos[0] = reviewOrderImage;
		var orderid = "<?php echo $_GET['id']; ?>";
		var CustomerId = user_uuid;
		var VendorId = orderVendorId;
		var uname = reviewUserName;
		var reviewId = database.collection("tmp").doc().id;
		var userProfile = reviewUserProfile;
		//alert(reviewId);
		  database.collection('foods_review').doc(reviewId).set({'CustomerId':CustomerId,'Id':reviewId,'VendorId':VendorId,'comment':comment,'orderid':orderid,'photos':photos,'rating':rating,"uname":uname,'profile':userProfile}).then(function(result) {
		  			vendor_data=vendor.where('id',"==",VendorId);
		  			vendor_data.get().then( async function(snapshots){
	        			if (snapshots.docs[0]) {
	        				vendor=snapshots.docs[0].data();
	        				var reviewsCount=0;
	        				var reviewsSum=0;
	        				if(vendor.reviewsCount!=undefined && vendor.reviewsCount!=''){
	        					reviewsCount=vendor.reviewsCount;
	        				}
	        				if(vendor.reviewsSum!=undefined && vendor.reviewsSum!=''){
	        					reviewsSum=vendor.reviewsSum;
	        				}
	        				reviewsCount=reviewsCount+1;
	        				reviewsSum=reviewsSum+rating;
	        				database.collection('vendors').doc(VendorId).update({'reviewsCount':reviewsCount,'reviewsSum':reviewsSum}).then(function(result) {;
	        						location.reload();
	        				});
	        			}
        			});

		  		//reviewsCount
                
             });


    })

	async function getOrderDetails(){



		completedorsersref.get().then( async function(completedorderSnapshots){

		

			var orderDetails = completedorderSnapshots.docs[0].data();
			if(orderDetails.author.id != user_uuid){
				window.location.href = '{{ route("login")}}';
			}else{


			

			var orderDate = orderDetails.createdAt.toDate().toDateString();

			var time = orderDetails.createdAt.toDate().toLocaleTimeString('en-US');

			$("#order-date").html(orderDate+' '+time);

			

			//var order_address = orderDetails.address.line1+' '+orderDetails.address.line2 +', '+orderDetails.address.city +', '+orderDetails.address.country;

			var billingAddressstring = '';

			    if(orderDetails.address.hasOwnProperty('line1')){
			      $("#billing_line1").text(orderDetails.address.line1);
			    }
			    if(orderDetails.address.hasOwnProperty('line2')){
			      billingAddressstring = billingAddressstring + orderDetails.address.line2; 
			    }
			    if(orderDetails.address.hasOwnProperty('city')){
			      billingAddressstring = billingAddressstring+", "+ orderDetails.address.city; 
			    }

			    if(orderDetails.address.hasOwnProperty('postalCode')){
			      billingAddressstring = billingAddressstring+", "+ orderDetails.address.postalCode; 
			    }

			    $("#billing_line2").text(billingAddressstring);  
  
    			if(orderDetails.address.hasOwnProperty('country')){
      				$("#billing_country").text(orderDetails.address.country); 
    			}


		$("#order-addreess").html(billingAddressstring);

			var order_items = order_status = '';

			var order_subtotal = order_shipping = order_total = 0;

			

			order_items +='<tr>';

				order_items +='<th></th>';

				order_items +='<th class="prod-name">Item Name</th>';

				order_items +='<th class="qunt">Quantity</th>';

				order_items +='<th class="qunt">Extras</th>';

				order_items +='<th class="price">Price</th>';

				order_items +='<th class="price text-right">Total</th>';

			order_items +='</tr>';



			for(let i = 0; i < orderDetails.products.length; i++) {

				      var extra_html='';

				order_subtotal = order_subtotal + parseFloat(orderDetails.products[i]['price']) * parseFloat(orderDetails.products[i]['quantity']);
				var productPriceTotal = parseFloat(orderDetails.products[i]['price']) * parseFloat(orderDetails.products[i]['quantity']);
				var productExtras = 0;
				if(orderDetails.products[i].hasOwnProperty('extras_price') && orderDetails.products[i].hasOwnProperty('extras')){
					productPriceTotal += parseFloat(orderDetails.products[i].extras_price)*parseInt(orderDetails.products[i]['quantity']);
					order_subtotal +=  parseFloat(orderDetails.products[i].extras_price)*parseInt(orderDetails.products[i]['quantity']);
					productExtras = parseFloat(orderDetails.products[i].extras_price)*parseInt(orderDetails.products[i]['quantity']);
				}

				products_price = "";
				productPriceTotal_val = "";
				productExtras_val = "";
				if(currencyAtRight){
				    products_price = orderDetails.products[i]['price']+""+currentCurrency;
				    productPriceTotal_val = productPriceTotal+""+currentCurrency;
				    productExtras_val = productExtras+""+currentCurrency;
				}else{
				     products_price = currentCurrency+""+orderDetails.products[i]['price'];
				     productPriceTotal_val = currentCurrency+""+productPriceTotal;
				     productExtras_val = currentCurrency+""+productExtras;
				}

				
				   var extra_html='';
                if(orderDetails.products[i].extras!=undefined && orderDetails.products[i].extras!='' && orderDetails.products[i].extras.length>0){
                  extra_html=extra_html+'<span>';
                  var extra_count=1;
                  try{
                  orderDetails.products[i].extras.forEach((extra) => {
                    
                    if(extra_count>1){
                      extra_html=extra_html+','+extra;
                     }else{
                      extra_html=extra_html+extra;
                     }
                    extra_count++;
                  });
              	}catch(error){
              		
              	}

                  extra_html=extra_html+'</span>';
                }


				order_items += '<tr>';
					if(orderDetails.products[i]['photo'] != ''){
						order_items += '<td class="ord-photo"><img alt="#" src="'+orderDetails.products[i]['photo']+'" class="img-fluid order_img rounded"></td>';	
					}else{
						order_items += '<td class="ord-photo"><img alt="#" src="'+place_image+'" class="img-fluid order_img rounded"></td>';
					}
			      	

			      	order_items += '<td class="prod-name">'+orderDetails.products[i]['name']+'<div class="extra"><span>{{trans("lang.extras")}} :</span><span class="ext-item">'+extra_html+'</span></div></td>';

			      	order_items += '<td class="qunt">x '+orderDetails.products[i]['quantity']+'</td>';

			      	order_items +='<td class="extras_price">+ '+productExtras_val+'</td>';

			      	order_items += '<td class="product_price">'+products_price+'</td>';

			      	order_items += '<td class="total_product_price text-right">'+productPriceTotal_val+'</td>';

				order_items += '</tr>';



			}

			order_number = orderDetails['id'];
			if(orderDetails.hasOwnProperty('deliveryCharge') && orderDetails.deliveryCharge){
				order_shipping = orderDetails.deliveryCharge;	
			}
			

			order_status = orderDetails['status'];
			if(orderDetails.hasOwnProperty('discount') && orderDetails.discount){
				order_discount = orderDetails.discount;	
			}else{
				order_discount = 0;
			}

			if(orderDetails.hasOwnProperty('tip_amount') && orderDetails.tip_amount){
				order_tip_amount = orderDetails.tip_amount;	
			}else{
				order_tip_amount = 0;
			}
			var order_subtotal_main=order_subtotal;
			order_subtotal = order_subtotal - parseFloat(order_discount);

			tax = 0;
			taxlabel = '';
			taxlabeltype = '';
            if(orderDetails.hasOwnProperty('taxSetting')){
                if(orderDetails.taxSetting.type && orderDetails.taxSetting.tax){
                    if(orderDetails.taxSetting.type=="percent"){
                        tax=(orderDetails.taxSetting.tax*order_subtotal)/100;
                        taxlabeltype="%";
                    }else{
                        tax=orderDetails.taxSetting.tax;
                        taxlabeltype="fix";
                    }
                    taxlabel = orderDetails.taxSetting.label;
                }
                $(".order_tax_div").show();

                if(currencyAtRight){
					$("#order-tax").html(tax.toFixed(2)+""+currentCurrency+" ("+taxlabel+" "+orderDetails.taxSetting.tax +" "+taxlabeltype+")");
            	}else{
            		$("#order-tax").html(currentCurrency+""+tax.toFixed(2)+" ("+taxlabel+" "+orderDetails.taxSetting.tax +" "+taxlabeltype+")");
            	}
            }
            
			// order_subtotal = parseFloat(order_subtotal)
			order_total = order_subtotal + parseFloat(order_shipping)+ parseFloat(order_tip_amount)+parseFloat(tax);

			order_total_val = "";
			order_subtotal_val = "";
			order_discount_val = "";
			order_shipping_val = "";
			order_tip_amount_val = "";
			if(currencyAtRight){
			    order_total_val = order_total.toFixed(2)+""+currentCurrency;
			    order_subtotal_main = order_subtotal_main.toFixed(2)+""+currentCurrency;
			    order_subtotal_val = order_subtotal.toFixed(2)+""+currentCurrency;
			    order_shipping_val = order_shipping+""+currentCurrency;
			    order_discount_val = order_discount+""+currentCurrency;
			    order_tip_amount_val = order_tip_amount+""+currentCurrency;
			}else{
			     order_total_val = currentCurrency+""+order_total.toFixed(2);
			     order_subtotal_val = currentCurrency+""+order_subtotal.toFixed(2);
			     order_subtotal_main = currentCurrency+""+order_subtotal_main.toFixed(2);
			     order_shipping_val = currentCurrency+""+order_shipping;
			     order_discount_val = currentCurrency+""+order_discount;
			     order_tip_amount_val = currentCurrency+""+order_tip_amount;
			}

			$("#order-number").html(order_number);

			$("#order-status").html(order_status);

			$("#order-items").html('<table class="order-list">'+order_items+'</table>');

			

			$("#order-subtotal").html(order_subtotal_main);

			$("#order-shipping").html(order_shipping_val);
			if(orderDetails.hasOwnProperty('couponCode') && orderDetails.couponCode != ''){
				$('.used_coupon_code_div').show();		
				$("#used_coupon_code").html(orderDetails.couponCode);
			}

			$("#order-discount").html(order_discount_val);

			$("#order-tip-amount").html(order_tip_amount_val);

			$("#order-total").append(order_total_val);
			if(orderDetails.hasOwnProperty('takeAway') && orderDetails.takeAway == true){
				$("#order-type").html("Take Away");	
			}else{
				$("#order-type").html("Delivery");
			}
			

			var order_restaurant = '<tr>';
			var restaurantImage = orderDetails.vendor.photo;
            var view_vendor_details = "{{ route('restaurant',':id')}}";
            view_vendor_details = view_vendor_details.replace(':id', 'id='+orderDetails.vendorID);
            orderVendorId = orderDetails.vendorID;
            reviewUserName = orderDetails.author.firstName+' '+orderDetails.author.lastName;
            reviewUserProfile = orderDetails.author.profilePictureURL;
			if(restaurantImage == ''){
				restaurantImage = place_image;
			}
			// order_restaurant += '<td class="ord-photo"><a href="'+view_vendor_details+'" class="row redirecttopage" id="resturant-view"><img alt="#" src="'+restaurantImage+'" class="img-fluid order_img rounded"></a></td>';
			// order_restaurant += '<td class="prod-name"><a href="'+view_vendor_details+'" class="row redirecttopage" id="resturant-view">'+orderDetails.vendor.title+'</a></td>';
			// order_restaurant += '</tr>';

			// $("#restaurant-details").html('<table class="order-list">'+order_restaurant+'</table>');

            $('.resturant-img').attr('src',restaurantImage);

          	if (orderDetails.vendor.title) {
              $('.restaurant-title').html('<a href="'+view_vendor_details+'" class="row redirecttopage" id="resturant-view">'+orderDetails.vendor.title+'</a>');  
          	}

          	if (orderDetails.vendor.phonenumber) {
              $('#restaurant_phone').text(orderDetails.vendor.phonenumber);  
          	}

          	if (orderDetails.vendor.location) {
              $('#restaurant_address').text(orderDetails.vendor.location);  
          	}



				if(orderDetails.hasOwnProperty('takeAway') && orderDetails.takeAway == true){
					$(".order_driver_details").hide();
					$(".order_shopping_div").hide();
					$(".order_tip_div").hide();
				}else if(orderDetails.hasOwnProperty('driver')){
						var driverImage = orderDetails.driver.profilePictureURL;
						if(driverImage == ''){
							driverImage = place_image;
						}
						var name = orderDetails.driver.firstName+" "+orderDetails.driver.lastName;
						// var order_driver = '<tr>';
						// order_driver += '<td class="ord-photo"><img alt="#" src="'+driverImage+'" class="img-fluid order_img rounded"></td>';
						// order_driver += '<td class="prod-name">'+name+'</td>';
						// order_driver += '</tr>';
						// $("#driver_details").html('<table class="order-list">'+order_driver+'</table>');	

						$('.driver-img').attr('src',driverImage);

				        if (name) {
				              $('.driver-name-title').html(name);  
				       	}

			          	if (orderDetails.driver.phoneNumber) {
			              $('#driver_phone').text(orderDetails.driver.phoneNumber);  
			          	}

			          	if (orderDetails.driver.carNumber) {
			              $('#driver_car_number').text(orderDetails.driver.carNumber);  
			          	}

			          	// if(orderDetails.driver.carName){

			          	// 	$('#driver_car_name').text(orderDetails.driver.carName);  
			          	// }		
					}

							if(!orderDetails.driver){
								$("#order_driver_details").hide();
							}

					if(orderDetails.notes){
						$("#order-note-box").show();
						$("#order-note").html(orderDetails.notes);				
					}


}

		})

	}

var storageRef = firebase.storage().ref('images');
function handleFileSelect(evt) {
  var f = evt.target.files[0];
  var reader = new FileReader();

  reader.onload = (function(theFile) {
    return function(e) {
        
      var filePayload = e.target.result;
      var hash = CryptoJS.SHA256(Math.random() + CryptoJS.SHA256(filePayload));
        var val =f.name;       
      var ext=val.split('.')[1];
      var docName=val.split('fakepath')[1];
      var filename = (f.name).replace(/C:\\fakepath\\/i, '')

      var timestamp = Number(new Date());      
      var uploadTask = storageRef.child(filename).put(theFile);
      console.log(uploadTask);
      uploadTask.on('state_changed', function(snapshot){
      var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
      console.log('Upload is ' + progress + '% done');
       jQuery("#uploding_image").text("Image is uploading...");
    }, function(error) {
    }, function() {
        uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
            jQuery("#uploding_image").text("Upload is completed");
            reviewOrderImage = downloadURL;

      });   
    });
    
    };
  })(f);
  reader.readAsDataURL(f);
}   



</script>