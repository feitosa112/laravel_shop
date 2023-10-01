<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;


class CategoryController extends Controller
{
    
    public function getAllCategories(){
        $allCategories = CategoryModel::with('subcategories')->get();

    return view('category', compact('allCategories'));
    }
}
