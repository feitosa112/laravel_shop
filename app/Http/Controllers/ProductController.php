<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;

use Illuminate\Support\Facades\Session ;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct() {
        $this->productRepo = new ProductRepository();
    }
    
    public function thisCategory($id){

        $category = $this->productRepo->getProductWithCategory($id);
        
        if($category == null){
            return redirect()->back()->with('error','Odabrana kategorija nije pronadjena');
        }else{
            return view('thisCategory',compact('category'));
        }
    }

    public function thisSubCategory($id){
        $subcategory = $this->productRepo->getProductWithSubcategory($id);

        return view('thisSubCategory',compact('subcategory'));
    }

    public function getThisProduct($id){
        $product = $this->productRepo->getProductWithId($id);
        return view('thisProduct',compact('product'));
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
}
