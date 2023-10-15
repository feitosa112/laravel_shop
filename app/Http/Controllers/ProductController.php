<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SubcategoryModel;
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
        
        if(count($results) === 0){
            return redirect()->back()->with('error','Nema rezultata pretrage');
        }else{
            return view('thisCategory',compact('results'));
        }
    }

    public function thisSubCategory($id){
        $results = $this->productRepo->getProductWithSubcategory($id);
        if(count($results) === 0){
            return redirect()->back()->with('error','Nema rezultata pretrage');
        }else{
            return view('thisSubCategory',compact('results'));

        }
    }

    public function getThisProduct($id){
        $results = $this->productRepo->getProductWithId($id);
        
        return view('thisProduct',compact('results'));
    }

    public function addToCart($id){
        $product = ProductModel::find($id);
        if($product->amount > 0){
            $cart = Session::get('cart',[]);
            $cart[$id] = $product;
            Session::put('cart',$cart);
            
    
            return redirect()->back()->with('success', 'Proizvod je dodat u korpu.');
        }
        else
        {
            return redirect()->back()->with('amount', 'Proizvoda nema trenutno na stanju');
        }
        
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


    public function deleteProduct($id){
        $product = ProductModel::find($id);
        $product->delete();

        return redirect()->back()->with('deleteProduct','Uspjesno ste obrisali proizvod');
    }

    public function editProductView($id){
        $product = ProductModel::with('productCat')->find($id);
        $categories = CategoryModel::all();
        $subcategories = SubcategoryModel::where('category_id',$product->category_id)->get();
        return view('editProductView',compact('product','categories','subcategories'));

    }

    public function updateProduct(Request $request,$id){
        // dd($request->file('newImg'));

        
        $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|integer',
            // 'category_id'=>'required|integer',
            'subcategory'=>'required|integer'
            // 'product_image' => 'mimes:jpg,jpeg,png'
        ]);

        $product = ProductModel::findOrFail($id);

        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->subcategory;
        

        if($request->hasFile('newImg')){
            $product_image = $request->file('newImg');
            $imgName = time().'1.'.$product_image->extension();
            $product_image->move(public_path('image'),$imgName);
            $product->product_image = $imgName;
        }else{
            $product->product_image = $request->input('product_image');
        }

        $product->save();

        return redirect()->back()->with('updateProduct','Uspjesno ste sacuvali izmjene');
    }

    public function deleteImage($id){
        $product = ProductModel::find($id);
        $product->product_image = '';
        $product->save();
        return redirect()->back()->with('deleteImage','Uspjesno ste obrisali sliku');

    }

    public function addNewProductView(){
        $categories = CategoryModel::all();
        return view('addNewProduct_view',compact('categories'));
    }

    public function addNewProduct(Request $request){
        $request->validate([
            'product_name'=>'required|string',
            'price'=>'required|integer',
            'category'=>'required|integer',
            'description'=>'required|string|min:5',
            'product_image'=>'mimes:jpg,jpeg,png'
        ]);
        if($request->hasFile('image')){
            $product_image = $request->file('image');
            $imgName = time().'1.'.$product_image->extension();
            $product_image->move(public_path('image'),$imgName);
             
        }else{
            $product_image = '';
        }

        if($request->hasFile('image2')){
            $product_image = $request->file('image2');
            $imgName2 = time().'2.'.$product_image->extension();
            $product_image->move(public_path('image2'),$imgName2);
             
        }else{
            $product_image = '';
        }

        if($request->hasFile('image3')){
            $product_image = $request->file('image3');
            $imgName3 = time().'3.'.$product_image->extension();
            $product_image->move(public_path('image3'),$imgName3);
             
        }else{
            $product_image = '';
        }

        if($request->hasFile('image4')){
            $product_image = $request->file('image4');
            $imgName4 = time().'4.'.$product_image->extension();
            $product_image->move(public_path('image4'),$imgName4);
             
        }else{
            $product_image = '';
        }

        if($request->hasFile('image5')){
            $product_image = $request->file('image5');
            $imgName5 = time().'5.'.$product_image->extension();
            $product_image->move(public_path('image5'),$imgName5);
             
        }else{
            $product_image = '';
        }

        if($request->hasFile('image6')){
            $product_image = $request->file('image6');
            $imgName6 = time().'6.'.$product_image->extension();
            $product_image->move(public_path('image6'),$imgName6);
             
        }else{
            $product_image = '';
        }

        ProductModel::create([
            'product_name'=>$request->input('product_name'),
            'price'=>$request->input('price'),
            'category_id'=>$request->category,
            'product_image'=>(isset($product_image)) ? $imgName : null,
            'product_image2' =>(isset($product_image2)) ? $imgName2 : null,
            'product_image3' =>(isset($product_image3)) ? $imgName3 : null,
            'product_image4' =>(isset($product_image4)) ? $imgName4 : null,
            'product_image5' =>(isset($product_image5)) ? $imgName5 : null,
            'product_image6' =>(isset($product_image6)) ? $imgName6 : null,


        ]);

        return redirect()->route('home')->with('addNewProduct','Uspjesno ste dodali novi proizvod');
    }

    
}
