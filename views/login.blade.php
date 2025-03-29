@extends('layouts.guest')

@section('content')
    <main class="flex flex-col flex-grow items-center justify-center space-y-3">
        <form action="/login" method="post" class="bg-slate-100 px-8 py-6 border border-slate-300 shadow-md rounded-md flex flex-col space-y-3 max-w-sm w-full">
            <div class="flex flex-col space-y-0.5">
                <label for="email" class="text-sm text-slate-600 font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus autocomplete="email" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-0.5">
                <label for="password" class="text-sm text-slate-600 font-medium">Password</label>
                <input id="password" type="password" name="password" autocomplete="current-password" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-3">
                <button type="submit" class="text-sm px-3 py-2 text-white bg-blue-500 focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 focus:ring-offset-slate-50 focus:outline-none rounded font-medium">Login</button>
            </div>
        </form>
        <p class="text-sm">
            <a class="text-slate-600 hover:underline focus:underline focus:outline-none" href="/register">Not got an account yet ?</a>
        </p>
    </main>
@endsection
