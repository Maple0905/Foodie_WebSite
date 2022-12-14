@include('layouts.app')



@include('layouts.header')



<div class="d-none">

<div class="bg-primary p-3 d-flex align-items-center">

<a class="toggle togglew toggle-2" href="#"><span></span></a>

<h4 class="font-weight-bold m-0 text-white">{{trans('lang.category')}}</h4>

</div>

</div>

<div class="siddhi-trending">



<div class="container">

<div class="most_popular py-5">

<div class="d-flex align-items-center mb-4">

<h3 class="font-weight-bold text-dark mb-0" id="category_name"></h3>

<!-- <a href="#" data-toggle="modal" data-target="#filters" class="ml-auto btn btn-primary">Filters</a> -->

</div>

<div id="trendingList"></div>



<?php /* ?>

<div class="row">

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending1.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">The siddhi Restaurant

</a>

</h6>

<p class="text-gray mb-3">North • Hamburgers • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small>

</div>

</div>

</div>

</div>

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending2.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">Thai Famous Cuisine</a></h6>

<p class="text-gray mb-3">North Indian • Indian • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-success">OFFER</span> <small>65% off</small>

</div>

</div>

</div>

</div>

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending3.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">The siddhi Restaurant

</a>

</h6>

<p class="text-gray mb-3">North • Hamburgers • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small>

</div>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending4.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">Bite Me Sandwiches</a></h6>

<p class="text-gray mb-3">North Indian • American • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-success">OFFER</span> <small>65% off</small>

</div>

</div>

</div>

</div>

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending5.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">The siddhi Restaurant

</a>

</h6>

<p class="text-gray mb-3">North • Hamburgers • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small>

</div>

</div>

</div>

</div>

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending6.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">Bite Me Sandwiches</a></h6>

<p class="text-gray mb-3">North Indian • American • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-success">OFFER</span> <small>65% off</small>

</div>

</div>

</div>

</div>

</div>

<div class="row">

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending7.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">The siddhi Restaurant

</a>

</h6>

<p class="text-gray mb-3">North • Hamburgers • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small>

</div>

</div>

</div>

</div>

<div class="col-lg-4 mb-3">

<div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">

<div class="list-card-image">

<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>

<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>

 <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>

<a href="restaurant.html">

<img alt="#" src="{{asset('img/trending8.png')}}" class="img-fluid item-img w-100">

</a>

</div>

<div class="p-3 position-relative">

<div class="list-card-body">

<h6 class="mb-1"><a href="restaurant.html" class="text-black">Bite Me Sandwiches</a></h6>

<p class="text-gray mb-3">North Indian • American • Pure veg</p>

<p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>

</div>

<div class="list-card-badge">

<span class="badge badge-success">OFFER</span> <small>65% off</small>

</div>

</div>

</div>

</div> <?php */ ?>

</div>

</div>

</div>



<?php /* <div class="siddhi-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">

<div class="row">

<div class="col">

<a href="home.html" class="text-dark small font-weight-bold text-decoration-none">

<p class="h4 m-0"><i class="feather-home"></i></p>

Home

</a>

</div>

<div class="col selected">

<a href="trending.html" class="text-danger small font-weight-bold text-decoration-none">

<p class="h4 m-0"><i class="feather-map-pin text-danger"></i></p>

Trending

</a>

</div>

<div class="col bg-white rounded-circle mt-n4 px-3 py-2">

<div class="bg-danger rounded-circle mt-n0 shadow">

<a href="checkout.html" class="text-white small font-weight-bold text-decoration-none">

<i class="feather-shopping-cart"></i>

</a>

</div>

</div>

<div class="col">

<a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">

<p class="h4 m-0"><i class="feather-heart"></i></p>

Favorites

</a>

</div>

<div class="col">

<a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">

<p class="h4 m-0"><i class="feather-user"></i></p>

Profile

</a>

</div>

</div>

</div>

</div> */ ?>



@include('layouts.footer')



@include('layouts.nav')


<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>

