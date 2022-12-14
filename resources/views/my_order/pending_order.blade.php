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

						<a class="nav-link border-0 text-dark py-3" href="{{url('my_order')}}"> <i class="feather-check mr-2 text-success mb-0"></i>
							{{trans('lang.completed')}}</a>

					</li>

					<li class="nav-item border-top" role="presentation">

						<a class="nav-link border-0 text-dark py-3 active" href="{{url('my_order')}}"> <i class="feather-clock mr-2 text-warning mb-0"></i>
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

											<h6 class="font-weight-bold mb-1">{{trans('lang.order_discount')}}</h6>

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

				      	/*if(orderDetails.products[i].hasOwnProperty('discountPrice') && orderDetails.products[i]['discountPrice'] != ''){
				      		order_subtotal = order_subtotal + parseFloat(orderDetails.products[i]['discountPrice']) * parseFloat(orderDetails.products[i]['quantity']);
				      	}else{*/
				      		order_subtotal = order_subtotal + parseFloat(orderDetails.products[i]['price']) * parseFloat(orderDetails.products[i]['quantity']);
				      	/*}*/

						/*if(orderDetails.products[i].hasOwnProperty('discountPrice') && orderDetails.products[i]['discountPrice'] != ''){
				      		var productPriceTotal = parseFloat(orderDetails.products[i]['discountPrice']) * parseFloat(orderDetails.products[i]['quantity']);
				      	}else{*/
				      		var productPriceTotal = parseFloat(orderDetails.products[i]['price']) * parseInt(orderDetails.products[i]['quantity']);
				      	/*}*/
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
				    

				    	/*if(orderDetails.products[i].hasOwnProperty('discountPrice') && orderDetails.products[i]['discountPrice'] != ''){
				      		products_price = orderDetails.products[i]['discountPrice']+""+currentCurrency;
				      	}else{*/
								products_price = orderDetails.products[i]['price']+""+currentCurrency;
				      	/*}*/
				    productPriceTotal_val = productPriceTotal+""+currentCurrency;
				    productExtras_val = productExtras+""+currentCurrency;
				}else{
				     // products_price = currentCurrency+""+orderDetails.products[i]['price'];
				     	/*if(orderDetails.products[i].hasOwnProperty('discountPrice') && orderDetails.products[i]['discountPrice'] != ''){
				      		products_price = currentCurrency+""+orderDetails.products[i]['discountPrice'];
				      	}else{*/
								products_price = currentCurrency+""+orderDetails.products[i]['price'];
				      	/*}*/
				     productPriceTotal_val = currentCurrency+""+productPriceTotal;
				     productExtras_val = currentCurrency+""+productExtras;
				}

				/*order_items += '<div class="p-3">';

				   order_items += '<div class="d-flex pb-3">';

				      order_items += '<div class="text-muted mr-3 photo"><img alt="#" src="'+orderDetails.products[i]['photo']+'" class="img-fluid order_img rounded"></div>';

				      order_items += '<div class="item-detail">';

				         order_items += '<p class="mb-0 font-weight-bold name">Name: '+orderDetails.products[i]['name']+'</p>';

				         order_items += '<p class="mb-0 qty">Quantity: '+orderDetails.products[i]['quantity']+'</p>';

				         order_items += '<p class="price">Price: $'+orderDetails.products[i]['quantity']*orderDetails.products[i]['price']+'</p>';

				      order_items += '</div>';

				   order_items += '</div>';

				order_items += '</div>';*/

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
                        
                        console.log("tax");
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
			    order_subtotal_val = order_subtotal.toFixed(2)+""+currentCurrency;
			    order_subtotal_main = order_subtotal_main.toFixed(2)+""+currentCurrency;
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

			$("#order-discount").html("-"+order_discount_val);
			if(orderDetails.hasOwnProperty('couponCode') && orderDetails.couponCode != ''){
				$('.used_coupon_code_div').show();		
				$("#used_coupon_code").html(orderDetails.couponCode);
			}

			

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



</script>