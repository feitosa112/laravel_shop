<?php

namespace App\Http\Controllers;

use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Repositories\OrderRepository;
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

    public function orderExecuteNow($id){
        $order = $this->orderRepo->getOrderExecuteNow($id);
        OrderItemModel::create([
            'product_id'=>$id,
            'order_id'=>$order->id
        ]);
        return redirect()->back()->with('orderExecute','Uspjesno ste izvrsili narudzbu');
    }



    public function getMyOrder(){
        $id = Auth::user()->id;
        $orders = OrderModel::with('orderItems')->where('user_id',$id)->orderBy('created_at','DESC')->get();
        return view('myOrder',compact('orders'));
    }

    public function newOrder(){
        $allOrders = OrderModel::with('orderItems')->get();
        $newOrders = OrderModel::with('orderItems')->where('status','Naruceno')->get();
        return view('admin_newOrder',compact('newOrders','allOrders'));
    }

    public function newOrderView($id){
        $order = OrderModel::with('orderItems')->where('id',$id)->get();
        return view('newOrderView',compact('order'));
    }

    public function sendProduct($id){
        $order = OrderModel::find($id);
        $order->status = 'Poslano';
        $order->save();
        return redirect(route('home'))->with('isSend','Procesuirali ste narudzbu');
    }


}
