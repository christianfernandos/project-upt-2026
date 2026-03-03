<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kalkulator;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        $data = Kalkulator::latest()->get();
        return view('admin.kalkulator.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kalkulator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pt'      => 'required|string',
            'alamat_pt'    => 'required|string',
            'tenaga_kerja' => 'required|integer|min:1',
            'omzet_1'      => 'nullable|numeric|min:0',
            'omzet_2'      => 'nullable|numeric|min:0',
        ]);

        Kalkulator::create([
            'nama_pt'      => $request->nama_pt,
            'alamat_pt'    => $request->alamat_pt,
            'tenaga_kerja' => $request->tenaga_kerja,
            'omzet_1'      => (float) ($request->omzet_1 ?? 0),
            'omzet_2'      => (float) ($request->omzet_2 ?? 0),
        ]);

        return redirect()->route('admin.kalkulator.index')->with('toast_success', 'Data kalkulator berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kalkulator::findOrFail($id);
        return view('admin.kalkulator.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kalkulator::findOrFail($id);
        $request->validate([
            'nama_pt'      => 'required|string',
            'alamat_pt'    => 'required|string',
            'tenaga_kerja' => 'required|integer|min:1',
            'omzet_1'      => 'nullable|numeric|min:0',
            'omzet_2'      => 'nullable|numeric|min:0',
        ]);

        $data->update([
            'nama_pt'      => $request->nama_pt,
            'alamat_pt'    => $request->alamat_pt,
            'tenaga_kerja' => $request->tenaga_kerja,
            'omzet_1'      => (float) ($request->omzet_1 ?? 0),
            'omzet_2'      => (float) ($request->omzet_2 ?? 0),
        ]);

        return redirect()->route('admin.kalkulator.index')->with('toast_success', 'Data kalkulator berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kalkulator::findOrFail($id)->delete();
        return redirect()->route('admin.kalkulator.index')->with('toast_success', 'Data kalkulator berhasil dihapus');
    }
}
