<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct() {
        $this->productRepo = new ProductRepository();
    }
    
    public function thisCategory($id){

        $results = $this->productRepo->getProductWithCategory($id);
        
        if($results == null){
            return redirect()->back()->with('error','Odabrana kategorija nije pronadjena');
        }else{
            return view('thisCategory',compact('results'));
        }
    }

    public function thisSubCategory($id){
        $results = $this->productRepo->getProductWithSubcategory($id);

        return view('thisSubCategory',compact('results'));
    }

    public function getThisProduct($id){
        $results = $this->productRepo->getProductWithId($id);
        return view('thisProduct',compact('results'));
    }

    public function addToCart($id){
        $product = ProductModel::find($id);
        $cart = Session::get('cart',[]);
        $cart[$id] = $product;
        Session::put('cart',$cart);
        

        return redirect()->back()->with('success', 'Proizvod je dodat u korpu.');
    }

    public function cartView(){
        $cart = Session::get('cart',[]);
        $total = 0;
        foreach($cart as $product){
            $total+=$product->price;
        }
        return view('cart',compact('cart','total'));
    }

    public function deleteFromCart($id){
        $cart = Session::get('cart',[]);
        if(array_key_exists($id,$cart)){
            unset($cart[$id]);

            Session::put('cart',$cart);

            return redirect()->back()->with('deleteFromCart','Uspjesno ste obrisali proizvod iz korpe');
        }else{
            return redirect()->back()->with('errorDeleteFromCart','Greska,pokusajte ponovo');
        }
    }

    public function search(Request $request){
        $keyword = strtoupper($request->input('search'));
        
        $results = DB::table('product')
    ->select('product.*', 'categories.category_name', 'subcategories.subcategory_name')
    ->leftJoin('categories', 'product.category_id', '=', 'categories.id')
    ->leftJoin('subcategories', 'product.subcategory_id', '=', 'subcategories.id')
    ->where('product.product_name', 'LIKE', "%$keyword%")
    ->orWhere('categories.category_name', 'LIKE', "%$keyword%")
    ->orWhere('subcategories.subcategory_name', 'LIKE', "%$keyword%")
    ->get();
        if(count($results) === 0){
            return redirect()->back()->with('noSearch','Trazeni pojam nije pronadjen');
        }else{
            return view('searchResult',compact('results'));

        }
    }
}
