@include('layouts.app')

@include('layouts.header')

<div class="siddhi-home-page mb-5">
<div class="bg-primary px-3 d-none mobile-filter pb-3">
    <div class="row align-items-center">
<div class="input-group rounded shadow-sm overflow-hidden col-md-9 col-sm-9">
<div class="input-group-prepend">
<button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
</div>
<input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes">
</div>        
<div class="text-white col-md-3 col-sm-3">
<div class="title d-flex align-items-center">
<a class="text-white font-weight-bold ml-auto" data-toggle="modal" data-target="#exampleModal" href="#">{{trans('lang.filter')}}</a>
</div>
</div>


</div>
</div>


<!-- /************************home banner****************/ -->

<div class="home-banner">
    
       <div class="banner-inner">
         <div class="banner-img">
             <img src="img/hero_banner.png">
         </div>
      <div class="container">   
         <div class="homebanner-content">
            <h1>{{trans('lang.unlimited')}}<br> {{trans('lang.medium')}} <span>Pizzas</span></h1>
            <h4>{{trans('lang.medium')}} 2-topping* pizza</h4>
             <p>*Additional charge for premiume toppings. Minimum of 2 requierd. </p>
             <div class="ban-btn"><a href="#">{{trans('lang.order_now')}}</a> <span class="price">$32.99 <sup>$39.99</sup></span></div>
             <!--<div class="ban-btn"><a href="{{ route('trending') }}">Order Now</a> <span class="price">$32.99 <sup>$39.99</sup></span></div>-->
         </div>
       </div>  
    </div> 
</div>


<!-- /************************home banner****************/ -->

<div style="display:none" class="coupon_code_copied_div mt-4 error_top text-center"><p>{{trans('lang.coupon_code_copied')}}</p></div>

<div class="container">
<div class="cat-slider mb-4 mt-3" id="append_categories">
 
</div>
</div>


<?php /*<div class="bg-white">
<div class="container">
<div class="offer-slider">
<div class="cat-item px-1 py-3">
<a class="d-block text-center shadow-sm" href="trending.html">
<img alt="#" src="{{asset('img/pro1.jpg')}}" class="img-fluid rounded">
</a>
</div>
<div class="cat-item px-1 py-3">
<a class="d-block text-center shadow-sm" href="trending.html">
<img alt="#" src="{{asset('img/pro2.jpg')}}" class="img-fluid rounded">
</a>
</div>
<div class="cat-item px-1 py-3">
<a class="d-block text-center shadow-sm" href="trending.html">
<img alt="#" src="{{asset('img/pro3.jpg')}}" class="img-fluid rounded">
</a>
</div>
<div class="cat-item px-1 py-3">
<a class="d-block text-center shadow-sm" href="trending.html">
<img alt="#" src="{{asset('img/pro4.jpg')}}" class="img-fluid rounded">
</a>
</div>
<div class="cat-item px-1 py-3">
<a class="d-block text-center shadow-sm" href="trending.html">
<img alt="#" src="{{asset('img/pro2.jpg')}}" class="img-fluid rounded">
</a>
</div>
</div>
</div>
</div> */ ?>
<div class="container">

<div class="pt-4 pb-2 title d-flex align-items-center">
<h5 class="m-0">{{trans('lang.popular')}} {{trans('lang.foods')}}</h5>
<!--<a class="font-weight-bold ml-auto" href="{{url('/trending')}}">View all <i class="feather-chevrons-right"></i></a>  -->
</div>


<div id="trending-slider" class="trending-slider mb-4"></div>


<div class="py-3 title d-flex align-items-center">
<h5 class="m-0">{{trans('lang.popular')}} {{trans('lang.restaurants')}} </h5>
<?php /*<a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a> */ ?>
</div>

<div class="most_popular mb-4">
	<div id="most_popular"></div>

</div>

<div class="pt-2 pb-3 title d-flex align-items-center">
<h5 class="m-0">{{trans('lang.new_arrivals')}}</h5>
<?php /*<a class="font-weight-bold ml-auto" href="#">26 places <i class="feather-chevrons-right"></i></a> */ ?>
</div>
<div class="most_sale mb-4">
<div class="row mb-3" id="most_sale1">

</div> 
</div> 

