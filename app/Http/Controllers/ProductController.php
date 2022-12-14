<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorUsers;
use Illuminate\Support\Facades\Auth;
use Session;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct()
    {
        //$this->middleware('auth');
    }
    
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {   

        
        return view('checkout');
    }


  
    /**
     * Write code on Method
     *
     * @return response()
     */
     public function addToCart(Request $request)
    {   

        $req=$request->all();
        $id=$req['id'];
        $restaurant_id=$req['restaurant_id'];
        $cart = Session::get('cart', []);
        
        /*if(isset($cart[$id])) {
            $cart['item'][$vendor_id][$id]['quantity']+$req['quantity'];
        } else {*/
            
            if(@$cart['item'] && isset($cart['item'][$restaurant_id])){
                
            }else{

                $cart['item']=array();
                Session::put('cart', $cart);
                Session::save();
            }
            if(@$req['deliveryCharge']){
                $cart['deliverychargemain']=$req['deliveryCharge'];
            }
            $cart['restaurant_latitude']=$req['restaurant_latitude'];
            $cart['restaurant_longitude']=$req['restaurant_longitude'];
            $deliveryChargemain=@$_COOKIE['deliveryChargemain'];
            $address_lat=@$_COOKIE['address_lat'];
            $address_lng=@$_COOKIE['address_lng'];
            $restaurant_latitude=@$_COOKIE['restaurant_latitude'];
            $restaurant_longitude=@$_COOKIE['restaurant_longitude'];

            if(@$deliveryChargemain && @$address_lat && @$address_lng && @$restaurant_latitude && @$restaurant_longitude){
                $deliveryChargemain=json_decode($deliveryChargemain);
                if(!empty($deliveryChargemain)){
                    $delivery_charges_per_km=$deliveryChargemain->delivery_charges_per_km;
                    $minimum_delivery_charges=$deliveryChargemain->minimum_delivery_charges;
                    $minimum_delivery_charges_within_km=$deliveryChargemain->minimum_delivery_charges_within_km;
                    $kmradius=$this->distance($address_lat, $address_lng, $restaurant_latitude, $restaurant_longitude, 'K');
                    if($minimum_delivery_charges_within_km >$kmradius){
                        $cart['deliverychargemain']=$minimum_delivery_charges;
                    }else{
                        $cart['deliverychargemain']=round(($kmradius*$delivery_charges_per_km), 2);
                    }
                    $cart['deliverykm']=$kmradius;
                    
                }
            }


            if(Session::get('takeawayOption')=="true"){
                $req['delivery_option']="takeaway";   
            }else{
                $req['delivery_option']="delivery";   
            }
            if(@$req['delivery_option']=="delivery"){
                $cart['deliverycharge']=$cart['deliverychargemain'];
            }else{
                $cart['deliverycharge']=0;
                $cart['tip_amount']=0;
            }
            $cart['delivery_option']=$req['delivery_option'];
            
            $cart['tip_amount']=0;
            $cart['item'][$restaurant_id][$id] = [
                "name" => $req['name'],
                "quantity" => $req['quantity'],
                "item_price" => $req['item_price'],
                "price" => $req['price'],
                "extra_price" => $req['extra_price'],
                "extra" => @$req['extra'],
                "size" => @$req['size'],
                "image" => @$req['image'],
                "veg" => @$req['veg'],
                "iteam_extra_price" => @$req['iteam_extra_price'],
            ];
            $cart['restaurant']['id']=@$restaurant_id;
            $cart['restaurant']['name']=@$req['restaurant_name'];
            $cart['restaurant']['location']=@$req['restaurant_location'];
            $cart['restaurant']['image']=@$req['restaurant_image'];

        /*}*/
         $cart['taxValue']=$req['taxValue'];
         $tax=0;
         $tax_label='';
         if(is_array($cart['taxValue'])){
             $total_item_price=0;
             foreach ($cart['item'][$restaurant_id] as $key_cart => $value_cart) {
                
                    $total_one_item_price=$value_cart['item_price']*$value_cart['quantity'];
                    if($value_cart['iteam_extra_price']){
                        $total_one_item_price=$total_one_item_price+($value_cart['iteam_extra_price']*$value_cart['quantity']);
                    }
                    $total_item_price=$total_item_price+$total_one_item_price;
             }

                        $discount_amount=0;
                        /*Disctount*/
                        if(@$cart['coupon'] && $cart['coupon']['discountType']){ 
                                  $discountType=$cart['coupon']['discountType'];
                                  $coupon_code=$cart['coupon']['coupon_code'];
                                  $coupon_id=@$cart['coupon']['coupon_id'];
                                  $discount=$cart['coupon']['discount'];
                                if($discountType=="Fix Price"){
                                    $discount_amount=$cart['coupon']['discount'];   
                                    if($discount_amount>$total_item_price){
                                        $discount_amount=$total_item_price;
                                    }
                                }else{
                                    $discount_amount=$cart['coupon']['discount'];   
                                    $discount_amount=($total_item_price*$discount_amount)/100;
                                    if($discount_amount>$total_item_price){
                                        $discount_amount=$total;
                                    }
                                }
                        }

                        $total_item_price=$total_item_price-$discount_amount;

             if($cart['taxValue']['type']=='percent'){
                $tax=($cart['taxValue']['tax']*$total_item_price)/100;
             }else{
                $tax=$cart['taxValue']['tax'];
             }
             $tax_label=$cart['taxValue']['label'];
         }
         $cart['tax_label']=$tax_label;
         $cart['tax']=$tax;
        Session::put('cart', $cart);
        Session::save();
        $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());
        echo json_encode($res);exit;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function reorderaddToCart(Request $request)
    {   

        $req=$request->all();
        $restaurant_id=$req['restaurant_id'];
        $cart = Session::get('cart', []);
                            
        /*if(@$cart['item'] && isset($cart['item'][$restaurant_id])){
            
        }else{*/
            $cart['item']=array();
            Session::put('cart', $cart);
            Session::save();
        /*}*/
        if(@$req['deliveryCharge']){
            $cart['deliverychargemain']=$req['deliveryCharge'];
        }else{
            $cart['deliverychargemain']=0;
        }
        
        if(Session::get('takeawayOption')=="true"){
            $req['delivery_option']="takeaway";   
        }else{
            $req['delivery_option']="delivery";   
        }
        if(@$req['delivery_option']=="delivery"){
            $cart['deliverycharge']= $cart['deliverychargemain'];
        }else{
            $cart['deliverycharge']=0;
            $cart['tip_amount']=0;
        }
        $cart['delivery_option']=$req['delivery_option'];
        $cart['tip_amount']=0;
        foreach ($req['item'] as $key => $value) {

            $id=0; 
            $name=''; 
            $quantity=0; 
            $item_price=0; 
            $price=0; 
            $extra_price=0; 
            $extra=''; 
            $size=0; 
            $image=''; 
            if ($value['id']) {
               $id=$value['id'];
            } 
            if ($value['name']) {
               $name=$value['name'];
            } 
            if ($value['quantity']) {
               $quantity=$value['quantity'];
            }
            if ($value['item_price']) {
               $item_price=$value['item_price'];
            } 
            if ($value['price']) {
               $price=$value['price'];
            } 
            if ($value['extra_price']) {
               $extra_price=$value['extra_price'];
            } 
            if ($value['extra']) {
               $extra=explode(',',$value['extra']);
            }
            if ($value['size']) {
               $size=$value['size'];
            }
            if ($value['image']) {
               $image=$value['image'];
            }

            $cart['item'][$restaurant_id][$id] = [
                "name" => @$name,
                "quantity" => @$quantity,
                "item_price" => @$item_price,
                "price" => ($quantity*$price),
                "extra_price" => ($quantity*$extra_price),
                "extra" => @$extra,
                "size" => @$size,
                "image" => @$image,
            ];

        }
        
        $cart['restaurant']['id']=@$restaurant_id;
        $cart['restaurant']['name']=@$req['restaurant_name'];
        $cart['restaurant']['location']=@$req['restaurant_location'];
        $cart['restaurant']['image']=@$req['restaurant_image'];
        

        $cart['taxValue']=$req['taxValue'];
         $tax=0;
         $tax_label='';
         if(is_array($cart['taxValue'])){
             $total_item_price=0;
             foreach ($cart['item'][$restaurant_id] as $key_cart => $value_cart) {
                
                    $total_one_item_price=$value_cart['item_price']*$value_cart['quantity'];
                    if($value_cart['extra_price']){
                        $total_one_item_price=$total_one_item_price+($value_cart['extra_price']*$value_cart['quantity']);
                    }
                    $total_item_price=$total_item_price+$total_one_item_price;
             }
             if($cart['taxValue']['type']=='percent'){
                $tax=($cart['taxValue']['tax']*$total_item_price)/100;
             }else{
                $tax=$cart['taxValue']['tax'];
             }
             $tax_label=$cart['taxValue']['label'];
         }
         $cart['tax_label']=$tax_label;
         $cart['tax']=$tax;


        Session::put('cart', $cart);
        Session::save();        
        $res=array('status'=>true);
        echo json_encode($res);exit;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function orderTipAdd(Request $request)
    {   

        $req=$request->all();
        $cart = Session::get('cart', []);
        $cart['tip_amount']=$req['tip'];
        Session::put('cart', $cart);
        Session::save();
        if(@$req['is_checkout']){
            $email = Auth::user()->email;
            $user = VendorUsers::where('email',$email)->first();
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['is_checkout'=>1,'id'=>$user->uuid,'cart'=>$cart])->render());
         }else{
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());    
         }
        
        echo json_encode($res);exit;
        
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function orderDeliveryOption(Request $request)
    {   

        $req=$request->all();
        $cart = Session::get('cart', []);
        $cart['delivery_option']=$req['delivery_option'];
        if($req['delivery_option']=="takeaway"){
            //deliveryCharge
            $cart['tip_amount']=0;
            $cart['deliverycharge']=0;
        }else{
            //delivery
            if(isset($cart['deliverychargemain'])){
                $cart['deliverycharge']=$cart['deliverychargemain'];
            }else if(isset($req['deliveryCharge'])){
                $cart['deliverychargemain']=$req['deliveryCharge'];
                $cart['deliverycharge']=$cart['deliverychargemain'];
            }
        }
        
        
        Session::put('cart', $cart);
        Session::save();
        if(@$req['is_checkout']){
            $email = Auth::user()->email;
            $user = VendorUsers::where('email',$email)->first();
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['is_checkout'=>1,'id'=>$user->uuid,'cart'=>$cart])->render());
         }else{
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());    
         }
        
        echo json_encode($res);exit;
        
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function changeQuantityCart(Request $request)
    {   

        $req=$request->all();
        $id=$req['id'];
        $restaurant_id=$req['restaurant_id'];
        $quantity=$req['quantity'];
        $cart = Session::get('cart');
        
        if(isset($cart['item'][$restaurant_id][$id])) {
            if($req['quantity']==0){

                if(isset($cart['item'][$restaurant_id][$id])) {
                    unset($cart['item'][$restaurant_id][$id]);
                    Session::put('cart', $cart);
                    Session::save();
                }

            }else{
                $cart['item'][$restaurant_id][$id]['quantity']=$req['quantity'];
                $cart['item'][$restaurant_id][$id]['price'] = $cart['item'][$restaurant_id][$id]['item_price'] * $cart['item'][$restaurant_id][$id]['quantity'];
                // $cart['item'][$restaurant_id][$id]['price'] = $req['price'];
                //$cart['item'][$restaurant_id][$id]['price']= ($cart['item'][$restaurant_id][$id]['item_price'] + $cart['item'][$restaurant_id][$id]['iteam_extra_price']) * $cart['item'][$restaurant_id][$id]['quantity'];


                            
                            if(is_array($cart['taxValue'])){
                             $total_item_price=0;
                             foreach ($cart['item'][$restaurant_id] as $key_cart => $value_cart) {
                                
                                    $total_one_item_price=$value_cart['item_price']*$value_cart['quantity'];
                                    if($value_cart['iteam_extra_price']){
                                        $total_one_item_price=$total_one_item_price+($value_cart['iteam_extra_price']*$value_cart['quantity']);
                                    }
                                    $total_item_price=$total_item_price+$total_one_item_price;
                             }

                            $discount_amount=0;
                            /*Disctount*/
                            if(@$cart['coupon'] && $cart['coupon']['discountType']){ 
                                      $discountType=$cart['coupon']['discountType'];
                                      $coupon_code=$cart['coupon']['coupon_code'];
                                      $coupon_id=@$cart['coupon']['coupon_id'];
                                      $discount=$cart['coupon']['discount'];
                                    if($discountType=="Fix Price"){
                                        $discount_amount=$cart['coupon']['discount'];   
                                        if($discount_amount>$total_item_price){
                                            $discount_amount=$total_item_price;
                                        }
                                    }else{
                                        $discount_amount=$cart['coupon']['discount'];   
                                        $discount_amount=($total_item_price*$discount_amount)/100;
                                        if($discount_amount>$total_item_price){
                                            $discount_amount=$total;
                                        }
                                    }
                            }

                            $total_item_price=$total_item_price-$discount_amount;

                             if($cart['taxValue']['type']=='percent'){
                                $tax=($cart['taxValue']['tax']*$total_item_price)/100;
                             }else{
                                $tax=$cart['taxValue']['tax'];
                             }
                             $tax_label=$cart['taxValue']['label'];
                             $cart['tax_label']=$tax_label;
                             $cart['tax']=$tax;

                            }
                             

                Session::put('cart', $cart);
                Session::save();
            }


                

            }
        $cart = Session::get('cart');
        
        $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());
        echo json_encode($res);exit;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = Session::get('cart');
            $cart['item'][$request->id]["quantity"] = $request->quantity;

            if(is_array($cart['taxValue'])){
                 $total_item_price=0;
                 foreach ($cart['item'][$restaurant_id] as $key_cart => $value_cart) {
                    
                        $total_one_item_price=$value_cart['item_price']*$value_cart['quantity'];
                        if($value_cart['iteam_extra_price']){
                            $total_one_item_price=$total_one_item_price+($value_cart['iteam_extra_price']*$value_cart['quantity']);
                        }
                        $total_item_price=$total_item_price+$total_one_item_price;
                 }

                $discount_amount=0;
                /*Disctount*/
                if(@$cart['coupon'] && $cart['coupon']['discountType']){ 
                          $discountType=$cart['coupon']['discountType'];
                          $coupon_code=$cart['coupon']['coupon_code'];
                          $coupon_id=@$cart['coupon']['coupon_id'];
                          $discount=$cart['coupon']['discount'];
                        if($discountType=="Fix Price"){
                            $discount_amount=$cart['coupon']['discount'];   
                            if($discount_amount>$total_item_price){
                                $discount_amount=$total_item_price;
                            }
                        }else{
                            $discount_amount=$cart['coupon']['discount'];   
                            $discount_amount=($total_item_price*$discount_amount)/100;
                            if($discount_amount>$total_item_price){
                                $discount_amount=$total;
                            }
                        }
                }

                $total_item_price=$total_item_price-$discount_amount;

                 if($cart['taxValue']['type']=='percent'){
                    $tax=($cart['taxValue']['tax']*$total_item_price)/100;
                 }else{
                    $tax=$cart['taxValue']['tax'];
                 }
                 $tax_label=$cart['taxValue']['label'];
                 $cart['tax_label']=$tax_label;
                 $cart['tax']=$tax;
                 
                }

            Session::put('cart', $cart);
            Session::save();
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());
            echo json_encode($res);exit;
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function applyCoupon(Request $request)
    {
        if($request->coupon_code){
            $cart = Session::get('cart');
            $cart['coupon']['coupon_code']=$request->coupon_code;
            $cart['coupon']['coupon_id']=$request->coupon_id;
            $cart['coupon']['discount']=$request->discount;
            $cart['coupon']['discountType']=$request->discountType;


            if(is_array($cart['taxValue'])){
                 $total_item_price=0;
                 $id=array_key_first($cart['item']);
                 $restaurant_id=$id;
                 if($restaurant_id){
                     foreach ($cart['item'][$restaurant_id] as $key_cart => $value_cart) {
                        
                            $total_one_item_price=$value_cart['item_price']*$value_cart['quantity'];
                            if($value_cart['iteam_extra_price']){
                                $total_one_item_price=$total_one_item_price+($value_cart['iteam_extra_price']*$value_cart['quantity']);
                            }
                            $total_item_price=$total_item_price+$total_one_item_price;
                     }

                    $discount_amount=0;
                    /*Disctount*/
                    if(@$cart['coupon'] && $cart['coupon']['discountType']){ 
                              $discountType=$cart['coupon']['discountType'];
                              $coupon_code=$cart['coupon']['coupon_code'];
                              $coupon_id=@$cart['coupon']['coupon_id'];
                              $discount=$cart['coupon']['discount'];
                            if($discountType=="Fix Price"){
                                $discount_amount=$cart['coupon']['discount'];   
                                if($discount_amount>$total_item_price){
                                    $discount_amount=$total_item_price;
                                }
                            }else{
                                $discount_amount=$cart['coupon']['discount'];   
                                $discount_amount=($total_item_price*$discount_amount)/100;
                                if($discount_amount>$total_item_price){
                                    $discount_amount=$total;
                                }
                            }
                    }

                    $total_item_price=$total_item_price-$discount_amount;

                     if($cart['taxValue']['type']=='percent'){
                        $tax=($cart['taxValue']['tax']*$total_item_price)/100;
                     }else{
                        $tax=$cart['taxValue']['tax'];
                     }
                     $tax_label=$cart['taxValue']['label'];
                     $cart['tax_label']=$tax_label;
                     $cart['tax']=$tax;
                     }
            }
            Session::put('cart', $cart);
            Session::save();
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());
            echo json_encode($res);exit;
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function orderComplete(Request $request)
    {
        $cart=array();    
        Session::put('cart', $cart);
        Session::put('success', 'Your order has been successful!');
        $fcm=$request->fcm;
        $authorName=$request->authorName;
        $response = array();
        /*$fcm="ecQjqEgr3_SRGvQosRZhs5:APA91bETUYKoVEYMRuPDPfParjVxdiTIU0YD5flY4yNkaWFZ9uLC83hMSewrG9I5bpXo13WDFOfDFG7J3s4If0C4mvensGSIX6uMxoDT2FNtI2sytzLVzNxsbHa6l7cBcwIk7DV5Mp0K";*/
        if($fcm){
                $server_key = env('FIREBASE_KEY');
                if($server_key){
                    $target = $fcm;
                    /*$target="ecQjqEgr3_SRGvQosRZhs5:APA91bETUYKoVEYMRuPDPfParjVxdiTIU0YD5flY4yNkaWFZ9uLC83hMSewrG9I5bpXo13WDFOfDFG7J3s4If0C4mvensGSIX6uMxoDT2FNtI2sytzLVzNxsbHa6l7cBcwIk7DV5Mp0K";*/
                    /*$target="eE5Pq9zASCqcvAwrJuC9gm:APA91bGoMT81ZTgEGoROebTCg2WpxwtkiYw_aQL-cSkRhRIpW4FV8LiSiFswSweN4Pbu6mmQnpYYWTZZFbXezo74oGxezD-SNtfiWbsk-1d9BCzJXb_H5GxwrvdnLzaueJieqkNdo6hL";*/
                    /*$target="ecQjqEgr3_SRGvQosRZhs5:APA91bETUYKoVEYMRuPDPfParjVxdiTIU0YD5flY4yNkaWFZ9uLC83hMSewrG9I5bpXo13WDFOfDFG7J3s4If0C4mvensGSIX6uMxoDT2FNtI2sytzLVzNxsbHa6l7cBcwIk7DV5Mp0K";*/
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $fields = array();
                    $fields['priority']="high";
                    $fields['notification']['title']="New Order!";
                    $fields['notification']['body'] = $authorName." has Ordered";
                    $fields['notification']['sound'] = 'default';
                    $fields['data']['click_action'] = 'FLUTTER_NOTIFICATION_CLICK';
                    $fields['data']['id'] = '1';
                    $fields['data']['status'] = 'done';
                    if(is_array($target)){
                        $fields['registration_ids'] = $target;
                    }else{
                        $fields['to'] = $target;
                    }
                    
                    $headers = array(
                        'Content-Type:application/json',
                      'Authorization:key='.$server_key
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                    $result = curl_exec($ch);
                    if ($result === FALSE) {
                        die('FCM Send Error: ' . curl_error($ch));
                    }
                    curl_close($ch);
                    $result2 = $result;
                    $result=json_decode($result);
                    $response = array();
                    $response['target'] = $target;
                    $response['fields'] = $fields;
                    $response['result'] = $result;
                        
                }else{
                    $response = array();
                    $response['message'] = 'Firebase Server key not found!';
                    $response['target'] = '';
                    $response['fields'] = '';
                    $response['result'] = '';
                    
                }
        }
        Session::save();
        $res=array('status'=>true,'order_complete'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart,'order_complete'=>true,'is_checkout'=>1])->render(),'response'=>$response);    
        echo json_encode($res);exit;
        
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id && $request->restaurant_id) {
            $cart = Session::get('cart');

            if(isset($cart['item'][$request->restaurant_id][$request->id])) {
                unset($cart['item'][$request->restaurant_id][$request->id]);

                    if(is_array($cart['taxValue'])){
                     $total_item_price=0;
                     $id=array_key_first($cart['item']);
                     $restaurant_id=$id;
                     if($restaurant_id){
                         foreach ($cart['item'][$restaurant_id] as $key_cart => $value_cart) {
                            
                                $total_one_item_price=$value_cart['item_price']*$value_cart['quantity'];
                                if($value_cart['iteam_extra_price']){
                                    $total_one_item_price=$total_one_item_price+($value_cart['iteam_extra_price']*$value_cart['quantity']);
                                }
                                $total_item_price=$total_item_price+$total_one_item_price;
                         }

                        $discount_amount=0;
                        /*Disctount*/
                        if(@$cart['coupon'] && $cart['coupon']['discountType']){ 
                                  $discountType=$cart['coupon']['discountType'];
                                  $coupon_code=$cart['coupon']['coupon_code'];
                                  $coupon_id=@$cart['coupon']['coupon_id'];
                                  $discount=$cart['coupon']['discount'];
                                if($discountType=="Fix Price"){
                                    $discount_amount=$cart['coupon']['discount'];   
                                    if($discount_amount>$total_item_price){
                                        $discount_amount=$total_item_price;
                                    }
                                }else{
                                    $discount_amount=$cart['coupon']['discount'];   
                                    $discount_amount=($total_item_price*$discount_amount)/100;
                                    if($discount_amount>$total_item_price){
                                        $discount_amount=$total;
                                    }
                                }
                        }

                        $total_item_price=$total_item_price-$discount_amount;

                         if($cart['taxValue']['type']=='percent'){
                            $tax=($cart['taxValue']['tax']*$total_item_price)/100;
                         }else{
                            $tax=$cart['taxValue']['tax'];
                         }
                         $tax_label=$cart['taxValue']['label'];
                         $cart['tax_label']=$tax_label;
                         $cart['tax']=$tax;
                         }
                }
            
                Session::put('cart', $cart);
                Session::save();
            }
            $cart = Session::get('cart');
            session()->flash('success', 'Product removed successfully');
            $res=array('status'=>true,'html'=>view('restaurant.cart_item',['cart'=>$cart])->render());
            echo json_encode($res);exit;
        }
    }


    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
              return ($miles * 1.609344);
          } else if ($unit == "N") {
              return ($miles * 0.8684);
          } else {
              return $miles;
          }
    }

}
