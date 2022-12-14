@include('layouts.app')

@include('layouts.header')



<div class="d-none">

<div class="bg-primary p-3 d-flex align-items-center">

<a class="toggle togglew toggle-2" href="#"><span></span></a>

<h4 class="font-weight-bold m-0 text-white">{{trans('lang.search')}}</h4>

</div>

</div>

<div class="siddhi-popular">



<div class="container">

<div class="search py-5">

<div class="input-group mb-4">

	
		<input type="text" class="form-control form-control-lg input_search border-right-0 food_search" id="inlineFormInputGroup" value="">

		<div class="input-group-prepend">

			<div class="btn input-group-text bg-white border_search border-left-0 text-primary search_food_btn"><i class="feather-search"></i>

			</div>

		</div>

	

</div>



<ul class="nav nav-tabs border-0" id="myTab" role="tablist">

<li class="nav-item" role="presentation">

<a class="nav-link active border-0 bg-light text-dark rounded" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather-home mr-2"></i><span class="restaurant_counts"></span></a>

</li>

<!-- <li class="nav-item" role="presentation">

<a class="nav-link border-0 bg-light text-dark rounded ml-3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="feather-disc mr-2"></i>Dishes (23)</a>

</li> -->

</ul>



<div id="data-table_processing" class="dataTables_processing panel panel-default" style="display: none;">{{trans('lang.Processing')}}</div>



<div class="text-center py-5 not_found_div" style="display:none" >

<p class="h4 mb-4"><i class="feather-search bg-primary rounded p-2"></i></p>

<p class="font-weight-bold text-dark h5">{{trans('lang.nothing_found')}}</p>

<p>{{trans('lang.please_try_again')}}</p>

</div>



<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



<div class="container mt-4 mb-4 p-0">

<div id="append_list1" class="res-search-list-1"></div>





</div>

</div>

</div>

<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">



<div class="row d-flex align-items-center justify-content-center py-5">

<div class="col-md-4 py-5">



</div>

</div>



</div>



</div>



</div>

</div>



@include('layouts.footer')



@include('layouts.nav')



<script type="text/javascript">

var placeholderImage = '';
var placeholder = database.collection('settings').doc('placeHolderImage');
  placeholder.get().then( async function(snapshotsimage){
  var placeholderImageData = snapshotsimage.data();
  placeholderImage = placeholderImageData.image;
})

var productsref= database.collection('vendor_products');

var pagesize = 12;

var append_list = '';

$(document).ready(function() {

  $("#data-table_processing").show();

			append_list = document.getElementById('append_list1');

    		append_list.innerHTML='';



    		productsref.get().then( async function(snapshots){  

          if(snapshots!=undefined){

      			var html='';

      			html=buildHTML(snapshots);

      			jQuery("#data-table_processing").hide();

      			if(html!=''){

          			append_list.innerHTML=html;

          			$("#data-table_processing").hide();

       			}

          }

  			}); 


    //$(".search_food_btn").click(function(){
		$(".food_search").keypress(function(e){
       if(e.which == 13) {
      append_list.innerHTML='';
      //$("#data-table_processing").show();
			var foodsearch = $(".food_search").val();
			productsref.orderBy('name').startAt(foodsearch).endAt(foodsearch+'\uf8ff').get().then( async function(snapshotsKeypress){
      if(snapshotsKeypress.docs.length > 0){
        var html_keypress = '';
				html_keypress=buildHTML(snapshotsKeypress);
    		jQuery("#data-table_processing").hide();
    		if(html_keypress!=''){
    				$(".not_found_div").hide();
            append_list.innerHTML= '';
        		append_list.innerHTML=html_keypress;
        		$("#data-table_processing").hide();        				
						}else{
							append_list.innerHTML= '';
              $(".restaurant_counts").text('Restaurants (0)');
							$(".not_found_div").show();
              $("#data-table_processing").hide(); 
						}
      }else{
              append_list.innerHTML= '';
              $(".restaurant_counts").text('Restaurants (0)');
              $(".not_found_div").show();
              $("#data-table_processing").hide(); 
            }
					})					
    }
		})



		    $(".search_food_btn").click(function(){
               append_list.innerHTML='';

               $("#data-table_processing").show();

				var foodsearch = $(".food_search").val();

					productsref.orderBy('name').startAt(foodsearch).endAt(foodsearch+'\uf8ff').get().then( async function(snapshots){
            if(snapshots.docs.length > 0){
              html = '';
						html=buildHTML(snapshots);

    					jQuery("#data-table_processing").hide();

    				if(html!=''){
    						$(".not_found_div").hide();
                  append_list.innerHTML= '';
        					append_list.innerHTML=html;
        					$("#data-table_processing").hide();        				
						}else{

							append_list.innerHTML= '';
              $(".restaurant_counts").text('Restaurants (0)');
							$(".not_found_div").show();
              $("#data-table_processing").hide(); 
						}
          }else{
                append_list.innerHTML= '';
                $(".restaurant_counts").text('Restaurants (0)');
                $(".not_found_div").show();
                $("#data-table_processing").hide();      
          }

					})					

		})

})



	 function buildHTML(snapshotsHTML){
        var html='';

        var alldata=[];

        var number= [];

        var vendorIDS = [];
        snapshotsHTML.docs.forEach((listval) => {

            var datas=listval.data();
        if(!vendorIDS.includes(datas.vendorID)){
				    alldata.push(datas);
        		vendorIDS.push(datas.vendorID);
        }



        });

        var count= 0;

        $(".restaurant_counts").text('Restaurants ('+alldata.length+')');
        console.log(alldata);
        alldata.forEach((listval) => {

            count++;

            var val=listval;
            if(val.vendorID != ''){
               <?php /* // var route1 =  '{{route("drivers.edit",":id")}}';

                // route1 = route1.replace(':id', id); */ ?>

                if(count == 1){

                	html=html+ '<div class="row">';	

                }

                const restaurantImage = productRestaurantImage(val.vendorID);

                html=html+ '<div class="col-md-3 pb-3"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';

                // html=html+ '<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>';

                html=html+ '<div class="restaurant_star_'+val.vendorID+' star position-absolute"></div>';

               

                // html=html+ '<div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>';



 				       // html=html+'<div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>';

 				

 				html=html+'<div class="restaurant_image_'+val.vendorID+'" ></div>';

				html=html+ '</div>';

				html=html+ '<div class="p-3 position-relative">';

				html=html+ '<div class="restaurant_name_'+val.vendorID+' list-card-body" ></div>';

				// html=html+ '<div class="list-card-badge"><span class="badge badge-danger">OFFER</span> <small>65% siddhi50</small></div>';

				html=html+'</div></div></div>';

				if(count == 4){

					html=html+'</div>';

					count =0;

				}
      
      }


          });

          return html;      

}



