@extends('layouts.app')

@section('title')
All categories
    
@endsection

@section('content')

<div class="container">
    <div class="row">
       @foreach ($allCategories as $category)
       
       
       <div class="col-2">
        <h6><a style="text-decoration: none;color:black" href="{{route('thisCategory',['id'=>$category->id])}}">{{$category->category_name}} ({{count(App\Models\ProductModel::where('category_id',$category->id)->get())}})</a></h6>
        @foreach ($category->subcategories as $subcategory)
        <p><a href="{{route('thisSubCategory',['id'=>$subcategory->id])}}" style="text-decoration: none;color:black">{{$subcategory->subcategory_name}} ({{count(App\Models\ProductModel::where('subcategory_id',$subcategory->id)->get())}})</a></p>

            
        @endforeach
       </div>
           
       @endforeach
    </div>
</div>
    
@endsection