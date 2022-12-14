@include('layouts.app')



@include('layouts.header')



<div class="siddhi-popular">


   

	<div class="container">




		<div id="data-table_processing" class="dataTables_processing panel panel-default" style="display: none;">
            {{trans('lang.Processing')}}</div>
		
        <div class="transactions-banner p-4 rounded">
            <div class="row align-items-center text-center">
                <h3 class="font-weight-bold h4 text-light">{{trans('lang.coupons_list')}}</h3>
            </div>
        </div>

		<div class="text-center py-5 not_found_div" style="display:none" >
			<p class="h4 mb-4"><i class="feather-search bg-primary rounded p-2"></i></p>
			<p class="font-weight-bold text-dark h5">{{trans('lang.nothing_found')}}</p>
			<p>{{trans('lang.please_try_again')}}</p>
		</div>

		<div style="display:none" class="coupon_code_copied_div mt-4 error_top text-center"><p>{{trans('lang.coupon_code_copied')}}</p></div>

        <!-- <div class="transactions-list-wrap mt-4">
            <div class="bg-white px-4 py-3 border rounded-lg mb-3 transactions-list-view shadow-sm">
                <div class="gold-members d-flex align-items-center transactions-list">
                
                <div class="media transactions-list-left">
                    <div class="mr-3 font-weight-bold card-icon"><span><i class="fa fa-credit-card"></i></span></div>
                    <div class="media-body">
                        <h6 class="date">Mar 24, 2022</h6><p class="text-muted mb-0">Wallet Topup</p>
                    </div>
                </div>

                <div class="float-right ml-auto">
                    <span class="price font-weight-bold h4">$ 20.00</span>
                    <span class="go-arror text-dark btn-block text-right mt-2"> <i class="fa fa-angle-right"></i></span>
                </div>

             </div>
           </div>

        </div>  -->  


		<div id="append_list1" class="res-search-list"></div>
        <div class="row fu-loadmore-btn">
            <a class="page-link loadmore-btn" href="javascript:void(0);" id="loadmore" onclick="moreload()"  data-dt-idx="0" tabindex="0">{{trans('lang.load_more')}}</a>
        </div>
		<!-- <div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="container mt-4 mb-4 p-0">

     				<div class="data-table_paginate">
            			<nav aria-label="Page navigation example">
                    		<ul class="pagination justify-content-center">
                        		<li class="page-item ">
                            		<a class="page-link" href="javascript:void(0);" id="users_table_previous_btn" onclick="prev()"  data-dt-idx="0" tabindex="0">Previous</a>
                        		</li>
                        		<li class="page-item">
                            		<a class="page-link" href="javascript:void(0);" id="users_table_next_btn" onclick="next()"  data-dt-idx="2" tabindex="0">Next</a>
                        		</li>
                    		</ul>
            			</nav>
       				</div>
				</div>
			</div>
		</div>
	 -->
	</div>
</div>


@include('layouts.footer')



@include('layouts.nav')



<script type="text/javascript">

var newdate = new Date();
var todaydate = new Date(newdate.setHours(23,59,59,999));
console.log('todaydate'+todaydate);
 
var ref= database.collection('coupons').where('isEnabled', '==' ,true).
orderBy("expiresAt").startAt(new Date());

var pagesize = 10;
var offest=1; 
var end = null;
var endarray=[];
var start = null;
var append_list = '';
var totalPayment = 0;

var currentCurrency ='';
var currencyAtRight = false;
var placeholderImage = '';
var refCurrency = database.collection('currencies').where('isActive', '==' , true);
refCurrency.get().then( async function(snapshots){
    var currencyData = snapshots.docs[0].data();
    currentCurrency = currencyData.symbol;
    currencyAtRight = currencyData.symbolAtRight;
});

var placeholder = database.collection('settings').doc('placeHolderImage');
        placeholder.get().then( async function(snapshotsimage){
          var placeholderImageData = snapshotsimage.data();
          placeholderImage = placeholderImageData.image;
        })


