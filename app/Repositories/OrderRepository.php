<?php 
namespace App\Repositories;

use App\Http\Requests\OrderExecuteRequest;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class OrderRepository {
    private $orderModel;

    public function __construct(OrderModel $orderModel) {
        $this->orderModel = $orderModel;
    }

    public function getOrderExecute(OrderExecuteRequest $request){
        if(Auth::check()){
            $user = Auth::user();
            $validatedData = $request->validated();
        }
        $this->orderModel->create([
            'user_id'=>$user->id,
            'status'=>'ordered',
            'total_amount'=>$validatedData('total'),
            'shipping_address' => $user->email
        ]);
    }

    
}


?>