<div class="pt-4 pb-2 title d-flex align-items-center">
<h5 class="m-0">{{trans('lang.offers')}} & {{trans('lang.discount')}}</h5>
<a class="font-weight-bold ml-auto" href="{{url('/offers')}}"> {{trans('lang.view_all')}} <i class="feather-chevrons-right"></i></a>
</div>

<div class="offers-coupons mb-4" id="offers_coupons"></div>

</div>


</div>
</div>


@include('layouts.footer')
<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>
<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>
<script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript">
    var geoFirestore = new GeoFirestore(firestore);
    var vendorId;
    var ref;
    var append_list = '';
    var append_categories = '';
    var most_popular ='';
    var most_sale = '';
    var offers_coupons = '';
    var appName = '';
    var popularRestaurantsList = [];
    var currentCurrency = '';
    var currencyAtRight = false;
    var RestaurantNearBy = '';
    var DriverNearByRef = database.collection('settings').doc('RestaurantNearBy'); 
  
    

    var foodCategoriesref= database.collection('vendor_categories');
    var vendorsref= geoFirestore.collection('vendors');
    var refCurrency = database.collection('currencies').where('isActive', '==' , true);
  //const popularRestauantRef = geoFirestore.collection('vendors');
  const refs = database.collection('vendors');
  const popularRestauantRef = geoFirestore.collection('vendors').where('reviewsSum','>',4);
  //const geocollection = await GeoFirestore.collection('employees_actives').where("status", "==", "active")


  var placeholderImageRef = database.collection('settings').doc('placeHolderImage');

  var placeholderImageSrc = '';

    placeholderImageRef.get().then( async function(placeholderImageSnapshots){

        var placeHolderImageData = placeholderImageSnapshots.data();

        placeholderImageSrc = placeHolderImageData.image;
     
    })

     refCurrency.get().then( async function(snapshots){  
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;
    }); 


   

  var couponsRef= database.collection('coupons').where('isEnabled', '==' ,true).orderBy("expiresAt").startAt(new Date());
  var globalSettingsRef = database.collection('settings').doc("globalSettings");
  globalSettingsRef.get().then( async function(globalSettingsSnapshots){
    var appData = globalSettingsSnapshots.data();
    appName = appData.applicationName;
  })
  if(address_lat=='' || address_lng=='' || address_lng==NaN || address_lat==NaN || address_lat==null || address_lng==null){
        var res=getCurrentLocation();
    }
    var myInterval=setInterval(callRestaurant, 1000);        
    function myStopTimer() {
        clearInterval(myInterval);
    }
  $(document).ready(function() {
      getFoodCategories();
      getCouponsList();
  });

  async function callRestaurant() {
      if(address_lat=='' || address_lng=='' || address_lng==NaN || address_lat==NaN || address_lat==null || address_lng==null){
        return false;
      }
      
       
        DriverNearByRef.get().then( async function(DriverNearByRefSnapshots){
            var DriverNearByRefData = DriverNearByRefSnapshots.data();
            RestaurantNearBy = parseInt(DriverNearByRefData.radios);
            
              address_lat=parseFloat(address_lat);
              address_lng=parseFloat(address_lng);
              myStopTimer();
              //getTrendingRestaurat();
              getMostPopularRestaurants();
              getMostSalesRestaurant();
        })

  }
  async function getFoodCategories(){

      foodCategoriesref.get().then( async function(foodCategories){  
    append_categories = document.getElementById('append_categories');
    append_categories.innerHTML='';
    foodCategorieshtml=buildHTMLFoodCategory(foodCategories);
    append_categories.innerHTML=foodCategorieshtml;

    if ($('.cat-slider').hasClass('slick-initialized')) {
          $('.cat-slider').slick('destroy');
          slickcatCarousel();
    }

  })
  }

  // async function getTrendingRestaurat(){
  //       var trendingRestaurat='';
  //       if(RestaurantNearBy){
  //           trendingRestaurat=vendorsref.near({ center: new firebase.firestore.GeoPoint(address_lat, address_lng), radius: RestaurantNearBy }).limit(9);
  //       }else{
  //           trendingRestaurat=vendorsref.limit(9);
  //       }
  //     trendingRestaurat.get().then( async function(trendingVendorsnapshot){  
  //     append_trending_restaurant = document.getElementById('trending-slider');
  //     append_trending_restaurant.innerHTML='';
  //     var trendingRestauranthtml=buildHTMLTrendingRestaurant(trendingVendorsnapshot);
  //     append_trending_restaurant.innerHTML=trendingRestauranthtml;

  //      if ($('.trending-slider').hasClass('slick-initialized')) {
  //         $('.trending-slider').slick('destroy');
  //         slicktrendingCarousel();
  //     }
      
  //   })
  // }


