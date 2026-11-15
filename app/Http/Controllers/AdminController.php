<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\websites;
use App\Models\templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $websites = websites::all();
        $activityLogs = ActivityLog::with('admin')->latest()->take(10)->get();

        return view('dashboard', compact('websites', 'activityLogs'));
    }

    private function recordActivity(string $action, string $description): void
    {
        ActivityLog::create([
            'admin_id' => Auth::id(),
            'action' => $action,
            'description' => $description,
        ]);
    }

    public function showUpdatePassword()
    {
        return view('admin.update-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Password lama tidak sesuai.');
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        $this->recordActivity('password_update', 'Admin ' . Auth::user()->name . ' memperbarui password akun.');

        return redirect('/')->with('success', 'Password admin berhasil diperbarui.');
    }

    public function delete($id)
    {
        $website = websites::where('id_website', $id)->firstOrFail();

        $websiteName = $website->nama_website;

        $website->delete();

        $this->recordActivity('delete', 'Admin ' . Auth::user()->name . ' menghapus website "' . $websiteName . '".');

        return redirect('/')->with('success', 'Website berhasil dihapus.');
    }

    public function tambah()
    {
        $templates = templates::all();

        return view('tambah', compact('templates'));
    }

    public function tambahh(Request $request)
    {
        $request->validate([
            'nama_website' => 'required|string|max:225',
            'bio' => 'nullable|string|max:225',
            'slug' => ['required', 'string', 'max:225', 'alpha_dash', 'unique:websites,slug'],
            'template' => 'required|exists:templates,id_template',
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gallery' => ['nullable', 'array', 'max:6'],
            'gallery.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('logos', 'public') : null;

        $gallery = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                if ($file && $file->isValid()) {
                    $gallery[] = $file->store('gallery', 'public');
                }
            }
        }

        $website = websites::create([
            'nama_website' => $request->nama_website,
            'id_template' => $request->template,
            'bio' => $request->bio,
            'slug' => $request->slug,
            'logo' => $logoPath,
            'gallery' => json_encode($gallery),
        ]);

        $this->recordActivity('create', 'Admin ' . Auth::user()->name . ' menambahkan website "' . $website->nama_website . '".');

        return redirect('/')->with('success', 'Website berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $website = websites::where('id_website', $id)->firstOrFail();
        $templates = templates::all();

        return view('edit', compact('website', 'templates'));
    }

    public function update(Request $request, $id)
    {
        $website = websites::where('id_website', $id)->firstOrFail();

        $request->validate([
            'nama_website' => 'required|string|max:225',
            'bio' => 'nullable|string|max:225',
            'slug' => ['required', 'string', 'max:225', 'alpha_dash', Rule::unique('websites', 'slug')->ignore($website->id_website, 'id_website')],
            'template' => 'required|exists:templates,id_template',
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gallery' => ['nullable', 'array', 'max:6'],
            'gallery.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data = [
            'nama_website' => $request->nama_website,
            'id_template' => $request->template,
            'bio' => $request->bio,
            'slug' => $request->slug,
        ];

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];

            foreach ($request->file('gallery') as $file) {
                if ($file && $file->isValid()) {
                    $gallery[] = $file->store('gallery', 'public');
                }
            }

            $data['gallery'] = json_encode($gallery);
        }

        $website->update($data);

        $this->recordActivity('update', 'Admin ' . Auth::user()->name . ' memperbarui website "' . $website->nama_website . '".');

        return redirect('/')->with('success', 'Website berhasil diperbarui.');
    }

    public function publicPortfolio($slug)
    {
        $website = websites::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (!$website) {
            return view('errors.404', ['slug' => $slug]);
        }

        $gallery = $website->gallery;

        if (is_string($gallery)) {
            $gallery = json_decode($gallery, true) ?: [];
        }

        $website->gallery = is_array($gallery) ? $gallery : [];

        return view('templates.model', ['websites' => $website]);
    }

    public function publish($id)
    {
        $website = websites::where('id_website', $id)->firstOrFail();

        $gallery = is_string($website->gallery) ? json_decode($website->gallery, true) : $website->gallery;
        $gallery = is_array($gallery) ? $gallery : [];

        $isComplete = !empty($website->nama_website)
            && !empty($website->bio)
            && !empty($website->slug)
            && !empty($website->logo)
            && count($gallery) > 0;

        if (!$isComplete) {
            return redirect('/')->withErrors([
                'publish' => 'Portfolio belum lengkap. Lengkapi nama website, bio, slug, logo, dan gallery sebelum publish.',
            ]);
        }

        $website->update([
            'is_published' => true,
            'published_at' => now(),
        ]);

        $this->recordActivity('publish', 'Admin ' . Auth::user()->name . ' mempublikasikan website "' . $website->nama_website . '".');

        return redirect('/')->with('success', 'Portfolio berhasil dipublikasikan. URL publik: ' . url('/' . $website->slug));
    }

    public function template($id)
    {
        $websites = websites::where('id_website', $id)->firstOrFail();

        $gallery = $websites->gallery;

        if (is_string($gallery)) {
            $gallery = json_decode($gallery, true) ?: [];
        }

        $websites->gallery = is_array($gallery) ? $gallery : [];

        return view('templates.model', compact('websites'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_website' => 'required|string|max:225',
            'bio' => 'nullable|string|max:225',
            'slug' => 'required|string|max:225|alpha_dash|unique:websites,slug',
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gallery' => ['nullable', 'array', 'max:6'],
            'gallery.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
    }
}
