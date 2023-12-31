<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\FavoriteModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=CategoryModel::take(10)->get();
        $categories1=CategoryModel::with('subcategories')->get();
        $results = ProductModel::paginate(6);
        $paginator = $results->links()->paginator;
        $favorites = FavoriteModel::all();
        return view('welcome',['categories'=>$categories,'results'=>$results,'paginator'=>$paginator,'categories1'=>$categories1,'favorites'=>$favorites]);
    }
}
