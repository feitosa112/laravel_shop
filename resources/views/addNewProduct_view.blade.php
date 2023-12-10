@extends('layouts.app')

@section('title')
Add new Product

@endsection

@section('content')

<div class="container fluid"style="background-color:#b4bbd6">
    <div class="row">
        <div class="col-12 col-lg-4 mx-auto">
            <h4 class="display-4">Dodaj novi proizvod</h4>

            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>

            @endforeach
            @endif
            <form action="{{route('addNewProduct')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="product_name">
                    Naziv proizvoda:
                </label>
                <input type="text" name="product_name" placeholder="product_name" value="{{old('product_name')}}" class="form-control">
                <br>
                <label for="category">Odaberi kategoriju:</label>
                <select name="category" id="" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>{{{ $category->category_name }}}</option>
                    @endforeach
                </select><br>
                <label for="price">Price:</label>
                <input type="number" name="price" placeholder="price" class="form-control" value="{{old('price')}}"><br>

                <label for="description">Description:</label><br><br>
                <textarea name="description" id="" rows="5">{{old('description')}}</textarea><br>
                <label for="image">Odaberi sliku:</label>
                <input type="file" name="product_image" value="{{old('product_image')}}" class="form-control"><br>
                <input type="file" name="product_image2" value="{{old('product_image2')}}"  class="form-control"><br>
                <input type="file" name="product_image3" value="{{old('product_image3')}}"  class="form-control"><br>
                <input type="file" name="product_image4" value="{{old('product_image4')}}"  class="form-control"><br>
                <input type="file" name="product_image5" value="{{old('product_image5')}}"  class="form-control"><br>
                <input type="file" name="product_image6" value="{{old('product_image6')}}"  class="form-control"><br>


                <button class="btn btn-primary form-control">Sacuvaj</button>
            </form>
        </div>
    </div>
</div>

@endsection
