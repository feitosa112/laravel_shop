@extends('layouts.app')

@section('title')
All categories
    
@endsection

@section('content')
<div class="container">
    <div class="row">
       @foreach ($allCategories as $category)

       <div class="col-2">
        <h6><a style="text-decoration: none;color:black" href="">{{$category->category_name}}</a></h6>
        @foreach ($category->subcategories as $subcategory)
        <p><a href="" style="text-decoration: none;color:black">{{$subcategory->subcategory_name}}</a></p>

            
        @endforeach
       </div>
           
       @endforeach
    </div>
</div>
    
@endsection