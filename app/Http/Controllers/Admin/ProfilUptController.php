<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilUpt;
use Illuminate\Http\Request;

class ProfilUptController extends Controller
{
    public function index()
    {
        $data = ProfilUpt::firstOrCreate(['id' => 1]);
        return view('admin.profil-upt.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = ProfilUpt::firstOrCreate(['id' => 1]);

        // --- Profil UPT (existing) ---
        $data->tugas_fungsi = $request->tugas_fungsi;
        $data->visi         = $request->visi;
        $data->misi         = $request->misi;

        // --- Tentang Kami ---
        $data->tentang_judul      = $request->tentang_judul;
        $data->tentang_subjudul   = $request->tentang_subjudul;
        $data->tentang_deskripsi_1 = $request->tentang_deskripsi_1;
        $data->tentang_deskripsi_2 = $request->tentang_deskripsi_2;

        // Fitur: pisahkan per baris, buang yang kosong
        $fiturRaw = $request->tentang_fitur ?? '';
        $data->tentang_fitur = array_values(array_filter(
            array_map('trim', explode("\n", $fiturRaw))
        ));

        // --- Keunggulan (3 kolom: icon, title, desc) ---
        $icons  = $request->input('keunggulan_icon',  []);
        $titles = $request->input('keunggulan_title', []);
        $descs  = $request->input('keunggulan_desc',  []);
        $keunggulan = [];
        foreach ($icons as $i => $icon) {
            if (!empty($titles[$i])) {
                $keunggulan[] = [
                    'icon'  => $icon,
                    'title' => $titles[$i],
                    'desc'  => $descs[$i] ?? '',
                ];
            }
        }
        $data->keunggulan = $keunggulan;

        // --- Layanan Kami (icon, title, desc, bg, color) ---
        $layIcons  = $request->input('layanan_icon',  []);
        $layTitles = $request->input('layanan_title', []);
        $layDescs  = $request->input('layanan_desc',  []);
        $layBgs    = $request->input('layanan_bg',    []);
        $layColors = $request->input('layanan_color', []);
        $layanan = [];
        foreach ($layTitles as $i => $title) {
            if (!empty($title)) {
                $layanan[] = [
                    'icon'  => $layIcons[$i]  ?? 'bi-star',
                    'title' => $title,
                    'desc'  => $layDescs[$i]  ?? '',
                    'bg'    => $layBgs[$i]    ?? '#e8f0fe',
                    'color' => $layColors[$i] ?? '#1a237e',
                ];
            }
        }
        $data->layanan = $layanan;

        // --- Foto struktur ---
        if ($request->hasFile('foto_struktur')) {
            $request->validate(['foto_struktur' => 'image|mimes:png,jpg,jpeg|max:5120']);
            if ($data->foto_struktur && file_exists(public_path('images/profil/' . $data->foto_struktur))) {
                unlink(public_path('images/profil/' . $data->foto_struktur));
            }
            $file = $request->file('foto_struktur');
            $filename = 'struktur_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profil'), $filename);
            $data->foto_struktur = $filename;
        }

        // --- Foto tentang ---
        if ($request->hasFile('foto_tentang')) {
            $request->validate(['foto_tentang' => 'image|mimes:png,jpg,jpeg|max:5120']);
            if ($data->foto_tentang && file_exists(public_path('images/profil/' . $data->foto_tentang))) {
                unlink(public_path('images/profil/' . $data->foto_tentang));
            }
            $file = $request->file('foto_tentang');
            $filename = 'tentang_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profil'), $filename);
            $data->foto_tentang = $filename;
        }

        $data->save();
        return redirect()->route('admin.profil-upt.index')->with('toast_success', 'Profil UPT berhasil diperbarui');
    }
}
