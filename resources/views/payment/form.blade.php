@extends('layouts.app')
@section('content')

<h1>Plaćanje</h1>
@if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>

            @endforeach
            @endif
    <form action="{{ route('payment.process',['id'=>$productOrder->id]) }}" method="post" class="form-control">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="{{ config('services.stripe.key') }}"
            data-amount="1"
            data-name={{Auth::user()->email}}
            data-description="Pay with card"

            data-locale="auto"
            data-currency="usd">
        </script>
    </form>

@endsection
