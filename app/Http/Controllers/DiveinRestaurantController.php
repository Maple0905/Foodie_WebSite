<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorUsers;
use Illuminate\Support\Facades\Auth;
use Session;

class DiveinRestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view ('dinein.index');
    }

    public function dyiningrestaurant(){
        // $cart = session()->get('cart', []);
        return view('dinein.dinerestaurant');
    }
    
}
