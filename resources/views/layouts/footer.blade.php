<button type="button" id="locationModal" data-toggle="modal" data-target="#locationModalAddress" hidden>submit</button>

<div class="modal fade" id="locationModalAddress" tabindex="-1" role="dialog"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered location_modal">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title locationModalTitle">{{trans('lang.delivery_address')}}</h5>

            </div>

            <div class="modal-body">

                <form class="">

                    <div class="form-row">

                        <div class="col-md-12 form-group">

                            <label class="form-label">{{trans('lang.street_1')}}</label>

                            <div class="input-group">

                                <input placeholder="Delivery Area" type="text" id="address_line1" class="form-control">

                                <div class="input-group-append">
                                    <button onclick="getCurrentLocationAddress1()" type="button"
                                            class="btn btn-outline-secondary"><i class="feather-map-pin"></i></button>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-12 form-group"><label
                                    class="form-label">{{trans('lang.landmark')}}</label><input
                                    placeholder="{{trans('lang.footer')}}" value=""
                                    id="address_line2" type="text" class="form-control"></div>

                        <div class="col-md-12 form-group"><label
                                    class="form-label">{{trans('lang.zip_code')}}</label><input placeholder="Zip Code"
                                                                                                id="address_zipcode"
                                                                                                type="text"
                                                                                                class="form-control">
                        </div>

                        <div class="col-md-12 form-group"><label class="form-label">{{trans('lang.city')}}</label><input
                                    placeholder="{{trans('lang.city')}}" id="address_city" type="text" class="form-control"></div>

                        <div class="col-md-12 form-group"><label
                                    class="form-label">{{trans('lang.country')}}</label><input placeholder="Country"
                                                                                               id="address_country"
                                                                                               type="text"
                                                                                               class="form-control">
                        </div>

                        <input type="hidden" name="address_lat" id="address_lat">
                        <input type="hidden" name="address_lng" id="address_lng">
                    </div>

                </form>

            </div>

            <div class="modal-footer p-0 border-0">

                <div class="col-12 m-0 p-0">
                    <button type="button" id="close_button" class="close" data-dismiss="modal" aria-label="Close"
                            hidden>
                        <button type="button" class="btn btn-primary btn-lg btn-block"
                                onclick="saveShippingAddress()">{{trans('lang.save_changes')}}</button>

                </div>

            </div>

        </div>

    </div>

</div>

<span style="display: none;">
	<button type="button" class="btn btn-primary" id="notification_accepted_order_by_restaurant_id" data-toggle="modal" data-target="#notification_accepted_order_by_restaurant">{{trans('lang.large_modal')}}</button>
	</span>
<div class="modal fade" id="notification_accepted_order_by_restaurant" tabindex="-1" role="dialog" aria-labelledby="notification_accepted_order_by_restaurant" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered notification-main" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('lang.your_order_has_accepted')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <h6><span id="restaurnat_name"></span> {{trans('lang.has_accept_your_order')}}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="{{url('my_order')}}" id="notification_accepted_order_by_restaurant_a">{{trans('lang.go')}}</a></button>
      </div>
    </div>
  </div>
</div>
<span style="display: none;">
	<button type="button" class="btn btn-primary" id="notification_rejected_order_by_restaurant_id" data-toggle="modal" data-target="#notification_rejected_order_by_restaurant">{{trans('lang.large_modal')}}</button>
	</span>
<div class="modal fade" id="notification_rejected_order_by_restaurant" tabindex="-1" role="dialog" aria-labelledby="notification_accepted_order_by_restaurant" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered notification-main" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('lang.your_oder_has_rejected')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <h6><span id="restaurnat_name_1"></span> {{trans('lang.has_reject_your_order')}}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="{{url('my_order')}}" id="notification_rejected_order_by_restaurant_a">{{trans('lang.go')}}</a></button>
      </div>
    </div>
  </div>
</div>

 <span style="display: none;">
	<button type="button" class="btn btn-primary" id="notification_accepted_order_id" data-toggle="modal" data-target="#notification_accepted_order">{{trans('lang.large_modal')}}</button>
	</span>  
