@extends('layouts.app')

@section('title')
This category
    
@endsection

@section('content')

@foreach ($category as $cat)
{{$cat->product_name}}
    
@endforeach
    
@endsection