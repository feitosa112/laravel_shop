<?php 
namespace App\Repositories;

use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class OrderRepository {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function getOrderExecute($request){
        $this->orderModel->create([
            'user_id'=>Auth::user()->id,
            'status'=>'ordered',
            'total_amount'=>$request->get('total'),
            'shipping_address' => Auth::user()->email
        ]);
    }

    
}


?>