<div class="modal fade" id="notification_accepted_order" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered notification-main" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('lang.delivery_agent_assign')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <h6><span id="np_accept_name"></span> {{trans('lang.will_deliver_your_order')}}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="{{url('my_order')}}" id="notification_accepted_a">{{trans('lang.go')}}</a></button>
      </div>
    </div>
  </div>
</div>
<span style="display: none;">
	<button type="button" class="btn btn-primary" id="notification_order_complete_id" data-toggle="modal" data-target="#notification_order_complete">{{trans('lang.large_modal')}}</button>
	</span>
<div class="modal fade" id="notification_order_complete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered notification-main" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('lang.order_completed')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <h6>{{trans('lang.delivery_agent_delivered_order')}}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="{{url('my_order')}}" id="">{{trans('lang.go')}}</a></button>
      </div>
    </div>
  </div>
</div>

<span style="display: none;">
	<button type="button" class="btn btn-primary" id="notification_accepted_dining_by_restaurant_id" data-toggle="modal" data-target="#notification_accepted_dining_by_restaurant">{{trans('lang.large_modal')}}</button>
	</span>
<div class="modal fade" id="notification_accepted_dining_by_restaurant" tabindex="-1" role="dialog" aria-labelledby="notification_accepted_dining_by_restaurant" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered notification-main" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('lang.your_dining_request_has_accepted')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <h6><span id="restaurnat_name_dining"></span> {{trans('lang.has_accept_your_dining_request')}}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="{{url('my_dinein')}}" id="notification_accepted_dining_by_restaurant_a">{{trans('lang.go')}}</a></button>
      </div>
    </div>
  </div>
</div>


<span style="display: none;">
	<button type="button" class="btn btn-primary" id="notification_rejected_dining_by_restaurant_id" data-toggle="modal" data-target="#notification_rejected_dining_by_restaurant">{{trans('lang.large_modal')}}</button>
	</span>
<div class="modal fade" id="notification_rejected_dining_by_restaurant" tabindex="-1" role="dialog" aria-labelledby="notification_rejected_dining_by_restaurant" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered notification-main" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('lang.your_dining_request_has_rejected')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
            <h6><span id="restaurnat_name_dining_rejected"></span> {{trans('lang.has_reject_your_dining_request')}}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"><a href="{{url('my_dinein')}}" id="notification_rejected_dining_by_restaurant_a">{{trans('lang.go')}}</a></button>
      </div>
    </div>
  </div>
</div>

