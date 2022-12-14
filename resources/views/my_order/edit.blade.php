

@include('layouts.app')



@include('layouts.header')


@section('content')
 <div class="page-wrapper">
     <div class="card-body">
           
          <div class="text-right print-btn"><button type="button" class="fa fa-print" onclick="PrintElem('order_detail')"></button></div>  
        
        <div class="order_detail" id="order_detail">
          <div class="order_detail-top"> 
            <div class="row"> 
              <div class="order_edit-genrl col-md-4">

                <h3>{{trans('lang.general_details')}}</h3>
                <div class="order_detail-top-box">

                  <div class="form-group row widt-100 gendetail-col">
                    <label class="col-12 control-label"><strong>{{trans('lang.date_created')}} : </strong><span id="createdAt"></span></label>
                    <!-- <div class="col-7">
                       <span id="createdAt"></span>   
                    </div> -->
                  </div>

                 <!--  <div class="form-group row widt-100 gendetail-col"> -->
                  <div class="form-group row widt-100 gendetail-col payment_method"> 
                    <label class="col-12 control-label"><strong>{{trans('lang.payment_methods')}}: </strong><span id="payment_method"></span></label>
                    <!-- <div class="col-7">
                       <span id="payment_method"></span>   
                    </div> -->
                  </div>

                  <div class="form-group row widt-100 gendetail-col">
                    <label class="col-12 control-label"><strong>{{trans('lang.order_type')}}:</strong> <span id="order_type"></span></label>
                  </div>
                     
                  <div class="form-group row width-100 ">
                    <label class="col-3 control-label">{{trans('lang.status')}}:</label>
                    <div class="col-7">
                      <select id= "order_status" class="form-control" disabled>
                          <option value="Order Placed">{{ trans('lang.order_placed')}}</option>
                          <option value="Order Accepted">{{ trans('lang.order_accepted')}}</option>
                          <option value="Order Rejected">{{ trans('lang.order_rejected')}}</option>
                          <option value="Driver Pending">{{ trans('lang.driver_pending')}}</option>
                          <option value="Driver Rejected">{{ trans('lang.driver_rejected')}}</option>
                          <option value="Order Shipped">{{ trans('lang.order_shipped')}}</option>
                          <option value="In Transit">{{ trans('lang.in_transit')}}</option>
                          <option value="Order Completed">{{ trans('lang.order_completed')}}</option>            
                      </select>
                   </div>
                  </div>

                  <!-- <div class="form-group row width-100">
                  <label class="col-3 control-label">Customer:</label>
                   <div class="col-7">
                    <select id="coupon_discount_type" class="form-control">
                    <option vale="percent">Completed</option>
                    <option value="fixed">Cancelled</option>
                    <option value="fixed">Cancelled</option>
                    <option value="fixed">Cancelled</option>
                    <option value="fixed">Cancelled</option>
                    <option value="fixed">Cancelled</option>
                  </select> 
                   </div>
                  </div> -->
                  <?php /* <div class="form-group row width-100">
                    <label class="col-3 control-label"></label>
                    <div class="col-7 text-right">
                     <button type="button" class="btn btn-primary save_order_btn" ><i class="fa fa-save"></i> {{trans('lang.update')}}</button>
                   </div>
                  </div> */ ?>
                </div>

              </div>

              <div class="order_addre-edit col-md-4">
                <h3>{{ trans('lang.billing_details')}}</h3>
                  
                  <div class="address order_detail-top-box">
                    <p>
                      <span id="billing_name"></span><br>
                      <span id="billing_line1"></span><br>
                      <span id="billing_line2"></span><br>
                      <span id="billing_country" ></span>
                    </p>
                    <p><strong>{{trans('lang.email_address')}}:</strong> 
                       <span id="billing_email"></span>
                    </p>
                    <p><strong>{{trans('lang.phone')}}:</strong>
                      <span id="billing_phone"></span> 
                    </p> 
                  </div>
              </div>

              <div class="order_addre-edit col-md-4 driver_details_hide">
                <h3>{{ trans('lang.driver_detail')}}</h3>
                  
                <div class="address order_detail-top-box">
                  <p>
                      <span id="driver_firstName"></span> <span id="driver_lastName"></span><br>
                  </p>
                  <p><strong>{{trans('lang.email_address')}}:</strong> 
                       <span id="driver_email"></span>
                  </p>
                  <p><strong>{{trans('lang.phone')}}:</strong>
                    <span id="driver_phone"></span> 
                  </p> 
                  <p><strong>{{trans('lang.car_name')}}:</strong>
                    <span id="driver_carName"></span> 
                  </p> 
                  <p><strong>{{trans('lang.car_number')}}:</strong>
                    <span id="driver_carNumber"></span> 
                  </p> 
                </div>
              </div>

            </div>
            
          </div>          
          

         
        <div class="order-deta-btm mt-4">
          <div class="row">
            <div class="col-md-8 order-deta-btm-left">
          <div class="order-items-list ">
            <div class="row">
              <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-valign-middle">
                   
                   <thead>
                     <tr>
                      <th>{{trans('lang.item')}}</th>
                      <th>{{trans('lang.price')}}</th>
                      <th>{{trans('lang.qty')}}</th>
                      <th>{{trans('lang.extras')}}</th>
                      <th>{{trans('lang.total')}}</th>
                    </tr>
                  
                  </thead>

                  <tbody id="order_products">
                    <!-- <div id="order_products"></div> -->
                   <?php /*  <tr>
                       <td class="order-product">
                          <div class="order-product-box">
                          <img class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="https://firebasestorage.googleapis.com/v0/b/foodies-3c1d9.appspot.com/o/images%2FovRQ5Opxe6gIOjO7YrvyUfFVADU2.png?alt=media&amp;token=7a11b826-0d55-4ba5-bd03-a67a3bdb6361" alt="image">
                          </div>
                          <div class="woo-orders-tracking-container">
                            <h6>Product Name</h6>
                              <div class="woo-orders-tracking-item-details">
                                  <div class="woo-orders-tracking-item-tracking-code-label">
                                      <span >Tracking number</span>
                                  </div>
                                  <div class="woo-orders-tracking-item-tracking-code-value" title="Tracking carrier Fedex">
                                      <!-- <a href="http://162.241.125.167/~oleumvitae/orders-tracking/?tracking_id=1234567812345" target="_blank">1234567812345</a> -->
                                      <span id="trackng_number" ></span>
                                  </div>
                                  <div class="woo-orders-tracking-item-tracking-button-edit-container">
                                   <a href="#"><i class="fa fa-edit"></i></a>
                          
                                  </div>
                              </div>
                            </div>
                        </td>
                        <td>$172.00</td>
                        <td>× 1</td>
                        <td>$172.00</td> 
                    </tr> */ ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="order-data-row order-totals-items">
            <div class="row">
              <div class="col-md-12">
                 <table class="order-totals">

                    <tbody id="order_products_total">
                        <!-- <tr>
                            <td class="label">Items Subtotal:</td>
                            <td class="total">
                              $ 172.00
                            </td>
                          </tr>
                        <tr>
                            <td class="label">Shipping:</td>
                            <td class="total">
                              $ 10.00</td>
                          </tr>
                        <tr>
                          <td class="label">Order Total:</td>
                          <td class="total">
                            $ 182.00 </td>
                        </tr>

                         <tr class="paid">
                          <td class="label">Paid</td>
                          <td class="total">
                            $ 182.00</td>
                        </tr> -->

                  </tbody>
                </table>
              </div>
            </div>
         </div>
        </div>
         
         <div class="col-md-4 order-deta-btm-right">
            <div class="resturant-detail">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-header-title">{{trans('lang.restaurant')}}</h4>
                </div>

                <div class="card-body">
                  <a href="#" class="row" id="resturant-view">
                    <div class="col-4">
                      <img src="" class="resturant-img rounded-circle" alt="restaurant" width="70px" height="70px">
                    </div>
                    <div class="col-8">
                      <h4 class="restaurant-title"></h4>
                    </div>
                  </a>

                  <h5 class="contact-info">{{trans('lang.contact_info')}}:</h5>
                   <!-- <p><strong>{{trans('lang.email_address')}}:</strong> 
                       <span id="restaurant_email"></span>
                    </p> -->
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
        </div>

       </div>
     </div>
   </div>


