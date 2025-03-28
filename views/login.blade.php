<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>MCCodes</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-slate-200 flex flex-col font-sans min-h-screen text-slate-700">
        <main class="flex flex-col flex-grow items-center justify-center space-y-3">
            <form action="/login.php" method="post" class="bg-slate-100 px-8 py-6 border border-slate-300 shadow-md rounded-md flex flex-col space-y-3 max-w-sm w-full">
                <div class="flex flex-col space-y-0.5">
                    <label for="email" class="text-sm text-slate-600 font-medium">Email</label>
                    <input id="email" type="email" name="email" value="{{ $email }}" autofocus autocomplete="email" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                    @if ($error)
                        <span class="text-sm text-red-500">{{ $error }}</span>
                    @endif
                </div>
                <div class="flex flex-col space-y-0.5">
                    <label for="password" class="text-sm text-slate-600 font-medium">Password</label>
                    <input id="password" type="password" name="password" autocomplete="current-password" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                </div>
                <div class="pt-3">
                    <button type="submit" class="text-sm px-3 py-2 text-white bg-blue-500 focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 focus:ring-offset-slate-50 focus:outline-none rounded font-medium">Login</button>
                </div>
            </form>
            <p class="text-sm">
                <a class="text-slate-600 hover:underline focus:underline focus:outline-none" href="/register.php">Not got an account yet ?</a>
            </p>
        </main>
    </body>
</html>
