<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>MCCodes</title>
        <link href="/app.css?x={{ md5(random_bytes(256)) }}" rel="stylesheet" />
    </head>
    <body class="auth">
        <div>
            <img src="/masthead.jpeg" alt="MCCodes ... reborn" />
            <div>
                @include('partials.sidebar')
                @yield('content')
            </div>
        </div>
    </body>
</html>
