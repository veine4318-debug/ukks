<?php

namespace App\Http\Controllers;

use App\Models\websites;
use App\Models\templates;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $websites = websites::all(); 
        return view('dashboard', compact('websites'));
    }

    public function delete($id){
        websites::where('id_website', $id)->delete();
        return redirect('/');
    }
    public function tambah(){
        $templates = templates::all();
        return view('tambah', compact('templates'));

    }
    public function tambahh(Request $request)
    {
        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('logos', 'public') : null;

        $gallery = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                if ($file && $file->isValid()) {
                    $gallery[] = $file->store('gallery', 'public');
                }
            }
        }

        websites::create([
            'nama_website' => $request->nama_website,
            'id_template' => $request->template,
            'bio' => $request->bio,
            'slug' => $request->slug,
            'logo' => $logoPath,
            'gallery' => json_encode($gallery),
        ]);

        return redirect()->back();
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