async function productRestaurantImage(restaurant) {

var productRestaurantImage='';

if(restaurant){

await database.collection('vendors').where("id","==",restaurant).get().then( async function(snapshotss){

  

            if(snapshotss.docs[0]){

                var restaurant_data = snapshotss.docs[0].data();

            if(restaurant_data  && restaurant_data.title){

                productRestaurantImage = restaurant_data.photo;

                productRestaurantTitle = restaurant_data.title;

            	var view_vendor_details = "{{ route('restaurant',':id')}}";

            	view_vendor_details = view_vendor_details.replace(':id', 'id='+restaurant);

            	var rating = 0;
              var reviewsCount = 0;
              var status='Closed';
              var statusclass="closed";
              if(restaurant_data.hasOwnProperty('reststatus') && restaurant_data.reststatus){
                status='Open';
                statusclass="open";
              }

            	if(restaurant_data.hasOwnProperty('reviewsSum') && restaurant_data.reviewsSum != 0 && restaurant_data.hasOwnProperty('reviewsCount') && restaurant_data.reviewsCount != 0){

              		rating = (restaurant_data.reviewsSum/restaurant_data.reviewsCount);
                  reviewsCount = restaurant_data.reviewsCount;
              		rating = Math.round(rating * 10) / 10;

            	}
              if(productRestaurantImage == ''){
                productRestaurantImage = placeholderImage
              }
            	jQuery(".restaurant_star_"+restaurant).append('<span class="badge badge-success"><i class="feather-star"></i>'+rating+' ('+reviewsCount+'+)</span>');

                jQuery(".restaurant_image_"+restaurant).append('<div class="member-plan position-absolute"><span class="badge badge-dark '+statusclass+'">'+status+'</span></div><a href="'+view_vendor_details+'"><img alt="#" src="'+productRestaurantImage+'" class="img-fluid item-img w-100"></a>');

                jQuery(".restaurant_name_"+restaurant).append('<h6 class="mb-1"><a href="'+view_vendor_details+'" class="text-black">'+productRestaurantTitle+'</a></h6>');

                jQuery(".restaurant_name_"+restaurant).append('<p class="text-gray mb-3"><span class="fa fa-map-marker"></span> '+restaurant_data.location+'</p>');

      			rating = parseInt(rating);

                // jQuery(".restaurant_name_"+restaurant).append('<p class="text-gray mb-1 rating"></p><ul class="rating-stars list-unstyled"><li>');

    

      

      var ratinghtml='<ul class="rating-stars list-unstyled"><li>';          

      if(rating >=1){

        /*jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star star_active"></i>');*/

        ratinghtml=ratinghtml+'<i class="feather-star star_active"></i>';

      }else{

        /*jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star"></i>');*/

        ratinghtml=ratinghtml+'<i class="feather-star"></i>';

      }

      if(rating >= 2){

        ratinghtml=ratinghtml+'<i class="feather-star star_active"></i>';

        //jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star star_active"></i>');

      }else{

        /*jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star"></i>');*/

        ratinghtml=ratinghtml+'<i class="feather-star"></i>';

      }      

      if(rating >= 3){

        ratinghtml=ratinghtml+'<i class="feather-star star_active"></i>';

        //jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star star_active"></i>');

      }else{

        /*jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star"></i>');*/

        ratinghtml=ratinghtml+'<i class="feather-star"></i>';

      }      

      if(rating >= 4){

        ratinghtml=ratinghtml+'<i class="feather-star star_active"></i>';

        //jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star star_active"></i>');

      }else{

        /*jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star"></i>');*/

        ratinghtml=ratinghtml+'<i class="feather-star"></i>';

      }      

      if(rating == 5){

        ratinghtml=ratinghtml+'<i class="feather-star star_active"></i>';

        //jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star star_active"></i>');

      } else{

        /*jQuery(".restaurant_name_"+restaurant).append('<i class="feather-star"></i>');*/

        ratinghtml=ratinghtml+'<i class="feather-star"></i>';

      }



      ratinghtml=ratinghtml+'</li></ul>';

      jQuery(".restaurant_name_"+restaurant).append(ratinghtml);



    }

        }else{

            jQuery(".restaurant_"+restaurant).html('');

        } 

});

}

return productRestaurantImage;

} 

</script>