$(document).ready(function() {


	jQuery("#loadmore").hide();
  	$("#data-table_processing").show();
	append_list = document.getElementById('append_list1');
    append_list.innerHTML='';

    ref.limit(pagesize).get().then( async function(snapshots){  
        if(snapshots!=undefined){
      		var html='';
      		html=buildHTML(snapshots);
      		jQuery("#data-table_processing").hide();
            console.log('length '+snapshots.docs.length);
      		if(html!=''){
          		append_list.innerHTML=html;
          		     start = snapshots.docs[snapshots.docs.length - 1];
                endarray.push(snapshots.docs[0]);
          		$("#data-table_processing").hide();
                if(snapshots.docs.length < pagesize){ 

                    jQuery("#loadmore").hide();
                }else{
                    jQuery("#loadmore").show();
                }
       		}
        }

  	}); 

})



	function buildHTML(snapshots){
        var html='';
        var alldata=[];
        var number= [];
        var vendorIDS = [];
        snapshots.docs.forEach((listval) => {
            var datas=listval.data();
			alldata.push(datas);
        });

        alldata.forEach((listval) => {

            var val=listval;
            var date='';
            var time='';
            if (val.hasOwnProperty('expiresAt') && val.expiresAt) {
                
                 try {
                  date =  val.expiresAt.toDate().toDateString();
                  time = val.expiresAt.toDate().toLocaleTimeString('en-US');
                }
                catch(err) {
                 date='';
                 time='';
                }
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

            html=html+ '<div class="transactions-list-wrap mt-4"><div class="bg-white px-4 py-3 border rounded-lg mb-3 transactions-list-view shadow-sm"><div class="gold-members d-flex align-items-center transactions-list">';


                if(val.hasOwnProperty('image') && val.image != ''){
                	html=html+'<img class="mr-3 rounded-circle img-fluid" style="width:65px;height:65px;"  src="'+val.image+'">';
                }else{
					// html=html+'<div class="media transactions-list-left"><div class="mr-3 font-weight-bold card-icon"><span><img class="" style="width:50px" src="'+placeholderImage+'"></span></div>';
					html=html+'<img class="mr-3 rounded-circle img-fluid" style="width:65px;height:65px;" src="'+placeholderImage+'">';
                }


                html = html + '<div class="media-body"><h6 class="date">Expires At: '+date+' '+time+'</h6><span class="offercoupan"><p class="mb-0 badge">'+val.code+'</p><a href="javascript:void(0)" onclick="copyToClipboard(`'+val.code+'`)"><i class="fa fa-copy"></i></a></span><p class="text-dark offer-des mt-2">'+val.description+'</p>';




               	if(val.hasOwnProperty('resturant_id') && val.resturant_id != ''){
               		var restaurantName = offerRestaurant(val.resturant_id);
	              	var view_vendor_route = "{{ route('restaurant',':id')}}";
	              	view_vendor_route = view_vendor_route.replace(':id', 'id='+val.resturant_id);
	              	html = html +"<p class='text-dark mb-0 offer-address'></span><a class='restaurant_"+val.resturant_id+"' href='"+view_vendor_route+"'></a></p>";
	            }else{
	            html = html +"<p class='text-light mb-0 app-off-btn'><a sttyle='pointer-events: none;cursor: default;'>App Offer</a></p>";
	            }



                html=html+'</div></div>';

                html=html+'<div class="float-right ml-auto"><span class="price font-weight-bold h4">'+price_val+'</span>';

              

                html=html+'</div> </div></div></div>  ';

                /*html=html+ '<div class="col-md-12 pb-3"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">';
                html=html+'<div class="payment_amount" >'+currentCurrency+''+val.amount+'</div>';


                html=html+ '<div class="p-3 position-relative">';

                html=html+ '<div class="list-card-body payment_status" >'+val.payment_status+'</div>';
                var date =  val.date.toDate().toDateString();
                var time = val.date.toDate().toLocaleTimeString('en-US');

                html=html+ '<div class="list-card-body payment_time" >'+date+' '+time+'</div>';

                html=html+ '<div class="list-card-body payment_method" >'+val.payment_method+'</div>';
                

                html=html+'</div></div></div>';*/

		



          });

          return html;      

}

async function moreload(){
  if(start!=undefined || start!=null){
        jQuery("#data-table_processing").hide();

        	listener = ref.startAfter(start).limit(pagesize).get();
          listener.then( async(snapshots) => {
            
                html='';
                html=await buildHTML(snapshots);
                console.log(snapshots);
                jQuery("#data-table_processing").hide();
                if(html!=''){
                    append_list.innerHTML +=html;
                    start = snapshots.docs[snapshots.docs.length - 1];

                    if(endarray.indexOf(snapshots.docs[0])!=-1){
                        endarray.splice(endarray.indexOf(snapshots.docs[0]),1);
                    }
                    endarray.push(snapshots.docs[0]);

                    if(snapshots.docs.length < pagesize){ 
   
                        jQuery("#loadmore").hide();
                    }else{
                        jQuery("#loadmore").show();
                    }
                }
            });
    }
}

async function prev(){
    if(endarray.length==1){
        return false;
    }
    end=endarray[endarray.length-2];
  
  if(end!=undefined || end!=null){
            jQuery("#data-table_processing").show();
               listener = ref.startAt(end).limit(pagesize).get();
                
                listener.then(async(snapshots) => {
                html='';
                html=await buildHTML(snapshots);
                jQuery("#data-table_processing").hide();
                if(html!=''){
                    append_list.innerHTML=html;
                    start = snapshots.docs[snapshots.docs.length - 1];
                    endarray.splice(endarray.indexOf(endarray[endarray.length-1]),1);

                    if(snapshots.docs.length < pagesize){ 
   
                        jQuery("#users_table_previous_btn").hide();
                    }
                    
                }
            });
  }
} 

async function offerRestaurant(restaurant) {
  var offerRestaurant='';
  await database.collection('vendors').where("id","==",restaurant).get().then( async function(snapshotss){
  
            if(snapshotss.docs[0]){
                var restaurant_data = snapshotss.docs[0].data();
                offerRestaurant = restaurant_data.title;
                // var rating = 0;
                // if(restaurant_data.reviewsSum != 0 && restaurant_data.reviewsCount != 0){
                //   rating = (restaurant_data.reviewsSum/restaurant_data.reviewsCount);
                //   rating = Math.round(rating * 10) / 10;
                // }
                // jQuery(".restaurant_"+restaurant).append(offerRestaurant);
                // jQuery(".restaurant_location_"+restaurant).append(restaurant_data.location);
                // jQuery("#offer_restaurant_rating_"+restaurant).html("<i class='feather-star star_active'></i>"+rating + "("+ restaurant_data.reviewsCount+"+)");

                	if(offerRestaurant != ''){
                		
                		$('.restaurant_'+restaurant).html("<span class='fa fa-map-marker'>&nbsp;");
                		$('.restaurant_'+restaurant).append(offerRestaurant);
                	}
                
            } 
});
return offerRestaurant;
}

  function copyToClipboard(text) {
           // const elem = document.createElement('textarea');
           // elem.value = text;
           // document.body.appendChild(elem);
           // elem.select();
           // document.execCommand('copy');
           // document.body.removeChild(elem);
           navigator.clipboard.writeText("");
           navigator.clipboard.writeText(text);
           $(".coupon_code_copied_div").show();
           window.scrollTo(0, 0);

           setTimeout(
    		function() {
    			$(".coupon_code_copied_div").hide();
    		}, 4000);

    }



</script>