<footer class="section-footer border-top bg-dark">
	<div class="container">
		<section class="footer-top padding-y py-5">
			<div class="row">
				<aside class="col-md-6 footer-about">
					<article class="pb-3">
						<!-- <h6 class="title text-white">About Us</h6> -->
						<div><img alt="#" src="{{asset('img/logo_web.png')}}" class="logo-footer mr-3 pt-0 pb-2" id="footer_logo_web"></div>
						<div>
							<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<div class="d-flex align-items-center">
								<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="#"><i class="feather-facebook"></i></a>
								<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="#"><i class="feather-instagram"></i></a>
								<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank" href="#"><i class="feather-youtube"></i></a>
								<a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="#"><i class="feather-twitter"></i></a>
							</div>
						</div>
					</article>
				</aside>
				<!-- <aside class="col-sm-3 col-md-2 text-white">
					<h6 class="title">Error Pages</h6>
					<ul class="list-unstyled hov_footer">
						<li> <a href="{{url('/not_found')}}" class="text-muted">Not found</a></li>
						<li> <a href="{{url('/maintence')}}" class="text-muted">Maintence</a></li>
						<li> <a href="{{url('/coming_soon')}}" class="text-muted">Coming Soon</a></li>
					</ul>
				</aside> -->
				<aside class="col-sm-4 col-md-3 text-white">
					<h6 class="title">{{trans('lang.services')}}</h6>
					<ul class="list-unstyled hov_footer">
						<li> <a href="{{ route('faq') }}" class="text-muted">{{trans('lang.delivery_support')}}</a></li>
						<li> <a href="{{url('contact_us')}}" class="text-muted">{{trans('lang.contact_us')}}</a></li>
						<li> <a href="{{ route('terms') }}" class="text-muted">{{trans('lang.terms_use')}}</a></li>
						<li> <a href="{{ route('privacy') }}" class="text-muted">{{trans('lang.privacy_policy')}}</a></li>
					</ul>
				</aside>
				<aside class="col-sm-4  col-md-3 text-white">
					<h6 class="title">{{trans('lang.for_users')}}</h6>
					<ul class="list-unstyled hov_footer">
						<li> <a href="{{url('login')}}" class="text-muted"> {{trans('lang.user_login')}} </a></li>
						<li> <a href="{{url('signup')}}" class="text-muted"> {{trans('lang.user_register')}} </a></li>
						<!-- <li> <a href="{{url('profile')}}" class="text-muted"> Forgot Password </a></li> -->
						<li> <a href="{{url('profile')}}" class="text-muted"> {{trans('lang.account_setting')}} </a></li>
					</ul>
				</aside>
				<!-- <aside class="col-sm-4  col-md-2 text-white">
					<h6 class="title">Quik Links</h6>
					<ul class="list-unstyled hov_footer">
						<li> <a href="#" class="text-muted"> Trending </a></li>
						<li> <a href="#" class="text-muted"> Most popular </a></li>
						<li> <a href="#" class="text-muted"> Restaurant Details </a></li>
						<li> <a href="#" class="text-muted"> Favorites </a></li>
					</ul>
				</aside> -->
			</div>
		</section>
	</div>
	<section class="footer-copyright border-top py-3 bg-light">
		<div class="container d-flex align-items-center">
			<!-- <p class="mb-0"> © 2022 Company All rights reserved </p> -->
			<p class="mb-0"> © 2022-<?php echo date("Y"); ?> {{ config('app.name')}} All rights reserved </p>
			<p class="text-muted mb-0 ml-auto d-flex align-items-center">
				<a href="#" class="d-block"><img alt="#" src="{{asset('img/appstore.png')}}" height="40"></a>
				<a href="#" class="d-block ml-3"><img alt="#" src="{{asset('img/playmarket.png')}}" height="40"></a>
			</p>
		</div>
	</section>
	<div class="open-ticket-btn">
		<a href="https://support.siddhiinfosoft.com/" target="_blank"><i class="fa fa-ticket"></i> {{trans('lang.open_ticket')}}</a>
	</div>
</footer>

<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script type="text/javascript" src="{{asset('vendor/sidebar/hc-offcanvas-nav.js')}}"></script>

<script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/siddhi.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-firestore.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>

