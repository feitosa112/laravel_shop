@extends('layouts.app')

@section('title')

Subcategory
    
@endsection

@section('content')

@foreach ($subcategory as $sub)
{{$sub->product_name}}
    
@endforeach
    
@endsection