@include('layouts.footer')



@include('layouts.nav')





@section('scripts')
<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>
<script>
var id = "<?php echo $id;?>";
var database = firebase.firestore();
var geoFirestore = new GeoFirestore(database);
var ref = database.collection('restaurant_orders').where("id","==",id);
var append_procucts_list = '';
var append_procucts_total = '';
var total_price=0;
var currentCurrency = '';
var currencyAtRight = false;
var refCurrency = database.collection('currencies').where('isActive', '==' , true);

refCurrency.get().then( async function(snapshots){  
    var currencyData = snapshots.docs[0].data();
    currentCurrency = currencyData.symbol;
    currencyAtRight = currencyData.symbolAtRight;
}); 
var geoFirestore = new GeoFirestore(database);
var place_image ='';
var ref_place = database.collection('settings').doc("placeHolderImage");
 ref_place.get().then( async function(snapshots){

    var placeHolderImage = snapshots.data();            
    place_image = placeHolderImage.image;
    
});

 $(document).ready(function(){
    
    $(document.body).on('click', '.redirecttopage' ,function(){    
        var url=$(this).attr('data-url');
        window.location.href = url;
    });

    jQuery("#data-table_processing").show();
  
    ref.get().then( async function(snapshots){
    var order = snapshots.docs[0].data();

    append_procucts_list = document.getElementById('order_products');
    append_procucts_list.innerHTML='';

    append_procucts_total = document.getElementById('order_products_total');
    append_procucts_total.innerHTML='';


    $("#billing_name").text(order.address.name);
    var billingAddressstring = '';

    $("#trackng_number").text(id);
    if(order.address.hasOwnProperty('line1')){
      $("#billing_line1").text(order.address.line1);
    }
    if(order.address.hasOwnProperty('line2')){
      billingAddressstring = billingAddressstring + order.address.line2; 
    }
    if(order.address.hasOwnProperty('city')){
      billingAddressstring = billingAddressstring+", "+ order.address.city; 
    }

    if(order.address.hasOwnProperty('postalCode')){
      billingAddressstring = billingAddressstring+", "+ order.address.postalCode; 
    }

    if(order.author.hasOwnProperty('phoneNumber')){ 
      $("#billing_phone").text(order.author.phoneNumber);
    }
    
    $("#billing_line2").text(billingAddressstring);  
  
    if(order.address.hasOwnProperty('country')){
    
      $("#billing_country").text(order.address.country); 
    
    }

    if(order.address.hasOwnProperty('email')){
      $("#billing_email").html('<a href="mailto:'+order.address.email+'">'+order.address.email+'</a>'); 
    }
   
    if (order.createdAt) {
        var date1 = order.createdAt.toDate().toDateString();
        var date = new Date(date1);
        var dd = String(date.getDate()).padStart(2, '0');
        var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = date.getFullYear();
        var createdAt_val = yyyy + '-' + mm + '-' + dd;
        var time = order.createdAt.toDate().toLocaleTimeString('en-US');
        //console.log('time'+time);
      $('#createdAt').text(createdAt_val+' '+time);
    }

    if (order.payment_method) {

      if (order.payment_method == 'cod') {
        $('#payment_method').text('{{trans("lang.cash_on_delivery")}}');
      } else if(order.payment_method == 'paypal') {
        $('#payment_method').text('{{trans("lang.paypal")}}');
      }else{
        $('#payment_method').text(order.payment_method);
      }

    }
    if(order.hasOwnProperty('takeAway') && order.takeAway){
      $('#order_type').text('{{trans("lang.order_takeaway")}}');
      $('.payment_method').hide();

    }else{
      $('#order_type').text('{{trans("lang.order_delivery")}}');
      $('.payment_method').show();

    }

    if ((order.driver!='' && order.driver!=undefined ) && (order.takeAway) ) {

      $('#driver_carName').text(order.driver.carName);
      $('#driver_carNumber').text(order.driver.carNumber);
      $('#driver_email').html('<a href="mailto:'+order.driver.email+'">'+order.driver.email+'</a>');
      $('#driver_firstName').text(order.driver.firstName);
      $('#driver_lastName').text(order.driver.lastName);
      $('#driver_phone').text(order.driver.phoneNumber);

    }else{
      $('.order_edit-genrl').removeClass('col-md-4').addClass('col-md-6');
      $('.order_addre-edit').removeClass('col-md-4').addClass('col-md-6');
      $('.driver_details_hide').empty();
    }

    
    var productsListHTML=buildHTMLProductsList(order.products);
    var productstotalHTML=buildHTMLProductstotal(order);

     if(productsListHTML!=''){
        append_procucts_list.innerHTML=productsListHTML;
     }

     if(productstotalHTML!=''){
        append_procucts_total.innerHTML=productstotalHTML;
     }

    $("#order_status option[value='"+order.status+"']").attr("selected","selected");
    var price = 0;



    if (order.vendorID) {
      var vendor = database.collection('vendors').where("id","==",order.vendorID);
      
      vendor.get().then( async function(snapshotsnew){
        var vendordata = snapshotsnew.docs[0].data();
         console.log(JSON.stringify(vendordata));

        

          if (vendordata.id) {
            
          }
          if (vendordata.photo) {
              $('.resturant-img').attr('src',vendordata.photo);  
          }else{
              $('.resturant-img').attr('src',place_image); 
          }
          if (vendordata.title) {
              $('.restaurant-title').html(vendordata.title);  
          }

          if (vendordata.phonenumber) {
              $('#restaurant_phone').text(vendordata.phonenumber);  
          }
          if (vendordata.location) {
              $('#restaurant_address').text(vendordata.location);  
          }

      });

    }

 
       jQuery("#data-table_processing").hide();
  })


<?php  /* $(".save_order_btn").click(function(){

  var clientName = $(".client_name").val();
  var orderStatus = $("#order_status").val();
  console.log('orderStatus'+orderStatus);

    database.collection('restaurant_orders').doc(id).update({'status':orderStatus}).then(function(result) {        
        window.location.href = '{{ route("orders")}}';
    }); 
   
}) */ ?>

})




