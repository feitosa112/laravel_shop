<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\MessageModel;
use App\Models\ProductModel;
use App\Models\SubcategoryModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct() {
        $this->productRepo = new ProductRepository();
    }

    public function thisCategory($id){

        $results = $this->productRepo->getProductWithCategory($id);
        $paginator = $results->links()->paginator;
        if(count($results) === 0){
            return redirect()->back()->with('error','Nema rezultata pretrage');
        }else{
            return view('thisCategory',compact('results','paginator'));
        }
    }

    public function thisSubCategory($id){
        $results = $this->productRepo->getProductWithSubcategory($id);
        $paginator = $results->links()->paginator;

        if(count($results) === 0){
            return redirect()->back()->with('error','Nema rezultata pretrage');
        }else{
            return view('thisSubCategory',compact('results','paginator'));

        }
    }

    public function getThisProduct($id){
        $results = $this->productRepo->getProductWithId($id);
        $messages = MessageModel::with('user')->where('product_id',$id)->orderBy('created_at','desc')->get();
        return view('thisProduct',compact('results','messages'));
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

    public function showPaymentForm()
    {
        $cart = Session::get('cart',[]);
        $total = 0;
        foreach($cart as $product){
            $total+=$product->price;
        }
        return view('payment.form',compact('cart','total'));
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

        ]);

        $product = ProductModel::findOrFail($id);

        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->subcategory;


        if($request->hasFile('newImg1')){
            $product_image = $request->file('newImg1');
            $imgName = time().'1.'.$product_image->extension();
            $product_image->move(public_path('image'),$imgName);
            $product->product_image = $imgName;
        }

        if($request->hasFile('newImg2')){
            $product_image2 = $request->file('newImg2');
            $imgName2 = time().'2.'.$product_image2->extension();
            $product_image2->move(public_path('image'),$imgName2);
            $product->product_image2 = $imgName2;
        }

        if($request->hasFile('newImg3')){
            $product_image3 = $request->file('newImg3');
            $imgName3 = time().'3.'.$product_image3->extension();
            $product_image3->move(public_path('image'),$imgName3);
            $product->product_image3 = $imgName3;
        }

        if($request->hasFile('newImg4')){
            $product_image4 = $request->file('newImg4');
            $imgName4 = time().'4.'.$product_image4->extension();
            $product_image4->move(public_path('image'),$imgName4);
            $product->product_image4 = $imgName4;
        }

        if($request->hasFile('newImg5')){
            $product_image5 = $request->file('newImg5');
            $imgName5 = time().'5.'.$product_image5->extension();
            $product_image5->move(public_path('image'),$imgName5);
            $product->product_image5 = $imgName5;
        }

        if($request->hasFile('newImg6')){
            $product_image6 = $request->file('newImg6');
            $imgName6 = time().'6.'.$product_image6->extension();
            $product_image6->move(public_path('image'),$imgName6);
            $product->product_image6 = $imgName6;
        }

        $product->save();

        return redirect()->back()->with('updateProduct','Uspjesno ste sacuvali izmjene');
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
            'product_image'=>'mimes:jpg,jpeg,png',
            'product_image2'=>'mimes:jpg,jpeg,png',
            'product_image3'=>'mimes:jpg,jpeg,png',
            'product_image4'=>'mimes:jpg,jpeg,png',
            'product_image5'=>'mimes:jpg,jpeg,png',
            'product_image6'=>'mimes:jpg,jpeg,png'

        ]);

        if($request->hasFile('product_image')){
            $product_image = $request->file('product_image');
            $imgName = time().'1.'.$product_image->extension();
            $product_image->move(public_path('image'),$imgName);

        }

        if($request->hasFile('product_image2')){
            $product_image2 = $request->file('product_image2');
            $imgName2 = time().'2.'.$product_image2->extension();
            $product_image2->move(public_path('image'),$imgName2);


        }

        if($request->hasFile('product_image3')){
            $product_image3 = $request->file('product_image3');
            $imgName3 = time().'3.'.$product_image3->extension();
            $product_image3->move(public_path('image'),$imgName3);

        }

        if($request->hasFile('product_image4')){
            $product_image4 = $request->file('product_image4');
            $imgName4 = time().'4.'.$product_image4->extension();
            $product_image4->move(public_path('image'),$imgName4);

        }

        if($request->hasFile('product_image5')){
            $product_image5 = $request->file('product_image5');
            $imgName5 = time().'5.'.$product_image5->extension();
            $product_image5->move(public_path('image'),$imgName5);

        }

        if($request->hasFile('product_image6')){
            $product_image6 = $request->file('product_image6');
            $imgName6 = time().'6.'.$product_image6->extension();
            $product_image6->move(public_path('image'),$imgName6);

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

    public function deleteImage($name){

        $allProducts = ProductModel::all();
        foreach ($allProducts as $product) {
            if($product->product_image == $name){
                $product->product_image = null;
            }
            elseif($product->product_image2 == $name){
                $product->product_image2 = null;
            }
            elseif($product->product_image3 == $name){
                $product->product_image3 = null;
            }
            elseif($product->product_image4 == $name){
                $product->product_image4 = null;
            }
            elseif($product->product_image5 == $name){
                $product->product_image5 = null;
            }
            elseif($product->product_image6 == $name){
                $product->product_image6 = null;
            }
        }
        $product->save();

        return redirect()->back()->with('deleteImage','Uspjesno ste obrisali sliku');

    }


}
