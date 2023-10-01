<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderExecuteRequest;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $orderRepo;
    public function __construct(OrderRepository $orderRepo) {
        $this->orderRepo = $orderRepo;
    }
   
    public function orderExecute(OrderExecuteRequest $request){
        
        
        $this->orderRepo->getOrderExecute($request);
        $cart = Session::get('cart',[]);
        

        Session::forget('cart');

        return redirect(route('home'))->with('orderExecute','Uspjesno ste izvrsili narudzbu');
    }
}
