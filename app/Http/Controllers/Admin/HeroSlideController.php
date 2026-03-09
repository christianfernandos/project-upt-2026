<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HeroSlideController extends Controller
{
    public function index()
    {
        $data = HeroSlide::orderBy('urutan')->get();
        return view('admin.hero-slide.index', compact('data'));
    }

    public function create()
    {
        return view('admin.hero-slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'nullable|string|max:200',
            'subjudul'=> 'nullable|string|max:200',
            'foto'    => 'required|image|mimes:png,jpg,jpeg,webp|max:5120',
            'urutan'  => 'nullable|integer|min:0',
        ]);

        $file     = $request->file('foto');
        $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/hero'), $filename);

        HeroSlide::create([
            'judul'   => $request->judul,
            'subjudul'=> $request->subjudul,
            'foto'    => $filename,
            'urutan'  => $request->urutan ?? 0,
            'aktif'   => $request->has('aktif') ? 1 : 0,
        ]);

        return redirect()->route('admin.hero-slide.index')
                         ->with('toast_success', 'Slide hero berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = HeroSlide::findOrFail($id);
        return view('admin.hero-slide.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = HeroSlide::findOrFail($id);

        $request->validate([
            'judul'   => 'nullable|string|max:200',
            'subjudul'=> 'nullable|string|max:200',
            'foto'    => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5120',
            'urutan'  => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('images/hero/' . $data->foto))) {
                unlink(public_path('images/hero/' . $data->foto));
            }
            $file     = $request->file('foto');
            $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hero'), $filename);
            $data->foto = $filename;
        }

        $data->update([
            'judul'   => $request->judul,
            'subjudul'=> $request->subjudul,
            'urutan'  => $request->urutan ?? $data->urutan,
            'aktif'   => $request->has('aktif') ? 1 : 0,
        ]);

        if ($request->hasFile('foto')) $data->save();

        return redirect()->route('admin.hero-slide.index')
                         ->with('toast_success', 'Slide hero berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = HeroSlide::findOrFail($id);
        if ($data->foto && file_exists(public_path('images/hero/' . $data->foto))) {
            unlink(public_path('images/hero/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('admin.hero-slide.index')
                         ->with('toast_success', 'Slide hero berhasil dihapus');
    }
}