<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>

 <script type="text/javascript">


 	var geoFirestore = new GeoFirestore(firestore);

 	var categoryId = "<?php echo $id; ?>";



 	var foodCategoriesref= database.collection('vendor_categories').where('id','==',categoryId);
  var vendorRef= database.collection('vendors').where('categoryID',"==",categoryId);

 	var placeholderImageRef = database.collection('settings').doc('placeHolderImage');

  var placeholderImageSrc = '';

  placeholderImageRef.get().then( async function(placeholderImageSnapshots){

      var placeHolderImageData = placeholderImageSnapshots.data();

      placeholderImageSrc = placeHolderImageData.image;
   
  })



  $(document).ready(function() {

    foodCategoriesref.get().then( async function(foodCategories){  
      foodCategories.docs.forEach((listval) => {
      var datas=listval.data();
            $("#category_name").text(datas.title);
        });
    });

      vendorRef.get().then( async function(snapshots){  
        if(snapshots!=undefined){
          var html='';
          html=buildHTML(snapshots);
          jQuery("#data-table_processing").hide();

          if(html!=''){
            var append_list = document.getElementById('trendingList');
              append_list.innerHTML=html;
              $("#data-table_processing").hide();
               
          }
        }
    }); 

 

  })





  var append_categories = '';
  var trendingRestaurantRef='';
 	
  /*if(address_lat=='' || address_lng==''){
 			var res=getCurrentLocation();
 	}
 	var myInterval=setInterval(restaurantReffunction, 1000);		

 	function myStopTimer() {
	  clearInterval(myInterval);
	}*/
	// restaurantReffunction();
 // 	function restaurantReffunction() {
 // 		  /*if(address_lat=='' || address_lng==''){
 // 		  	console.log("Timer-start");
 // 		  	return false;
 // 		  }
 // 		  console.log(address_lat);
 // 		  console.log(address_lng);
 // 		  console.log("Timer----");
 // 			myStopTimer();*/
 // 			trendingRestaurantRef=geoFirestore.collection('vendor_products').where('categoryID',"==",categoryId);

	//    	 getTrendingRestaurantID().then(data => {
	//    	 		vendorIds= data;
	// 				var trendingList = '';
	// 				var count = 0;
 //        	//.near({ center: new firebase.firestore.GeoPoint(address_lat,address_lng), radius: 200 })
 //        	/*vendorBuildHTMLs(vendorIds);*/
 //        	vendorIds.forEach((listval) => {
	//         			count++;
	//         			vendorBuildHTML(listval)
	// 				})
 //        })

 // 	}
	/*var trendingRestaurantRef= database.collection('vendor_products').where('categoryID',"==",categoryId);*/

	var vendorIds = [];

    var html = '';


     



	   // function getVendorData(){


    //   	  	trendingList = document.getElementById('trendingList');

    //         trendingList.innerHTML=html;        	

	   // }



	// async function getTrendingRestaurantID(){

  	

	// 	var allRestaurantId = [];

	// 	await trendingRestaurantRef.get().then( async function(trendingSnapshots){ 

	// 			trendingSnapshots.docs.forEach((listval) => {

 //              		var datas=listval.data();

 //            		if(datas.vendorID != '' && (!allRestaurantId.includes(datas.vendorID))){

 //            			var vdId = datas.vendorID;

 //            		 allRestaurantId.push(vdId);

 //            		}

 //        		});

	// 	}) 

	// 	return allRestaurantId;

	// }

   function buildHTML(nearestRestauantSnapshot){
        var html='';
        var alldata=[];
        nearestRestauantSnapshot.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
        var count = 0;  
        var popularFoodCount = 0;
        html = html+ '<div class="row">';    
        alldata.forEach((listval) => {
            var val=listval;
              var rating = 0;
              var reviewsCount = 0;
            if(val.hasOwnProperty('reviewsSum') && val.reviewsSum != 0 && val.hasOwnProperty('reviewsCount') && val.reviewsCount != 0){
              rating = (val.reviewsSum/val.reviewsCount);
              rating = Math.round(rating * 10) / 10;
              reviewsCount = val.reviewsCount;
            }
            var status='Closed';
            var statusclass="closed";
            if(val.hasOwnProperty('reststatus') && val.reststatus){
              status='Open';
              statusclass="open";
            }

            var vendor_id_single = val.id;
            var view_vendor_details = "{{ route('restaurant',':id')}}";
            view_vendor_details = view_vendor_details.replace(':id', 'id='+vendor_id_single);
            count++;          

            html = html+ '<div class="col-md-3 pb-3"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';

      
        if(val.photo){
            photo=val.photo;
        }else{
            photo=placeholderImageSrc;
        }

      html = html +'<div class="member-plan position-absolute"><span class="badge badge-dark '+statusclass+'">'+status+'</span></div><a href="'+view_vendor_details+'"><img alt="#" src="'+photo+'" class="img-fluid item-img w-100"></a></div><div class="p-3 position-relative"><div class="list-card-body"><h6 class="mb-1"><a href="'+view_vendor_details+'" class="text-black">'+val.title+'</a></h6>';

      html = html + '<p class="text-gray mb-1 small"><span class="fa fa-map-marker"></span> '+val.location+'</p>';
      if(rating > 0){
      html = html + '<div class="star position-relative mt-3"><span class="badge badge-success"><i class="feather-star"></i>'+rating+' ('+reviewsCount+'+)</span></div>';
      }




       html = html +'</div>';
      html = html +'</div></div></div>';
       
    
        });
    html = html + '</div>';
    return html;      
}  








	</script>