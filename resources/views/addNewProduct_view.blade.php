@extends('layouts.app')

@section('title')
Add new Product
    
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4 offset-1">
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

                <label for="image">Odaberi sliku:</label>
                <input type="file" name="image" class="form-control"><br>

                <button class="btn btn-primary form-control">Sacuvaj</button>
            </form>
        </div>
    </div>
</div>
    
@endsection