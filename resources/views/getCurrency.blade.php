@extends('layouts.app')

@section('title')
Exchange rate
@endsection
@section('content')

<div class="container text-center">
    <div class="row">
        <a href="{{route('todaysExchangeRate')}}" class="btn btn-info" style="color:white;font-weight:600;letter-spacing:3px">Klikni da azuriras kursnu listu</a>
    </div><br>
    <div class="row">
        <div class="col-6 offset-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Currency</th>
                        <th scope="col">ExchangeRate</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($todaysExchangeRate as $ex)
                    <tr>
                        <td>{{$ex->currency}}</td>
                        <td>{{$ex->value}}</td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
    
@endsection