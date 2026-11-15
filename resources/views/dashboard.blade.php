<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100 text-slate-800 antialiased">
        <div class="min-h-screen flex">
            <aside class="w-72 bg-slate-900 text-slate-100 p-6 flex flex-col">
                <div class="mb-10 flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-400 to-blue-600 shadow-lg shadow-cyan-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2v20M2 12h20" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Admin</p>
                        <h1 class="text-xl font-bold">Innova.web</h1>
                    </div>

                </div>

                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 rounded-xl bg-slate-800 px-4 py-3 text-sm font-medium text-white shadow-inner shadow-slate-700/60">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 11.5 12 4l9 7.5" />
                            <path d="M5 10.5V20h14v-9.5" />
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('password.edit') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3" />
                            <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.11V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 9 19.4a1.7 1.7 0 0 0-1.87.34l-.06.06A2 2 0 1 1 4.24 16.8l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.11-.4H2.8a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 9a1.7 1.7 0 0 0-.34-1.87l-.06-.06A2 2 0 1 1 7.03 4.24l.06.06A1.7 1.7 0 0 0 9 4.6c.29 0 .57-.12.78-.33.21-.22.33-.5.33-.79V3.4a2 2 0 1 1 4 0v.09c0 .29.12.57.33.79.21.21.49.33.78.33.4 0 .78.14 1.11.4.33.25.56.61.64 1.02.08.4.26.78.56 1.1.3.31.7.53 1.11.6h.16a2 2 0 1 1 0 4h-.16c-.41.07-.81.29-1.11.6-.3.32-.48.7-.56 1.1-.08.41-.31.77-.64 1.02-.33.26-.71.4-1.11.4-.29 0-.57.12-.78.33-.21.21-.33.5-.33.79v.09a2 2 0 1 1-4 0v-.09c0-.29-.12-.57-.33-.79-.21-.21-.49-.33-.78-.33-.4 0-.78-.14-1.11-.4" />
                        </svg>
                        Settings
                    </a>
                </nav>

            </aside>

            <main class="flex-1 p-8">
                <header class="mb-8 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Overview</p>
                        <h2 class="mt-1 text-3xl font-bold text-slate-900">Dashboard</h2>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="/tambah" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-200 transition hover:bg-slate-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                            Tambah Website
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                                Logout
                            </button>
                        </form>
                    </div>
                </header>

                @if (session('success'))
                    <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <section class="mt-8 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="mb-5 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">Log Aktivitas</h3>
                    </div>

                    <div class="overflow-hidden rounded-xl border border-slate-200">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-slate-50 text-slate-600">
                                <tr>
                                    <th class="px-4 py-3 font-medium">Waktu</th>
                                    <th class="px-4 py-3 font-medium">Admin</th>
                                    <th class="px-4 py-3 font-medium">Aksi</th>
                                    <th class="px-4 py-3 font-medium">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @forelse ($activityLogs as $log)
                                    <tr>
                                        <td class="px-4 py-3 text-slate-600">{{ $log->created_at->format('d M Y H:i') }}</td>
                                        <td class="px-4 py-3 text-slate-800">{{ $log->admin?->name ?? 'Admin' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-700 uppercase">{{ $log->action }}</span>
                                        </td>
                                        <td class="px-4 py-3 text-slate-600">{{ $log->description }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada log aktivitas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mt-8 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="mb-5 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">Daftar Website</h3>
                        <a href="/tambah" class="text-sm font-medium text-cyan-600 hover:text-cyan-500">Lihat semua</a>
                    </div>

                    <div class="overflow-hidden rounded-xl border border-slate-200">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-slate-50 text-slate-600">
                                <tr>
                                    <th class="px-4 py-3 font-medium">Nama</th>
                                    <th class="px-4 py-3 font-medium">Template</th>
                                    <th class="px-4 py-3 font-medium">Slug</th>
                                    <th class="px-4 py-3 font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @forelse ($websites as $website)
                                    <tr>
                                        <td class="px-4 py-3 font-medium text-slate-800">{{ $website->nama_website }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ $website->id_template  }}</td>
                                        <td class="px-4 py-3">
                                            <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-700">{{ $website->slug }}</span>
                                        </td>
                                        <td class="px-4 py-3 text-slate-600">
                                            <div class="flex flex-wrap gap-2">
                                                <a href="/edit/{{ $website->id_website }}" class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-700">Edit</a>
                                                <form action="/delete/{{ $website -> id_website }}" method="POST">
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus website ini?')" class="rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600">Hapus</button>
                                                </form>
                                                <form action="/temp/{{ $website->id_website }}">
                                                    <button type="submit" class="rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600">Lihat</button>
                                                </form>
                                                <form action="{{ route('website.publish', $website->id_website) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="rounded-md {{ $website->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-blue-100 text-blue-700' }} px-2 py-1 text-xs font-medium">
                                                        {{ $website->is_published ? 'Published' : 'Publish' }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada website yang ditambahkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
