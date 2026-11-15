<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Not Found</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 antialiased">
    <div class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-lg rounded-2xl bg-white p-8 text-center shadow-lg ring-1 ring-slate-200">
            <div class="mb-4 inline-flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-2xl text-red-600">404</div>
            <h1 class="text-3xl font-bold text-slate-900">Halaman Tidak Ditemukan</h1>
            <p class="mt-3 text-sm text-slate-600">
                URL <span class="font-semibold text-slate-800">/{{ $slug }}</span> tidak ditemukan atau portfolio belum tersedia.
            </p>
            <a href="{{ url('/') }}" class="mt-6 inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
