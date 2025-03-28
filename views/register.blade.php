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
            <form action="/register.php" method="post" class="bg-slate-100 px-8 py-6 border border-slate-300 shadow-md rounded-md flex flex-col space-y-3 max-w-sm w-full">
                <div class="flex flex-col space-y-0.5">
                    <label for="name" class="text-sm text-slate-600 font-medium">Name</label>
                    <input id="name" type="text" name="name" maxlength="25" value="{{ $name }}" autofocus autocomplete="name" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                    @if (array_key_exists('name', $errors))
                        <span class="text-sm text-red-500">{{ $errors['name'] }}</span>
                    @endif
                </div>
                <div class="flex flex-col space-y-0.5">
                    <label for="email" class="text-sm text-slate-600 font-medium">Email</label>
                    <input id="email" type="email" name="email" maxlength="255" value="{{ $email }}" autocomplete="email" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                    @if (array_key_exists('email', $errors))
                        <span class="text-sm text-red-500">{{ $errors['email'] }}</span>
                    @endif
                </div>
                <div class="flex flex-col space-y-0.5">
                    <label for="password" class="text-sm text-slate-600 font-medium">Password</label>
                    <input id="password" type="password" name="password" autocomplete="new-password" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                    @if (array_key_exists('password', $errors))
                        <span class="text-sm text-red-500">{{ $errors['password'] }}</span>
                    @endif
                </div>
                <div class="flex flex-col space-y-0.5">
                    <label for="confirm" class="text-sm text-slate-600 font-medium">Confirm Password</label>
                    <input id="confirm" type="password" name="confirm" autocomplete="off" required class="border border-slate-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:border-blue-500 focus:ring-blue-500 p-2 bg-slate-50 w-full rounded" />
                </div>
                <div class="pt-3">
                    <button type="submit" class="text-sm px-3 py-2 text-white bg-blue-500 focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 focus:ring-offset-slate-50 focus:outline-none rounded font-medium">Register</button>
                </div>
            </form>
            <p class="text-sm">
                <a class="text-slate-600 hover:underline focus:underline focus:outline-none" href="/login.php">Already got an account ?</a>
            </p>
        </main>
    </body>
</html>