async function getPopularFood(){
 if(popularRestaurantsList.length>0){
 var popularRestaurantsListnw=[]; 

   append_trending_restaurant = document.getElementById('trending-slider');
   append_trending_restaurant.innerHTML='';
   //console.log(popularRestaurantsList.length);
   var from=0;
   var total=0;
   for (let i = 0; i < (popularRestaurantsList.length/10); i++) {
                from=i*10;
                popularRestaurantsListnw=[];
                total=0;
                for (let j = 0; j < popularRestaurantsList.length; j++) {
                    if(j > from && total<10){
                        total++;
                        popularRestaurantsListnw.push(popularRestaurantsList[j]);
                    }
                }
                if(popularRestaurantsListnw.length){
                    var refpopularFood = database.collection('vendor_products').where("vendorID","in",popularRestaurantsListnw);
                    refpopularFood.get().then( async function(snapshotsPopularFood){
                  
                    var trendingRestauranthtml=buildHTMLPopularFood(snapshotsPopularFood);
                    append_trending_restaurant.innerHTML=trendingRestauranthtml;
                       if ($('.trending-slider').hasClass('slick-initialized')) {
                          $('.trending-slider').slick('destroy');
                          slicktrendingCarousel();
                      }
                    }); 
                }

   }
    
 }

}




  async function getMostPopularRestaurants(){

    /*const geoQuery = geoFirestore.query({
      center: new firebase.firestore.GeoPoint(address_lat, address_lng),
      radius: RestaurantNearBy,
      query: (refs) => refs.where("reviewsSum",">=",3)
    });

    // Then listen for results as they come in
    const onKeyEnteredRegistration = geoQuery.on('key_entered', (key, document, distance) => {
      console.log(key + ' entered query at ' + document.coordinates.latitude + ',' + document.coordinates.longitude + ' (' + distance + ' km from center)');
    });*/

    var popularRestauantRefnew='';
    if(RestaurantNearBy){
        popularRestauantRefnew=geoFirestore.collection('vendors').near({ center: new firebase.firestore.GeoPoint(address_lat, address_lng), radius: RestaurantNearBy}).limit(50);
        
    }else{
        popularRestauantRefnew=geoFirestore.collection('vendors').limit(15);
    }

      popularRestauantRefnew.get().then( async function(popularRestauantSnapshot){  
      most_popular = document.getElementById('most_popular');
      most_popular.innerHTML='';
      var popularRestauranthtml=buildHTMLPopularRestaurant(popularRestauantSnapshot);
      most_popular.innerHTML=popularRestauranthtml;
    })
  }

  async function getMostSalesRestaurant(){
        var mostSalesRestaurant='';
        
      if(RestaurantNearBy){
            mostSalesRestaurant=vendorsref.near({ center: new firebase.firestore.GeoPoint(address_lat, address_lng), radius: RestaurantNearBy }).limit(3);
        }else{
            mostSalesRestaurant=vendorsref.limit(3);
        }
      mostSalesRestaurant.get().then( async function(mostSaleSnapshot){  
      most_sale = document.getElementById('most_sale1');
      most_sale.innerHTML='';
      var mostSaleRestauranthtml=buildHTMLMostSaleRestaurant(mostSaleSnapshot);
      most_sale.innerHTML=mostSaleRestauranthtml;

     

    })
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

  async function getCouponsList(){

      couponsRef.get().then( async function(couponListSnapshot){  
      offers_coupons = document.getElementById('offers_coupons');
      offers_coupons.innerHTML='';
      var couponlistHTML=buildHTMLCouponList(couponListSnapshot);
      offers_coupons.innerHTML=couponlistHTML;
      if ($('.offers-coupons').hasClass('slick-initialized')) {
          $('.offers-coupons').slick('destroy');
          slickcouponCarousel();
      }


    })
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
  
function slickcatCarousel() {
         $('.cat-slider').slick({
        //   centerMode: true,
        //   centerPadding: '30px',
        slidesToShow: 8,
        arrows: true,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 560,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '20px',
                    slidesToShow: 3
                }
            },
             {
                breakpoint: 360,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '20px',
                    slidesToShow: 2
                }
            }


        ]
    });
  }

