<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $orderRepo;
    public function __construct() {
        $this->orderRepo = new OrderRepository();
    }
   
    public function orderExecute(Request $request){

        $this->orderRepo->getOrderExecute($request);
        $cart = Session::get('cart',[]);
        Session::forget('cart');
        return redirect(route('home'))->with('orderExecute','Uspjesno ste izvrsili narudzbu');
    }
}
