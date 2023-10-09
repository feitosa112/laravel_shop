@extends('layouts.app')

@section('title')
Add new Product
    
@endsection

@section('content')

<div class="container"style="background-color:#b4bbd6">
    <div class="row">
        <div class="col-4 offset-4">
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
                <input type="text" name="product_name" placeholder="product_name" class="form-control">
                <br>
                <label for="category">Odaberi kategoriju:</label>
                <select name="category" id=""class="form-control">
                    @foreach ($categories as $category)
                    
                    <option value="{{$category->id}}" >{{{$category->category_name}}}</option>
                       
                    @endforeach
                </select><br>
                <label for="price">Price:</label>
                <input type="number" name="price" placeholder="price" class="form-control"><br>

                <label for="description">Description:</label><br><br>
                <textarea name="description" id="" cols="45" rows="5"></textarea>
                <label for="image">Odaberi sliku:</label>
                <input type="file" name="image" class="form-control"><br>
                <input type="file" name="image2" class="form-control"><br>
                <input type="file" name="image3" class="form-control"><br>
                <input type="file" name="image4" class="form-control"><br>
                <input type="file" name="image5" class="form-control"><br>
                <input type="file" name="image6" class="form-control"><br>


                <button class="btn btn-primary form-control">Sacuvaj</button>
            </form>
        </div>
    </div>
</div>
    
@endsection