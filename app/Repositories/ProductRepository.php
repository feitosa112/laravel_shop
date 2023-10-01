<?php 
namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function getProductWithCategory($id){
        return $this->productModel->where(['category_id'=>$id])->get();
    }

    public function getProductWithSubcategory($id){
        return $this->productModel->where(['subcategory_id'=>$id])->get();
    }

    public function getProductWithId($id){
        return $this->productModel->where(['id'=>$id])->get();
    }
}


?>