<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramKegiatan;
use Illuminate\Http\Request;

class ProgramKegiatanController extends Controller
{
    public function index()
    {
        $data = ProgramKegiatan::latest()->get();
        return view('admin.program-kegiatan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.program-kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan'  => 'required|string',
            'kategori'       => 'required|string',
            'narasi'         => 'required|string',
            'durasi'         => 'nullable|string',
            'peserta_target' => 'nullable|string',
            'foto'           => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = 'program_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/program'), $filename);
        }

        ProgramKegiatan::create([
            'nama_kegiatan'  => $request->nama_kegiatan,
            'kategori'       => $request->kategori,
            'narasi'         => $request->narasi,
            'durasi'         => $request->durasi,
            'peserta_target' => $request->peserta_target,
            'foto'           => $filename,
        ]);

        return redirect()->route('admin.program-kegiatan.index')->with('toast_success', 'Program kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = ProgramKegiatan::findOrFail($id);
        return view('admin.program-kegiatan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ProgramKegiatan::findOrFail($id);
        $request->validate([
            'nama_kegiatan'  => 'required|string',
            'kategori'       => 'required|string',
            'narasi'         => 'required|string',
            'durasi'         => 'nullable|string',
            'peserta_target' => 'nullable|string',
            'foto'           => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('images/program/' . $data->foto))) {
                unlink(public_path('images/program/' . $data->foto));
            }
            $file     = $request->file('foto');
            $filename = 'program_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/program'), $filename);
            $data->foto = $filename;
        }

        $data->update([
            'nama_kegiatan'  => $request->nama_kegiatan,
            'kategori'       => $request->kategori,
            'narasi'         => $request->narasi,
            'durasi'         => $request->durasi,
            'peserta_target' => $request->peserta_target,
        ]);
        if ($request->hasFile('foto')) $data->save();

        return redirect()->route('admin.program-kegiatan.index')->with('toast_success', 'Program kegiatan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = ProgramKegiatan::findOrFail($id);
        if ($data->foto && file_exists(public_path('images/program/' . $data->foto))) {
            unlink(public_path('images/program/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('admin.program-kegiatan.index')->with('toast_success', 'Program kegiatan berhasil dihapus');
    }
}