function buildHTMLProductsList(snapshotsProducts){
        var html='';
        var alldata=[];
        var number= [];
        var totalProductPrice=0;
       
        snapshotsProducts.forEach((product) => {
            
            var val=product;
            
                html=html+'<tr>';

                var extra_html='';
                if(product.extras!=undefined && product.extras!='' && product.extras.length>0){
                  extra_html=extra_html+'<span>';
                  var extra_count=1;
                  
                  product.extras.forEach((extra) => {
                    
                    if(extra_count>1){
                      extra_html=extra_html+','+extra;
                     }else{
                      extra_html=extra_html+extra;
                     }
                    extra_count++;
                  })

                  extra_html=extra_html+'</span>';
                }

                html=html+'<td class="order-product"><div class="order-product-box">';
                if(val.photo != ''){
                  html=html+'<img class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="'+val.photo+'" alt="image">';
                }else{
                  html=html+'<img class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="'+place_image+'" alt="image">';
                }
                html=html+'</div><div class="orders-tracking"><h6>'+val.name+'</h6><div class="orders-tracking-item-details">';
                if(extra_count>1 || product.size){
                  html=html+'<strong>{{trans("lang.extras")}} :</strong>';
                }
                if(extra_count>1){
                   html=html+'<div class="extra"><span>{{trans("lang.extras")}} :</span><span class="ext-item">'+extra_html+'</span></div>';
                }
                if(product.size){
                   html=html+'<div class="type"><span>{{trans("lang.type")}} :</span><span class="ext-size">'+product.size+'</span></div>';
                }                
                price_item=parseFloat(val.price).toFixed(2);
                
                totalProductPrice =  parseFloat(price_item)*parseInt(val.quantity);
                var extras_price=0;
                if(product.extras!=undefined && product.extras!='' && product.extras.length>0){
                  extras_price_item=parseFloat(val.extras_price).toFixed(2);
                  if(parseFloat(extras_price_item)!=NaN && val.extras_price!=undefined){
                      extras_price=extras_price_item;
                  }
                  totalProductPrice =parseFloat(extras_price)+parseFloat(totalProductPrice);
                }
                totalProductPrice=parseFloat(totalProductPrice).toFixed(2);

                if(currencyAtRight){
                    price_val = price_item+""+currentCurrency;
                    extras_price_val = extras_price+""+currentCurrency;
                    totalProductPrice_val = totalProductPrice+""+currentCurrency;
                }else{
                   price_val = currentCurrency+""+price_item;
                  extras_price_val = currentCurrency+""+extras_price;
                   totalProductPrice_val = currentCurrency+""+totalProductPrice;
                }

                html=html+'</div></div></td>';
                html=html+'<td>'+price_val+'</td><td> × '+val.quantity+'</td><td> + '+extras_price_val+'</td><td>  '+totalProductPrice_val+'</td>'; 
        
                html=html+'</tr>';
                total_price +=parseFloat(totalProductPrice);                
           
          });
          totalProductPrice=0;
          
          return html;      
}