<?php $map_key=env('GOOGLE_MAP_PLACE_API'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $map_key; ?>&libraries=places"></script>

<script type="text/javascript">@include('vendor.init_firebase')</script>

<script type="text/javascript">

<?php $id=null; if(Auth::user()){ $id=Auth::user()->getvendorId();} ?>
var cuser_id='<?php echo $id; ?>';
 var database = firebase.firestore();

var dine_in_enable=false;
		var place=[];
		var address_name=getCookie('address_name');
		var address_name1=getCookie('address_name1');
		var address_name2=getCookie('address_name2');
		var address_zip=getCookie('address_zip');

		var address_lat=getCookie('address_lat');
		var address_lng=getCookie('address_lng');
		var address_city=getCookie('address_city');
		var address_state=getCookie('address_state');
		var address_country=getCookie('address_country');


		google.maps.event.addDomListener(window, 'load', initialize);
			
		  if (address_name == "" || address_name == null) {
        <?php if(Request::path()!=='terms' && Request::path()!=='privacy' && Request::path()!=='contact_us' && Request::path()!=='faq'){ ?>
        $('#locationModal').trigger('click');
        $('.locationModalTitle').html('{{trans('lang.find_restaurant_foods_near_you')}}');
        <?php } ?>
    }



    if (cuser_id != "") {

        var userDetailsRef = database.collection('users').where('id', "==", cuser_id);
    }

    function initialize() {
    	if(address_name!=''){
      	document.getElementById('user_locationnew').value=address_name;
      }	
 	    var input = document.getElementById('user_locationnew');
    	
      autocomplete=new google.maps.places.Autocomplete(input);

      google.maps.event.addListener(autocomplete, 'place_changed', function () {
      	  var place = autocomplete.getPlace();
          address_name=place.name;
					address_lat=place.geometry.location.lat();
					address_lng=place.geometry.location.lng();
					
					$.each(place.address_components, function (i, address_component) {
			          address_name1='';
							  if(address_component.types[0] == "premise"){
	             		if(address_name1==''){
										address_name1=address_component.long_name;
	             		}else{
	             			address_name2=address_component.long_name;
	             		}
								}else if (address_component.types[0] == "postal_code"){
										 address_zip=address_component.long_name;
								}else if (address_component.types[0] == "locality"){
	                 	address_city=address_component.long_name;
	              }else if(address_component.types[0] == "administrative_area_level_1"){
							 			var address_state=address_component.long_name;
							  }else if(address_component.types[0] == "country"){
							 			var address_country=address_component.long_name;
							  }
			    });

					setCookie('address_name1',address_name1,365);
					setCookie('address_name2',address_name2,365);
					setCookie('address_name',address_name,365);
					setCookie('address_lat',address_lat,365);
					setCookie('address_lng',address_lng,365);
					setCookie('address_zip',address_zip,365);
					setCookie('address_city',address_city,365);
					setCookie('address_state',address_state,365);
					setCookie('address_country',address_country,365);
					<?php if(Request::is('/')){ ?>
						callRestaurant();
					<?php } ?>					
      });

      	//getCurrentLocation();
    }


    <?php if(@Route::current()->getName()=='checkout'){ ?>
			google.maps.event.addDomListener(window, 'load', initializeCheckout);


			
    function initializeCheckout() {

        if (address_name != '') {
            document.getElementById('address_line1').value = address_name;
        }
        var input = document.getElementById('address_line1');
        autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {

            var place = autocomplete.getPlace();
            address_name = place.name;
            address_lat = place.geometry.location.lat();
            address_lng = place.geometry.location.lng();
            $.each(place.address_components, function (i, address_component) {
                address_name1 = '';

                if (address_component.types[0] == "premise") {
                    if (address_name1 == '') {
                        address_name1 = address_component.long_name;
                    } else {
                        address_name2 = address_component.long_name;
                    }
                } else if (address_component.types[0] == "postal_code") {
                    address_zip = address_component.long_name;
                } else if (address_component.types[0] == "locality") {
                    address_city = address_component.long_name;
                } else if (address_component.types[0] == "administrative_area_level_1") {
                    var address_state = address_component.long_name;
                } else if (address_component.types[0] == "country") {
                    var address_country = address_component.long_name;
                }
            });

            $("#address_line2").val(address_name2);
            $("#address_lat").val(address_lat);
            $("#address_lng").val(address_lng);
            $("#address_line2").val(address_name2);
            $("#address_city").val(address_city);
            $("#address_country").val(address_country);
            $("#address_zipcode").val(address_zip);
        });

    }
		<?php } ?>

    async function getCurrentLocation(type='') {

    var geocoder= new google.maps.Geocoder();	
    // Try HTML5 geolocation

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(async function(position) {

            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

    	  var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	      var circle = new google.maps.Circle({
	        center: geolocation,
	        radius: position.coords.accuracy
	      });
	      

            var location  = new google.maps.LatLng(pos['lat'], pos['lng']);    // turn coordinates into an object

            geocoder.geocode({'latLng': location}, async function (results, status) {

            		
                if(status == google.maps.GeocoderStatus.OK) {
                		
                		if(results.length>0){
                			document.getElementById('user_locationnew').value=results[0].formatted_address;
                			address_name1='';
                			$.each(results[0].address_components, async function (i, address_component) {
									             
								             	  address_name1='';
															  if(address_component.types[0] == "premise"){
									             		if(address_name1==''){
																		address_name1=address_component.long_name;
									             		}else{
									             			address_name2=address_component.long_name;
									             		}
																}else if (address_component.types[0] == "postal_code"){
																		 address_zip=address_component.long_name;
																}else if (address_component.types[0] == "locality"){
									                 	address_city=address_component.long_name;
									             }else if(address_component.types[0] == "administrative_area_level_1"){
															 			var address_state=address_component.long_name;
															 }else if(address_component.types[0] == "country"){
															 			var address_country=address_component.long_name;
															 }
									    });

	                						address_name=results[0].formatted_address;
											address_lat=results[0].geometry.location.lat();
											address_lng=results[0].geometry.location.lng();
											
											setCookie('address_name1',address_name1,365);
											setCookie('address_name2',address_name2,365);
											setCookie('address_name',address_name,365);
											setCookie('address_lat',address_lat,365);
											setCookie('address_lng',address_lng,365);
											setCookie('address_zip',address_zip,365);
											setCookie('address_city',address_city,365);
											setCookie('address_state',address_state,365);
											setCookie('address_country',address_country,365);

											if(type=='reload'){
												window.location.reload(true);
											}
										}
										
                 }

            });
            try {
            if(autocomplete){
		      	autocomplete.setBounds(circle.getBounds());
		      }
		    }catch(err) {

		    } 

        }, function() {

        });

    } else {
        // Browser doesn't support Geolocation
    }
}
    

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

 async function getCurrentLocationAddress1() {

        var geocoder = new google.maps.Geocoder();
        navigator.geolocation.getCurrentPosition(async function (position) {
            var address_city = "";
            var address_country = "";
            var address_state = "";
            var address_street = "";
            var address_street2 = "";
            var address_street3 = "";
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });


            var location = new google.maps.LatLng(pos['lat'], pos['lng']);     // turn coordinates into an object

            geocoder.geocode({'latLng': location}, async function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    if (results.length > 0) {
                        document.getElementById('user_locationnew').value = results[0].formatted_address;
                        address_name1 = '';
                        $.each(results[0].address_components, async function (i, address_component) {

                            address_name1 = '';
                            if (address_component.types[0] == "premise") {
                                if (address_name1 == '') {
                                    address_name1 = address_component.long_name;
                                } else {
                                    address_name2 = address_component.long_name;
                                }
                            } else if (address_component.types[0] == "postal_code") {
                                address_zip = address_component.long_name;
                            } else if (address_component.types[0] == "locality") {
                                address_city = address_component.long_name;
                            } else if (address_component.types[0] == "administrative_area_level_1") {
                                address_state = address_component.long_name;
                            } else if (address_component.types[0] == "country") {
                                address_country = address_component.long_name;
                            } else if (address_component.types[0] == "street_number") {
                                address_street = address_component.long_name;
                            } else if (address_component.types[0] == "route") {
                                address_street2 = address_component.long_name;
                            } else if (address_component.types[0] == "political") {
                                address_street3 = address_component.long_name;
                            }
                        });

                        address_lat = results[0].geometry.location.lat();
                        address_lng = results[0].geometry.location.lng();

                        $("#address_lat").val(address_lat);
                        $("#address_lng").val(address_lng);

                        if (results[0].formatted_address) {
                            $("#address_line1").val(results[0].formatted_address);
                        } else {
                            $("#address_line1").val(address_street + ", " + address_street2);
                        }
                        $("#address_line2").val(address_street3);
                        $("#address_city").val(address_city);
                        $("#address_country").val(address_country);
                        $("#address_zipcode").val(address_zip);
                    }

                }

            });
            try {

            } catch (err) {

            }

        }, function () {

        });

    }


      function saveShippingAddress() {


        var line1 = $("#address_line1").val();
        var line2 = $("#address_line2").val();
        var city = $("#address_city").val();
        var country = $("#address_country").val();
        var postalCode = $("#address_zipcode").val();
        var full_address = '';

        if (cuser_id != "") {

            userDetailsRef.get().then(async function (userSnapshots) {

                var userDetails = userSnapshots.docs[0].data();

                if (userDetails.hasOwnProperty('shippingAddress')) {
                    var shippingAddress = userDetails.shippingAddress;

                    shippingAddress.line1 = $("#address_line1").val();
                    shippingAddress.line2 = $("#address_line2").val();
                    shippingAddress.city = $("#address_city").val();
                    shippingAddress.country = $("#address_country").val();
                    shippingAddress.postalCode = $("#address_zipcode").val();
                } else {
                    var shippingAddress = [];
                    var shippingAddress = {
                        "line1": line1,
                        "line2": line2,
                        "city": city,
                        "country": country,
                        "postalCode": postalCode
                    };
                }


                setCookie('address_name1', line1, 365);
                setCookie('address_name2', line2, 365);
                setCookie('address_lat', jQuery("#address_lat").val(), 365);
                setCookie('address_lng', jQuery("#address_lng").val(), 365);
                setCookie('address_zip', postalCode, 365);
                setCookie('address_city', city, 365);
                setCookie('address_country', country, 365);
                if (line1 != "") {
                    full_address = line1;
                }
                if (line2 != "") {
                    full_address = full_address + ',' + line2;
                }
                if (postalCode != "") {
                    full_address = full_address + ',' + postalCode;
                }
                if (city != "") {
                    full_address = full_address + ',' + city;
                }
                if (country != "") {
                    full_address = full_address + ',' + country;
                }
                
                setCookie('address_name', full_address, 365);
                database.collection('users').doc(cuser_id).update({'shippingAddress': shippingAddress}).then(function (result) {

                    $('#close_button').trigger("click");
                    location.reload();
                });

            });

        } else {
            setCookie('address_name1', line1, 365);
            setCookie('address_name2', line2, 365);
            setCookie('address_lat', jQuery("#address_lat").val(), 365);
            setCookie('address_lng', jQuery("#address_lng").val(), 365);
            setCookie('address_zip', postalCode, 365);
            setCookie('address_city', city, 365);
            setCookie('address_country', country, 365);

            if (line1 != "") {
                full_address = line1;
            }
            if (line2 != "") {
                full_address = full_address + ',' + line2;
            }
            if (postalCode != "") {
                full_address = full_address + ',' + postalCode;
            }
            if (city != "") {
                full_address = full_address + ',' + city;
            }
            if (country != "") {
                full_address = full_address + ',' + country;
            }
            setCookie('address_name', full_address, 365);
            $('#close_button').trigger("click");
            location.reload();
        }
    }
