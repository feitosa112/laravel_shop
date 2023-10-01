<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function thisCategory($id){

        $category = ProductModel::where('category_id',$id)->get();
        
        return view('thisCategory',compact('category'));
    }

    public function thisSubCategory($id){
        $subcategory = ProductModel::where('subcategory_id',$id)->get();

        return view('thisSubCategory',compact('subcategory'));
    }
}
