@extends('layouts.guest')

@section('content')
    <main>
        <form action="/login" method="post">
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="email" required />
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" autocomplete="current-password" required />
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <footer>
                <button type="submit">Login</button>
            </footer>
        </form>
        <p>
            <a href="/register">Not got an account yet ?</a>
        </p>
    </main>
@endsection
