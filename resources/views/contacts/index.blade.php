@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                'Contact should be rendered here'
            </div>
            <form action="/contact"
                  method="post"
                  class="bg-white p-6 rounded shadow-md"
                  style="width: 300px"
            >
                @csrf
                <div class="mb-5">
                    <label for="email"
                           class="block text-xs text-uppercase font-semibold mb-1"
                    >
                        Email address
                    </label>
                    <input type="text"
                           id="email"
                           name="email"
                           class="border px-2 py-1 text-sm w-full"
                    >
                    <div class="text-black-50 text-xs">{{ $errors->first('email') }}</div>
                </div>

                <button type="submit"
                        class="bg-blue-500 py-2 text-black-50 rounded-full text-sm w-full"
                >
                    Email Me
                </button>

                @if (session('message'))
                    <div class="alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </form>
        </div>
@endsection