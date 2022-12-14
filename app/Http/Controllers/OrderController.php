<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorUsers;
use Illuminate\Support\Facades\Auth;
use Session;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('my_order.my_order');
    }

    public function completedOrders()
    {
        return view('my_order.completed_order');
    }

    public function myDinein()
    {
        return view('my_dinein.my_dinein');
    }

    public function dinein()
    {
        return view('my_dinein.dinein');
    }
    
    public function pendingOrder()
    {
        return view('my_order.pending_order');
    }

    public function cancelledOrder()
    {
        return view('my_order.cancelled_order');
    }

     
      public function edit($id)
    {   
        return view('my_order.edit',['id'=>$id]);
    }   

    public function addCartNote(Request $request)
    {   
        $req=$request->all();
        $addnote=$req['addnote'];
        $cart = Session::get('cart', []);
        $cart['order-note']=$addnote;
        Session::put('cart', $cart);
        Session::save();
        echo json_encode(array('success' =>true,));exit;
    }   


}
