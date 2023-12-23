<?php
namespace App\Repositories;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SubcategoryModel;
use Illuminate\Support\Facades\Auth;

class ProductRepository {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function getProductWithCategory($name){
        $cat = CategoryModel::where('category_name',$name)->get()->first();
        $result = $this->productModel->where(['category_id'=>$cat->id])->paginate(6);


        return $result;
    }

    public function getProductWithSubcategory($name){
        $sub = SubcategoryModel::where('subcategory_name',$name)->get()->first();
        return $this->productModel->where(['subcategory_id'=>$sub->id])->paginate(6);
    }

    public function getProductWithId($name,$id){
        if(Auth::user() && Auth::user()->email !== 'admin@gmail.com' || !Auth::user()){
            $prod = ProductModel::where('product_name',$name)->where('id',$id)->get()->first();
            $this->productModel->where(['id'=>$prod->id])->increment('views');
        }
        return $this->productModel->where(['id'=>$id])->get();
    }
}


?>
