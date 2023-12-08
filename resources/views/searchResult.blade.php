@extends('layouts.app')

@section('title')
Search result

@endsection
@section('content')
{{-- @dd(count($results)) --}}

<div class="col-6 offset-3">
    <form action="{{route('search')}}">
        <div class="input-group mb-3">
            <input type="text" placeholder="Search" name="search" class="form-control">
            <div class="input-group-append">
                <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
            </div>
        </div>
    </form>

</div>
@include('products')

@endsection

