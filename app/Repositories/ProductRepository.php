<?php
namespace App\Repositories;

use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

class ProductRepository {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function getProductWithCategory($id){
        $result = $this->productModel->where(['category_id'=>$id])->paginate(6);


        return $result;
    }

    public function getProductWithSubcategory($id){
        return $this->productModel->where(['subcategory_id'=>$id])->paginate(6);
    }

    public function getProductWithId($id){
        if(Auth::user() && Auth::user()->email !== 'admin@gmail.com' || !Auth::user()){
            $this->productModel->where(['id'=>$id])->increment('views');
        }
        return $this->productModel->where(['id'=>$id])->get();
    }
}


?>