function buildHTMLFoodCategory(foodCategories){
        var html='';
        var alldata=[];
        foodCategories.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
                
        alldata.forEach((listval) => {
            var val=listval;
            var category_id = val.id;
             var trending_route = "{{ route('category_detail',':id')}}";
            trending_route = trending_route.replace(':id',category_id);
            
            if(val.photo){
                photo=val.photo;
            }else{
                photo=placeholderImageSrc;
            }
            html = html+ '<div class="cat-item px-1 py-3 slick-active"><a class="bg-white rounded d-block p-3 text-center shadow-sm cat-link" href="'+trending_route+'"><img alt="#" src="'+photo+'" class="img-fluid mb-2"><p class="m-0 small">'+val.title+'</p><i class="fa fa-angle-right"></i></a></div>';
          });
          return html;      
}

sortArrayOfObjects = (arr, key) => {
            return arr.sort((a, b) => {
                return a[key] - b[key];
            });
        };
 function buildHTMLPopularRestaurant(popularRestauantSnapshot){
        var html='';
        var alldata=[];
        popularRestauantSnapshot.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
        if(alldata.length){
            alldata=sortArrayOfObjects(alldata, "reviewsSum");
            alldata=alldata.reverse();
        }
        

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
            if(rating >=4){
              if(popularFoodCount < 10){
                popularFoodCount++;
                popularRestaurantsList.push(val.id);                
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
            
            // if(count == 1 || count == 5){
            // html = html+ '<div class="row">'; 
            // }
            html = html+ '<div class="col-md-3 pb-3"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';
            /*html = html + '<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i>'+rating+' ('+val.reviewsCount+'+)</span></div>';*/

      <?php /*<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a>
      </div>
      <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div> */ ?>
      
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

     /* html = html +'<ul class="rating-stars list-unstyled"><li>';
     // rating = (rating).toFixed();
      rating = parseInt(rating);
      if(rating >=1){
        html = html +'<i class="feather-star star_active"></i>';
      }else{
        html = html +'<i class="feather-star"></i>';
      }
      if(rating >= 2){
        html = html +'<i class="feather-star star_active"></i>';
      }else{
        html = html +'<i class="feather-star"></i>';
      }      
      if(rating >= 3){
        html = html +'<i class="feather-star star_active"></i>';
      }else{
        html = html +'<i class="feather-star"></i>';
      }      
      if(rating >= 4){
        html = html +'<i class="feather-star star_active"></i>';
      }else{
        html = html +'<i class="feather-star"></i>';
      }      
      if(rating == 5){
      
        html = html +'<i class="feather-star star_active"></i>';
      } else{
        html = html +'<i class="feather-star"></i>';
      }

      html = html +'</li></ul>';*/


       html = html +'</div>';

      <?php /*<div class="list-card-badge">
      <span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small>
      </div> */ ?>
      html = html +'</div></div></div>';
      // if(count == 4 || count == 12){
      //   html = html + '</div>';
      // }
       
    }
        });
    html = html + '</div>';
    getPopularFood();
    return html;      
}       
  

