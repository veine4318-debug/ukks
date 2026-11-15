<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">
    <div class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg ring-1 ring-slate-200">
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-bold text-slate-900">Login Admin</h1>
                <p class="mt-2 text-sm text-slate-500">Masukkan username dan password untuk masuk ke dashboard.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" required>
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" required>
                </div>

                <button type="submit" class="w-full rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>