<?php 
namespace App\Repositories;

use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;


class OrderRepository {
    private $orderModel;

    public function __construct(OrderModel $orderModel) {
        $this->orderModel = $orderModel;
    }

    

    public function getOrderExecute($cart){
        if(Auth::check()){
            $user = Auth::user();
            $total = 0;

            foreach($cart as $item){
                $total+=$item->price;
            }
            
        }
        
         return $this->orderModel->create([
            'user_id'=>$user->id,
            'status'=>'Naruceno',
            'total_amount'=>$total,
            'shipping_address' => $user->email
        ]);
    }

  

    
}


?>