</script>

<script type="text/javascript">

<?php 



	use App\Models\user;

	use App\Models\VendorUsers;



	$user_email = '';

	$user_uuid = '';

	$auth_id = Auth::id();

	if($auth_id){

		$user = user::select('email')->where('id',$auth_id)->first();	

		$user_email = $user->email;

		$user_uuid = VendorUsers::select('uuid')->where('email',$user_email)->first();	

		$user_uuid = $user_uuid->uuid;



	}

	 ?>

	 	var database = firebase.firestore();


	 	var refDineInRestaurant = database.collection('settings').doc("DineinForRestaurant");

      refDineInRestaurant.get().then( async function(snapshotsDinein){
                var enableddineinRestaurant = snapshotsDinein.data();
                dine_in_enable = enableddineinRestaurant.isEnabled;
                if(dine_in_enable==true){
                	  $(".dine_in_menu").show();
                	  $(".dine_in_menu").attr('style', 'display: block !important');
                }

    })
      
	 	var placeholderImageHeader = '';

	 	var googleMapKeySettingHeader = database.collection('settings').doc("googleMapKey");

	 	googleMapKeySettingHeader.get().then( async function(googleMapKeySnapshotsHeader){

    		var placeholderImageHeaderData = googleMapKeySnapshotsHeader.data();

    		placeholderImageHeader = placeholderImageHeaderData.placeHolderImage;

  		})

  		var placeholderImage = '';
	    var placeholder = database.collection('settings').doc('placeHolderImage');
	 
	    placeholder.get().then( async function(snapshotsimage){
	        var placeholderImageData = snapshotsimage.data();
	        placeholderImage = placeholderImageData.image;
	    })

    
	var user_email = "<?php echo $user_email;  ?>";

	var user_ref = '';

	 if(user_email != ''){

	 	var user_uuid ="<?php echo $user_uuid; ?>";

	 	//user_ref = database.collection('users').where("email","==",user_email);
     user_ref = database.collection('users').where("id", "==", user_uuid);

	 }

   	var ref = database.collection('settings').doc("globalSettings");
     ref.get().then( async function(snapshots){
        var globalSettings = snapshots.data();            
        $("#logo_web").attr('src',globalSettings.appLogo);
        $("#footer_logo_web").attr('src',globalSettings.appLogo);
        setCookie('section_color',globalSettings.website_color,365);
        if(section_colorman=='' && globalSettings.website_color!=''){
        	location.reload();
        }
    });


	$(document).ready(function(){

	  jQuery("#data-table_processing").show();

	  if(user_ref != ''){

	  user_ref.get().then( async function(profileSnapshots){

		var profile_user = profileSnapshots.docs[0].data();

		var profile_name = profile_user.firstName+" "+profile_user.lastName;

	  	if(profile_user.profilePictureURL != ''){

	   	    $("#dropdownMenuButton").append('<img alt="#" src="'+profile_user.profilePictureURL+'" class="img-fluid rounded-circle header-user mr-2 header-user">Hi '+profile_user.firstName);

	    }else{

	    	 $("#dropdownMenuButton").append('<img alt="#" src="'+placeholderImage+'" class="img-fluid rounded-circle header-user mr-2 header-user">Hi '+profile_user.firstName);

	    }
	    if(profile_user.shippingAddress){
	    	$("#user_location").html(profile_user.shippingAddress.city);
	    }

		})

	}

  })





	$(".user-logout-btn").click( async function() {

		firebase.auth().signOut().then(function(){

			var logoutURL = "{{route('logout')}}";

			

			$.ajax({

          		type:'POST',

          		url:logoutURL,

          		data:{},

          		headers: {

        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    					},

          		success:function(data1){

          			if(data1.logoutuser){

                          window.location = "{{ route('login')}}";		

                    }

          		}

          	})

				

		});

    });


