<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Update Password Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100 text-slate-800 antialiased">
        <div class="min-h-screen flex items-center justify-center p-6">
            <div class="w-full max-w-xl rounded-2xl bg-white p-8 shadow-lg ring-1 ring-slate-200">
                <div class="mb-6">
                    <p class="text-sm font-medium text-slate-500">Admin</p>
                    <h1 class="mt-1 text-3xl font-bold text-slate-900">Update Password</h1>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="current_password" class="mb-2 block text-sm font-medium text-slate-700">Password lama</label>
                        <input id="current_password" type="password" name="current_password" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" required>
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password baru</label>
                        <input id="password" type="password" name="password" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-700">Konfirmasi password baru</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" required>
                    </div>

                    <div class="flex items-center justify-between gap-3 pt-2">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                            Kembali
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Simpan Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
