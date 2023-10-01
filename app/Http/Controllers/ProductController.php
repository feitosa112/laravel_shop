<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct() {
        $this->productRepo = new ProductRepository();
    }
    
    public function thisCategory($id){

        $category = $this->productRepo->getProductWithCategory($id);
        
        return view('thisCategory',compact('category'));
    }

    public function thisSubCategory($id){
        $subcategory = $this->productRepo->getProductWithSubcategory($id);

        return view('thisSubCategory',compact('subcategory'));
    }

    public function getThisProduct($id){
        $product = $this->productRepo->getProductWithId($id);
        return view('thisProduct',compact('product'));
    }
}
