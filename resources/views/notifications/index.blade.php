@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    Notifications go here!
                    <ul>
                        @forelse($notifications as $notification)
                            <li>
                                @if ($notification->type === 'App\Notifications\PaymentReceived')
                                    We have received a payment of {{ $notification->data['amount'] }} from you.
                                @endif
                            </li>
                        @empty
                            <li>You have no unread notifications at this time.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
@endsection