<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>MCCodes</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link href="/app.css" rel="stylesheet" />
    </head>
    <body class="bg-slate-200 flex flex-col font-sans min-h-screen text-slate-700">
        <div class="bg-slate-50 max-w-5xl mx-auto w-full flex flex-col shadow-lg">
            <img src="/masthead.jpeg" alt="MCCodes ... reborn" />
            <div class="flex">
                @include('partials.sidebar')
                @yield('content')
            </div>
        </div>
    </body>
</html>
