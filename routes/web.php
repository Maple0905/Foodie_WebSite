<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MaintenceController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Most_PopularController;
use App\Http\Controllers\Not_FoundController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SuccessfulController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Auth\AjaxController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('home', function () {
    return view('home');
});

Route::get('login', function () {
    return view('auth.loginuser');
})->name('login');

Route::get('signup', function () {
    return view('auth.signup');
})->name('signup');




Route::get('search', function () {
    return view('search.search');
})->name('search');
Route::get('lang/change', [App\Http\Controllers\LangController::class, 'change'])->name('changeLang');

Route::post('takeaway', [App\Http\Controllers\PaymentController::class, 'takeawayOption'])->name('takeaway');

/* Auth::routes(); */
 
  Route::get('my_order', [App\Http\Controllers\OrderController::class, 'index'])->name('my_order');
  Route::get('completed_order', [App\Http\Controllers\OrderController::class, 'completedOrders'])->name('completed_order');
  Route::get('pending_order', [App\Http\Controllers\OrderController::class, 'pendingOrder'])->name('pending_order');
  Route::get('cancelled_order', [App\Http\Controllers\OrderController::class, 'cancelledOrder'])->name('cancelled_order');


  Route::get('my_dinein', [App\Http\Controllers\OrderController::class, 'myDinein'])->name('my_dinein');
  Route::get('dinein', [App\Http\Controllers\OrderController::class, 'dinein'])->name('dinein');

  Route::get('contact_us', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contact_us');

  Route::get('trending', [App\Http\Controllers\TrendingController::class, 'index'])->name('trending');

  Route::get('category/{id}', [App\Http\Controllers\RestaurantController::class, 'categoryDetail'])->name('category_detail');

  Route::get('restaurant', [App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurant');

  /*Route::get('booktable', [App\Http\Controllers\RestaurantController::class, 'index'])->name('booktable');*/


  Route::get('cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
  Route::post('add-to-cart', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('add-to-cart');
  Route::post('reorder-add-to-cart', [App\Http\Controllers\ProductController::class, 'reorderaddToCart'])->name('reorder-add-to-cart');
  
  Route::post('update-cart', [App\Http\Controllers\ProductController::class, 'update'])->name('update-cart');
  Route::post('remove-from-cart', [App\Http\Controllers\ProductController::class, 'remove'])->name('remove-from-cart');
  Route::post('change-quantity-cart', [App\Http\Controllers\ProductController::class, 'changeQuantityCart'])->name('change-quantity-cart');
  Route::post('apply-coupon', [App\Http\Controllers\ProductController::class, 'applyCoupon'])->name('apply-coupon');
  
  Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');

  Route::post('order-complete', [App\Http\Controllers\ProductController::class, 'orderComplete'])->name('order-complete');

  Route::post('order-tip-add', [App\Http\Controllers\ProductController::class, 'orderTipAdd'])->name('order-tip-add');
  Route::post('order-delivery-option', [App\Http\Controllers\ProductController::class, 'orderDeliveryOption'])->name('order-delivery-option');

  Route::get('pay', [App\Http\Controllers\CheckoutController::class, 'proccesstopay'])->name('pay');
  
  Route::post('order-proccessing', [App\Http\Controllers\CheckoutController::class, 'orderProccessing'])->name('order-proccessing');  
    
  Route::post('stripepaymentcallback', [App\Http\Controllers\PaymentController::class, 'stripePaymentcallback'])->name('stripepaymentcallback');    
  Route::post('process-stripe', [App\Http\Controllers\CheckoutController::class, 'processStripePayment'])->name('process-stripe');  
  Route::post('process-paypal', [App\Http\Controllers\CheckoutController::class, 'processPaypalPayment'])->name('process-paypal');  
  Route::post('razorpaypayment', [App\Http\Controllers\CheckoutController::class, 'razorpaypayment'])->name('razorpaypayment');  
  Route::get('success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('success');  
  Route::get('failed', [App\Http\Controllers\CheckoutController::class, 'failed'])->name('failed');  

  Route::get('notify', [App\Http\Controllers\CheckoutController::class, 'notify'])->name('notify');  

  Route::get('transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');
  
  Route::get('/offers', [App\Http\Controllers\OffersController::class, 'index'])->name('offers');

  Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/favorites', [App\Http\Controllers\FavoritesController::class, 'index'])->name('favorites');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
Route::get('/terms', [App\Http\Controllers\TermsController::class, 'index'])->name('terms');
Route::get('/privacy', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy');


Route::get('/restaurants', [App\Http\Controllers\AllRestaurantsController::class, 'index'])->name('restaurants');
Route::get('/dineinRestaurants', [App\Http\Controllers\DiveinRestaurantController::class, 'index'])->name('dineinRestaurants');

Route::get('/dyiningrestaurant', [App\Http\Controllers\DiveinRestaurantController::class, 'dyiningrestaurant'])->name('dyiningrestaurant');

Route::post('/sendnotification', [App\Http\Controllers\RestaurantController::class, 'sendnotification'])->name('sendnotification');

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('coming_soon', [App\Http\Controllers\ComingSoonController::class, 'index'])->name('coming_soon');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
Route::get('/favorites', [App\Http\Controllers\FavoritesController::class, 'index'])->name('favorites');
Route::get('/forgot_password', [App\Http\Controllers\ForgotPasswordController::class, 'index'])->name('forgot_password');
Route::get('/location', [App\Http\Controllers\LocationController::class, 'index'])->name('location');
Route::get('/maintence', [App\Http\Controllers\MaintenceController::class, 'index'])->name('maintence');
Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::get('/most_popular', [App\Http\Controllers\Most_PopularController::class, 'index'])->name('most_popular');


 Route::get('/status_canceled', [App\Http\Controllers\OrderController::class, 'statuscanceled'])->name('status_canceled');
Route::get('/status_complete', [App\Http\Controllers\OrderController::class, 'statuscomplete'])->name('status_complete');
Route::get('/status_onprocess', [App\Http\Controllers\OrderController::class, 'statusonprocess'])->name('status_onprocess');
Route::get('/not_found', [App\Http\Controllers\Not_FoundController::class, 'index'])->name('not_found');
Route::get('/offers', [App\Http\Controllers\OffersController::class, 'index'])->name('offers');
Route::get('/privacy', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/signup', [App\Http\Controllers\SignupController::class, 'index'])->name('signup');

Route::get('/successful', [App\Http\Controllers\SuccessfulController::class, 'index'])->name('successful');
Route::get('/terms', [App\Http\Controllers\TermsController::class, 'index'])->name('terms');

Route::get('/verification', [App\Http\Controllers\VerificationController::class, 'index'])->name('verification'); */



Route::post('setToken', [App\Http\Controllers\Auth\AjaxController::class,'setToken'])->name('setToken');
Route::post('logout', [App\Http\Controllers\Auth\AjaxController::class,'logout'])->name('logout');
Route::post('newRegister', [App\Http\Controllers\Auth\AjaxController::class,'newRegister'])->name('newRegister');

Route::post('sendemail/send', [App\Http\Controllers\SendEmailController::class,'send'])->name('sendContactUsMail');

Route::get('my_order/{id}', [App\Http\Controllers\OrderController::class, 'edit'])->name('orderDetails');

Route::post('add-cart-note', [App\Http\Controllers\OrderController::class, 'addCartNote'])->name('add-cart-note');


Route::get('privacypolicy', function () {
    return view('static.privacypolicy');
})->name('privacypolicy');


Route::get('termsofuse', function () {
    return view('static.termsofuse');
})->name('termofuse');


Route::get('deliveryofsupport', function () {
    return view('static.deliveryofsupport');
})->name('deliveryofsupport');

Route::get('proccesspaystack', [App\Http\Controllers\CheckoutController::class, 'proccesspaystack'])->name('proccesspaystack');