function buildHTMLMostSaleRestaurant(mostSaleSnapshot){
        var html='';
        var alldata=[];
        mostSaleSnapshot.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
        alldata.forEach((listval) => {
            var val=listval;
            var vendor_id_single = val.id;
            var view_vendor_details = "{{ route('restaurant',':id')}}";
            view_vendor_details = view_vendor_details.replace(':id', 'id='+vendor_id_single);
            var rating = 0;
            var reviewsCount=0;
            if(val.reviewsSum != 0 && val.reviewsCount != 0){
              rating = (val.reviewsSum/val.reviewsCount);
              rating = Math.round(rating * 10) / 10;
              reviewsCount=val.reviewsCount;
            }

            var status='Closed';
            var statusclass="closed";
            if(val.hasOwnProperty('reststatus') && val.reststatus){
              status='Open';
              statusclass="open";
            }
            
            html = html+ '<div class="col-md-4 mb-3"><div class="align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';
            
            if(val.photo){
                photo=val.photo;
            }else{
                photo=placeholderImageSrc;
            }

            html = html +'<div class="member-plan position-absolute"><span class="badge badge-dark '+statusclass+'">'+status+'</span></div><a href="'+view_vendor_details+'"><img alt="#" src="'+photo+'" class="img-fluid item-img w-100"></a></div><div class="p-3 position-absolute most-pop-bottom"><div class="list-card-body"><h6 class="mb-1"><a href="'+view_vendor_details+'" class="text-black">'+val.title+'</a></h6>';

            html = html + '<p class="text-gray mb-3"><span class="fa fa-map-marker"></span> '+val.location+'</p>';

            if(rating > 0){
              html = html + '<div class="star position-relative mt-3"><span class="badge badge-success"><i class="feather-star"></i>'+rating+' ('+reviewsCount+'+)</span></div>';
            }else{
              html = html + '<div class="star position-relative mt-3"><span class="badge badge-success"><i class="feather-star"></i>0 (0)</span></div>';
            }
            <?php /* <p class="text-gray mb-3 time">
             <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span>
              <span class="float-right text-black-50"> $500 FOR TWO</span></p>'; */ ?>
              html = html + '</div>';
              <?php /*<div class="list-card-badge">
              <span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small>
              </div>'; */ ?>
              html = html +'</div></div></div>';
        });
    return html;      
}

 function buildHTMLCouponList(couponListSnapshot){
        var html='';
        var alldata=[];
        couponListSnapshot.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
                
        alldata.forEach((listval) => {
            var val=listval;
            
            html = html+ "<div class='siddhi-slider-item'><div class='list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm'><div class='list-card-image'>";
            if(val.hasOwnProperty('resturant_id')  && val.resturant_id != ''){

              var view_vendor_route = "{{ route('restaurant',':id')}}";
              view_vendor_route = view_vendor_route.replace(':id', 'id='+val.resturant_id);
              html = html +"<a href='"+view_vendor_route+"'>";
            }else{

            //html = html +"<a href='restaurant.html'>";
            }
            // html = html+"<img alt='#' src='img/trending1.png' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";



                if(val.hasOwnProperty('image') && val.image != ''){
                    html = html+"<img alt='#' src='"+val.image+"' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";
                }else{
                    html = html+"<img alt='#' src='"+placeholderImageSrc+"' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";
                }


            if(val.hasOwnProperty('resturant_id') && val.resturant_id != ''){
              var restaurantName = offerRestaurant(val);
              html = html + "<div class='offer-btm mb-3'><h6 class='mb-1'><a href='"+view_vendor_route+"' class='text-black restaurant_"+val.resturant_id+"_"+val.id+"'></a></h6><div class='star position-absolute mt-3 '><span class='badge badge-success' id='offer_restaurant_rating_"+val.resturant_id+"_"+val.id+"'></span></div></div><p class='text-gray mb-3 restaurant_location_"+val.resturant_id+"_"+val.id+"'><span class='fa fa-map-marker'></span> </p>";
            }else{
              html = html + "<div class='offer-btm mb-3'><h6 class='float-left'>"+appName+"'s Offer</h6><p class='text-gray float-right'>App Offer</p></div>";
            }
            // html = html + "<div class='offer_coupon_code' ><span class='text-gray mb-3 offer_code'>"+val.code+"</span>";
            
            var price_coupon='';
            
            if (currencyAtRight) {
                if (val.discountType =='Percent' || val.discountType =='Percentage') {
                    price_coupon = val.discount+"%";
                }else{
                    price_coupon = val.discount+""+currentCurrency;
                }
            }else{
                if (val.discountType =='Percent' || val.discountType == 'Percentage') {
                    price_coupon = val.discount+"%";
                }else{  
                    price_coupon = currentCurrency+""+val.discount;
                }
            }


            html = html + '<div class="offer_coupon_code align-items-center" >';
                html = html + '<span class="offercoupan text-gray mb-3 offer_code"><p class="mb-0 badge">'+val.code+'</p><a href="javascript:void(0)" onclick="copyToClipboard(`'+val.code+'`)"><i class="fa fa-copy"></i></a></span>';
                 html = html + '<span class="offer_price ml-auto">'+price_coupon+'</span>';
          //  html = html + '</div>';

            // if(val.hasOwnProperty('resturant_id') && val.resturant_id != ''){
            // html = html + "<div class='star position-absolute mt-3'><span class='badge badge-success' id='offer_restaurant_rating_"+val.resturant_id+"_"+val.id+"'></span></div>";
            // }
            html = html + '</div>';
            html = html +"</div></div></div></div></div>";

        });
  return html;      
}

