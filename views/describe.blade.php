@extends('layouts.auth')

@section('content')
    <main class="flex flex-grow flex-col p-3 space-y-3">
        @include('partials.alerts')
        <h2 class="text-3xl text-slate-500 border-b border-slate-200 font-light flex items-end justify-between space-x-3">{{ $item->name }}</h2>
        <article class="prose prose-slate prose-sm max-w-none">
            {!! markdown($item->description) !!}
        </article>
        <hr class="border-slate-300" />
        <p class="text-right">
            <a href="/inventory" class="text-blue-500 hover:underline focus:underline focus:outline-none">Back</a>
        </p>
    </main>
@endsection
