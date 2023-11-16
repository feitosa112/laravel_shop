@extends('layouts.app')
@section('content')

<h1>Plaćanje</h1>
    
    <form action="{{ route('payment.process') }}" method="post">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="{{ config('services.stripe.key') }}"
            data-amount="999"
            data-name="Naziv vaše kompanije"
            data-description="Opis plaćanja"
            data-image="putanja/do/vaseg/loga.png"
            data-locale="auto"
            data-currency="usd">
        </script>
    </form>
    
@endsection