async function offerRestaurant(data) {
  var offerRestaurant='';
  var restaurant = data.resturant_id;

  await database.collection('vendors').where("id","==",restaurant).get().then( async function(snapshotss){
  
            if(snapshotss.docs[0]){
                var restaurant_data = snapshotss.docs[0].data();
                offerRestaurant = restaurant_data.title;
                var rating = 0;
                if(restaurant_data.hasOwnProperty('reviewsSum') && restaurant_data.hasOwnProperty('reviewsCount') && restaurant_data.reviewsSum != 0 && restaurant_data.reviewsCount != 0){
                  rating = (restaurant_data.reviewsSum/restaurant_data.reviewsCount);
                  rating = Math.round(rating * 10) / 10;
                  rating_count=restaurant_data.reviewsCount;
                }else{
                  rating =0;
                  rating_count=0;
                }
                jQuery(".restaurant_"+restaurant+"_"+data.id).append(offerRestaurant);
                jQuery(".restaurant_location_"+restaurant+"_"+data.id).append(restaurant_data.location);
                jQuery("#offer_restaurant_rating_"+restaurant+"_"+data.id).html("<i class='feather-star star_active'></i>"+rating + "("+ rating_count+"+)");
            } 
});
return offerRestaurant;
}

  function copyToClipboard(text) {
           navigator.clipboard.writeText("");
           navigator.clipboard.writeText(text);
           $(".coupon_code_copied_div").show();
           window.scrollTo(0, 0);

           setTimeout(
        function() {
          $(".coupon_code_copied_div").hide();
        }, 4000);

    }



   function buildHTMLPopularFood(popularFoodsnapshot){
        var html='';
        var alldata=[];
        popularFoodsnapshot.docs.forEach((listval) => {
            var datas=listval.data();
            alldata.push(datas);
        });
                
        alldata.forEach((listval) => {
            var val=listval;
            var vendor_id_single = val.vendorID;
            var view_vendor_details = "{{ route('restaurant',':id')}}";
            view_vendor_details = view_vendor_details.replace(':id', 'id='+vendor_id_single);
            var rating = 0;
            var reviewsCount = 0

            html = html+ '<div class="siddhi-slider-item"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';
            
            if(val.photo){
                photo=val.photo;
            }else{
                photo=placeholderImageSrc;
            }

            html = html +'<a href="'+view_vendor_details+'"><img alt="#" src="'+photo+'" class="img-fluid item-img w-100"></a></div><div class="p-3 position-relative"><div class="list-card-body"><h6 class="mb-1"><a href="'+view_vendor_details+'" class="text-black">'+val.name+'</a></h6>';
            	var popularFoodCategorytitle = popularFoodCategory(val.categoryID,val.id);
            html = html+'<h6 class="mb-1 popular_food_category_" id="popular_food_category_'+val.categoryID+'_'+val.id+'" ></h6>';

                if(val.hasOwnProperty('disPrice') && val.disPrice != '' && val.disPrice != '0' ){
                    var dis_price='';
                    var or_price='';
                    if(currencyAtRight){
                        or_price = val.price+""+currentCurrency;
                        dis_price = val.disPrice+""+currentCurrency;
                    }else{
                         or_price = currentCurrency+""+val.price;
                         dis_price = currentCurrency+""+val.disPrice;
                    }

                  html = html+'<h6 class="mb-1">'+dis_price+'  <s>'+or_price+'</s></h6>';  
                }else{   
                    var or_price='';
                    if(currencyAtRight){
                        or_price = val.price+""+currentCurrency;
                    }else{
                         or_price = currentCurrency+""+val.price;
                    }

                  html = html+'<h6 class="mb-1">'+or_price+'</h6>'
                }

     

             html = html+ '</div>';

              html = html+ '</div></div></div>';
                      });
          return html;      
}

async function popularFoodCategory(categoryId,foodId) {
  var popularFoodCategory='';

  await database.collection('vendor_categories').where("id","==",categoryId).get().then( async function(categorySnapshots){
  
            if(categorySnapshots.docs[0]){
                var categoryData = categorySnapshots.docs[0].data();
                popularFoodCategory = categoryData.title;
                jQuery("#popular_food_category_"+categoryId+"_"+foodId).text(popularFoodCategory);
            } 
});
return popularFoodCategory;
}

</script>
@include('layouts.nav')



