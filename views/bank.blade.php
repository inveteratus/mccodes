@extends('layouts.auth')

@section('content')
    <main class="bank">
        @include('partials.alerts')

        <h2 class="text-3xl text-slate-500 border-b border-slate-200 font-light flex items-end justify-between space-x-3">National Bank</h2>

        <div>
            <div>
                <header>
                    <h3>Deposit</h3>
                    <p>{{ number_format($user->money) }} Cr Available</p>
                </header>

                @if ($deposit)
                    <form action="/bank/deposit" method="post" class="deposit">
                        @foreach ($deposit as $button)
                            <button type="submit" name="amount" value="{{ $button }}">{{ number_format($button) }}</button>
                        @endforeach
                    </form>
                @else
                    <p>
                        <span>Insufficient Funds</span>
                    </p>
                @endif
            </div>
            <div>
                <header>
                    <h3>Withdraw</h3>
                    <p>{{ number_format($user->bankmoney) }} Cr Available</p>
                </header>

                @if ($withdraw)
                    <form action="/bank/withdraw" method="post" class="withdraw">
                        @foreach ($withdraw as $button)
                            <button type="submit" name="amount" value="{{ $button }}">{{ number_format($button) }}</button>
                        @endforeach
                    </form>
                @else
                    <p>
                        <span>Insufficient Funds</span>
                    </p>
                @endif
            </div>
        </div>
    </main>
@endsection
