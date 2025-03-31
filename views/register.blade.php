@extends('layouts.guest')

@section('content')
    <main>
        <form action="/register" method="post">
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" maxlength="25" value="{{ old('name') }}" autofocus autocomplete="name" required />
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" maxlength="255" value="{{ old('email') }}" autocomplete="email" required />
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" autocomplete="new-password" required />
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="confirm">Confirm Password</label>
                <input id="confirm" type="password" name="confirm" autocomplete="off" required />
                @error('confirm')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <footer>
                <button type="submit">Register</button>
            </footer>
        </form>
        <p>
            <a href="/login">Already got an account ?</a>
        </p>
    </main>
@endsection