function buildHTMLProductstotal(snapshotsProducts){
        var html='';
        var alldata=[];
        var number= [];

        var adminCommission = snapshotsProducts.adminCommission;
        var discount = snapshotsProducts.discount;
        var couponCode = snapshotsProducts.couponCode;
        var extras = snapshotsProducts.extras;
        var extras_price = snapshotsProducts.extras_price;
        var rejectedByDrivers = snapshotsProducts.rejectedByDrivers;
        var takeAway = snapshotsProducts.takeAway;
        var tip_amount = snapshotsProducts.tip_amount;
        var status = snapshotsProducts.status;
        var products = snapshotsProducts.products;
        var deliveryCharge = snapshotsProducts.deliveryCharge;
        
        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        
        if (products) {

          products.forEach((product) => {

              var val=product;
          });
        }

          
          if(intRegex.test(discount) || floatRegex.test(discount)) {

            discount=parseFloat(discount).toFixed(2);
            total_price -=parseFloat(discount);

            if(currencyAtRight){
                discount_val = discount+""+currentCurrency;
            }else{
               discount_val = currentCurrency+""+discount;
            }

            couponCode_html='';
            if (couponCode) {
              couponCode_html='</br><small>{{trans("lang.coupon_codes")}} :'+couponCode+'</small>';
            }
            html=html+'<tr><td class="label">{{trans("lang.discount")}}'+couponCode_html+'</td><td class="discount">-'+discount_val+'</td></tr>';
          }
          
          if(intRegex.test(deliveryCharge) || floatRegex.test(deliveryCharge)) {

                deliveryCharge=parseFloat(deliveryCharge).toFixed(2);
                total_price +=parseFloat(deliveryCharge);
                
                if(currencyAtRight){
                  deliveryCharge_val = deliveryCharge+""+currentCurrency;
                }else{
                   deliveryCharge_val = currentCurrency+""+deliveryCharge;
                }
                if (takeAway =='' || takeAway == false) {

                    html=html+'<tr><td class="label">{{trans("lang.deliveryCharge")}}</td><td class="deliveryCharge">+'+deliveryCharge_val+'</td></tr>';
                }
          }

          
          if(intRegex.test(tip_amount) || floatRegex.test(tip_amount)) {

              tip_amount=parseFloat(tip_amount).toFixed(2);
              total_price +=parseFloat(tip_amount);
              total_price=parseFloat(total_price).toFixed(2);
              
                if(currencyAtRight){
                  tip_amount_val = tip_amount+""+currentCurrency;
                }else{
                   tip_amount_val = currentCurrency+""+tip_amount;
                }
                if (takeAway =='' || takeAway == false) {
                    html=html+'<tr><td class="label">{{trans("lang.tip_amount")}}</td><td class="tip_amount_val">+'+tip_amount_val+'</td></tr>';
                }
            }

            if(currencyAtRight){
              total_price_val = total_price+""+currentCurrency;
            }else{
               total_price_val = currentCurrency+""+total_price;
            }

          html=html+'<tr><td class="label">{{trans("lang.total_amount")}}</td><td class="total_price_val">'+total_price_val+'</td></tr>';

          if (adminCommission) {

            adminCommission = parseFloat(adminCommission).toFixed(2);
            if(currencyAtRight){
              adminCommission_val = adminCommission+""+currentCurrency;
            }else{
               adminCommission_val = currentCurrency+""+adminCommission;
            }
              html=html+'<tr><td class="label"><small>( {{trans("lang.admin_commission")}} </small></td><td class="adminCommission_val"><small>'+adminCommission_val+')</small></td></tr>';            
          }

        
          return html;      
}

function PrintElem(elem)
{

    jQuery('#'+elem).printThis({
        debug: false, 
        importStyle:true,
        loadCSS:[
                '<?php echo asset('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>',
                '<?php echo asset('css/style.css'); ?>',                
                '<?php echo asset('css/colors/blue.css'); ?>',                
                '<?php echo asset('css/icons/font-awesome/css/font-awesome.css'); ?>',                
                '<?php echo asset('assets/plugins/toast-master/css/jquery.toast.css'); ?>',                
                ],
    });


}


</script>

@endsections