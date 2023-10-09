@extends('layouts.app')

@section('title')
Edit product view
    
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h4 class="display-4 text-center">Edit product</h4>


            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif


            <form action="{{route('update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data" style="border: 1px dotted rgb(136, 136, 180)">
                @csrf

                <input type="hidden" name="id" value="{{$product->id}}">

                <label for="product_name"><p><b>Naziv proizvoda:</b></p></label>
                <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}"><br>
                
                <label for="category">Odaberi kategoriju</label>
                <select name="category" id="" class="form-control">
                  

                <option value="{{$product->category_id}}">
                    @foreach ($product->productCat as $item)
                        {{$item->category_name}}
                    @endforeach
                </option>
                 @foreach ($categories as $category)
                 <option value="{{$category->id}}">{{$category->category_name}}</option>
                     
                 @endforeach   
               
                </select><br>

                <label for="subcategory">Odaberi podkategoriju</label><br>
                <select name="subcategory" class="form-control" id="">
                    @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                    @endforeach
                </select>
                    
                <label for="price"><p><b>Cijena:</b></p></label>
                <input type="number" class="form-control" name="price" value="{{$product->price}}"><br>
                
                <label for="image"><p><b>Image:</b></p></label><br>
                <img src="/image/{{$product->product_image}}" style="width: 100px;height:100px" alt="">
                <a href="{{route('deleteImage',['id'=>$product->id])}}" class="badge badge-danger">Obrisi sliku</a><br><br>
                <input type="hidden" value="{{$product->product_image}}" name="product_image">

                <label for=""><p><b>Dodaj novu sliku:</b></p></label><br>
                <input type="file" name="newImg" class="form-control"><br><br>

                <button class="btn btn-warning form-control" type="submit">Sacuvaj</button>
            </form>
        </div>
    </div>

</div>
    
@endsection