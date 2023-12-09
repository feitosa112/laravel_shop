@extends('layouts.app')

@section('title')
Search result

@endsection
@section('content')
{{-- @dd(count($results)) --}}

@include('searchCard')
@include('products')

@endsection

