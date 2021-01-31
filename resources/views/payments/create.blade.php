@extends('layout')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" rel="stylesheet"/>
@endsection

@section('content')

    <div id="wrapper">
        <div id="id" class="container">
            <form action="{{ route('payments.store') }}" method="post">
                @csrf
                <input type="submit" name="Make Payment" value="MakePayment"/>
            </form>
        </div>
    </div>
@endsection