<?php if(@$_GET['update_location']==1){ ?>

var vendorsRef= database.collection('vendors');

vendorsRef.get().then( async function(vendorsSnapshots){

			vendorsSnapshots.forEach((doc) => {

				vendorRate = doc.data();

				if(vendorRate.g!=undefined){

				//if((-180 < vendorRate.latitude && vendorRate.latitude < 180) && (-180 < vendorRate.longitude && vendorRate.longitude < 180) && vendorRate.latitude && vendorRate.longitude && typeof vendorRate.latitude == 'number' && typeof vendorRate.longitude == 'number'){

				if(vendorRate.g.geopoint._longitude && vendorRate.g.geopoint._latitude){

					coordinates=new firebase.firestore.GeoPoint(vendorRate.g.geopoint._latitude,vendorRate.g.geopoint._longitude);

					try{
		            geoFirestore.collection('vendors').doc(vendorRate.id).update({'coordinates':coordinates}).then(() => {

		                console.log('Provided document has been updated in Firestore');

		              }, (error) => {

		                console.log('Error: ' + error);

		              });
		            }catch(err) {

		            }

				}

				}

			});

		});

<?php } ?>
</script>

 

<script type="text/javascript" src="{{asset('js/rocket-loader.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://static.cloudflareinsights.com/beacon.min.js')}}"></script>
<?php if(Auth::user()){ ?>
<script type="text/javascript">
        var route1 =  '<?php echo route('my_order'); ?>'; 
        var database = firebase.firestore();
        var pageloadded=0;
        database.collection('restaurant_orders').where('author.id',"==",cuser_id).onSnapshot(function(doc) {   
            if(pageloadded){
                doc.docChanges().forEach(function(change) {
                        val=change.doc.data();
                        		if(change.type=="modified"){
                                if(val.status=="Order Completed"){
                                    $("#notification_order_complete_id").trigger( "click" );
                                }else if(val.status=="Order Accepted"){
                                    if(val.vendor.title){
                                        $("#restaurnat_name").text(val.vendor.title);
                                    }
                                    if(route1){
                                        $("#notification_accepted_order_by_restaurant_a").attr("href",route1);
                                    }
                                    $("#notification_accepted_order_by_restaurant_id").trigger( "click" );
                                }else if(val.status=="Driver Pending" || val.status=="Driver Accepted"){
                                    if(val.driver && val.driver.firstName){
                                        $("#np_accept_name").text(val.driver.firstName);
                                    }
                                    if(route1){
                                        $("#notification_accepted_a").attr("href",route1.replace(':id', val.id));
                                    }
                                    $("#notification_accepted_order").modal('show');
                                    $("#notification_accepted_order_id").trigger( "click" );
                                }else if(val.status=="Order Rejected"){
                                    if(val.vendor.title){
                                        $("#restaurnat_name_1").text(val.vendor.title);
                                    }
                                    if(route1){
                                        $("#notification_rejected_order_by_restaurant_a").attr("href",route1);
                                    }
                                    $("#notification_rejected_order_by_restaurant_id").trigger( "click" );
                                }
                            }
                        
                });
                }else{
                    pageloadded=1;
                }
        });        
        
        var route2 =  '<?php echo route('my_dinein'); ?>'; 
        var pageloadded_dining=0;
        database.collection('booked_table').where('author.id',"==",cuser_id).onSnapshot(function(doc) {   
            if(pageloadded_dining){
                doc.docChanges().forEach(function(change) {
                        val=change.doc.data();
                        		if(change.type=="modified"){
                                
                                if(val.status=="Order Accepted"){
                                    if(val.vendor.title){
                                        $("#restaurnat_name_dining").text(val.vendor.title);
                                    }
                                    if(route1){
                                        $("#notification_accepted_dining_by_restaurant_a").attr("href",route2);
                                    }
                                    $("#notification_accepted_dining_by_restaurant_id").trigger( "click" );
                                }else if(val.status=="Order Rejected"){
                                    if(val.vendor.title){
                                        $("#restaurnat_name_dining_rejected").text(val.vendor.title);
                                    }
                                    if(route1){
                                        $("#notification_rejected_dining_by_restaurant_a").attr("href",route2);
                                    }
                                    $("#notification_rejected_dining_by_restaurant_id").trigger( "click" );
                                }
                            }
                        
                });
                }else{
                    pageloadded_dining=1;
                }
        });   	

        	

    </script>

<?php } ?>
<script type="text/javascript">
    var langcount=0;
    var languages_list_main=[];
    var languages_list = database.collection('settings').doc('languages');
    languages_list.get().then( async function(snapshotslang){  
        snapshotslang=snapshotslang.data();
        if(snapshotslang!=undefined){
              snapshotslang=snapshotslang.list;
              languages_list_main=snapshotslang;
              snapshotslang.forEach((data) => {
                    if(data.isActive==true){
                        langcount++;
                        $('#language_dropdown').append($("<option></option>").attr("value", data.slug).text(data.title));
                    }
              });
              if(langcount>1){
                $("#language_dropdown_box").css('visibility', 'visible');
              }
              <?php if(session()->get('locale')){ ?>
                        $("#language_dropdown").val("<?php echo session()->get('locale'); ?>");
               <?php } ?>
              
        }
     });

    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        var slug=$(this).val();
        languages_list_main.forEach((data) => {
            if(slug==data.slug){
                if(data.is_rtl==undefined){
                    setCookie('is_rtl','false', 365);
                }else{
                    setCookie('is_rtl',data.is_rtl.toString(), 365);
                }
                window.location.href = url + "?lang="+slug;
            }
        });
    });
  
</script>