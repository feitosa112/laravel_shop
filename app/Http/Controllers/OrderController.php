<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderExecuteRequest;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private $orderRepo;
    

    public function __construct(OrderRepository $orderRepo) {
        $this->orderRepo = $orderRepo;
    }

    
   
    public function orderExecute(){
        
    $cart = Session::get('cart',[]);

    if($cart != null){
        $order = $this->orderRepo->getOrderExecute($cart);
        
        foreach($cart as $product){
            OrderItemModel::create([
                'product_id' => $product->id,
                'order_id' => $order->id
            ]);
        }
    }
        

        Session::forget('cart');

        return redirect(route('home'))->with('orderExecute','Uspjesno ste izvrsili narudzbu');
    }

    public function getMyOrder(){
        $id = Auth::user()->id;
        $orders = OrderModel::with('orderItems')->where('user_id',$id)->orderBy('created_at','DESC')->get();
        return view('myOrder',compact('orders'));
    }

    public function newOrder(){
        $allOrders = OrderModel::with('orderItems')->get();
        $newOrders = OrderModel::with('orderItems')->where('status','ordered')->get();
        return view('admin_newOrder',compact('newOrders','allOrders'));
    }
}
