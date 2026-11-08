<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tambah Website</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100 text-slate-800 antialiased">
        <div class="min-h-screen p-6 md:p-10">
            <div class="mx-auto max-w-4xl">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Website</p>
                        <h1 class="text-3xl font-bold text-slate-900">Tambah Website</h1>
                    </div>
                    <a href="/" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                        Kembali
                    </a>
                </div>
                

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/tambahh" enctype="multipart/form-data" class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 md:p-8">
                    @csrf

                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label for="nama_website" class="block text-sm font-medium text-slate-700">Nama Website</label>
                            <input id="nama_website" name="nama_website" type="text" value="{{ old('nama_website') }}" placeholder="Contoh: Innova Studio" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-cyan-500 focus:bg-white" required />
                        </div>

                        <div class="space-y-2">
                            <label for="slug" class="block text-sm font-medium text-slate-700">Slug</label>
                            <input id="slug" name="slug" type="text" value="{{ old('slug') }}" placeholder="contoh: innova-studio" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-cyan-500 focus:bg-white" required />
                        </div>
                    </div>

                    <div class="mt-6 space-y-2">
                        <label for="bio" class="block text-sm font-medium text-slate-700">Bio</label>
                        <textarea id="bio" name="bio" rows="4" placeholder="Deskripsikan website Anda..." class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-cyan-500 focus:bg-white">{{ old('bio') }}</textarea>
                    </div>

                    <div class="mt-6 grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label for="template" class="block text-sm font-medium text-slate-700">Pilih Template</label>
                            <select id="template" name="template" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-cyan-500 focus:bg-white" required>
                                <option value="">-- Pilih template --</option>
                                @foreach ( $templates as $add )
                                     <option value="{{ $add -> id_template }}">{{ $add -> nama_template }}</option>
                                @endforeach
                               
                            </select>
                        </div>
                                    
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-700">Logo</label>
                            <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-4">
                                <input id="logo" name="logo" type="file" accept="image/*" class="hidden" />
                                <label for="logo" class="flex cursor-pointer items-center justify-center gap-2 rounded-xl bg-white px-4 py-3 text-sm font-medium text-slate-700 shadow-sm ring-1 ring-slate-200 transition hover:bg-slate-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 16V4M7 9l5-5 5 5" />
                                        <path d="M4 17.5v1A2.5 2.5 0 0 0 6.5 21h11A2.5 2.5 0 0 0 20 18.5v-1" />
                                    </svg>
                                    Pilih Logo
                                </label>
                                <img id="logoPreview" class="mt-4 hidden max-h-28 rounded-xl object-cover shadow-sm ring-1 ring-slate-200" alt="Preview logo" />
                            </div>
                        </div>
                    </div>
                 
                
                     <div class="mt-6">
                        <label class="block text-sm font-medium text-slate-700">Gallery (6 Gambar)</label>
                        <div class="mt-3 grid gap-4 md:grid-cols-3">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-3">
                                    <label for="gallery_{{ $i }}" class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Gambar {{ $i }}</label>
                                    <input
                                        id="gallery_{{ $i }}"
                                        name="gallery[]"
                                        type="file"
                                        accept="image/*"
                                        class="block w-full text-sm text-slate-600 file:mr-3 file:rounded-xl file:border-0 file:bg-slate-900 file:px-3 file:py-2 file:text-sm file:font-medium file:text-white"
                                    />
                                </div>
                            @endfor
                        </div>
                    </div>
                    
                    <div class="mt-6 grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label for="whatsapp" class="block text-sm font-medium text-slate-700">WhatsApp</label>
                            <input id="whatsapp" name="whatsapp" type="text" value="{{ old('whatsapp') }}" placeholder="Contoh: 628123456789" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-cyan-500 focus:bg-white" />
                        </div>

                        <div class="space-y-2">
                            <label for="instagram" class="block text-sm font-medium text-slate-700">Instagram</label>
                            <input id="instagram" name="instagram" type="text" value="{{ old('instagram') }}" placeholder="Contoh: @username" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-cyan-500 focus:bg-white" />
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-200 transition hover:bg-slate-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12.5 9.5 17 19 7.5" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const logoInput = document.getElementById('logo');
            const logoPreview = document.getElementById('logoPreview');

            logoInput.addEventListener('change', function (event) {
                const file = event.target.files[0];

                if (!file) {
                    logoPreview.classList.add('hidden');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    logoPreview.src = e.target.result;
                    logoPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            });
        </script>
    </body>
</html>
