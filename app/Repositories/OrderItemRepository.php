<?php 
namespace App\Repositories;

use App\Models\OrderItemModel;

class OrderItemRepository {
    private $orderItemModel;

    
    public function __construct(OrderItemModel $orderItemModel) {
        $this->orderItemModel = $orderItemModel;
    }
}
?>