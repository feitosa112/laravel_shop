<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends Controller
{

    public function getAllCategories(){
        $allCategories = CategoryModel::with('subcategories')->get();



        return view('category', compact('allCategories'));
    }


}
