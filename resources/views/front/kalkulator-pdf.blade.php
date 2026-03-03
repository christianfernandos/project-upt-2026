<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Produktivitas — {{ $kal->nama_pt }}</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 13px;
            color: #1a1a2e;
            background: #f5f7ff;
        }

        /* ---- PRINT WRAPPER ---- */
        .pdf-wrapper {
            max-width: 800px;
            margin: 30px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(10,46,110,.12);
            overflow: hidden;
        }

        /* ---- HEADER ---- */
        .pdf-header {
            background: linear-gradient(135deg, #1a237e 0%, #1565c0 100%);
            color: #fff;
            padding: 28px 36px 20px;
            border-bottom: 4px solid #f47c20;
        }
        .pdf-header .kop-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(255,255,255,.2);
        }
        .kop-row .kop-text h1 {
            font-size: 15px;
            font-weight: 800;
            letter-spacing: .3px;
            margin-bottom: 2px;
        }
        .kop-row .kop-text p {
            font-size: 11px;
            opacity: .78;
            margin: 0;
        }
        .pdf-header .doc-title {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: .2px;
            margin-bottom: 4px;
        }
        .pdf-header .doc-subtitle {
            font-size: 12px;
            opacity: .75;
        }
        .pdf-header .doc-date {
            font-size: 11px;
            opacity: .65;
            margin-top: 6px;
        }

        /* ---- BODY ---- */
        .pdf-body { padding: 28px 36px 36px; }

        /* ---- SECTION TITLE ---- */
        .sec-title {
            font-size: 13px;
            font-weight: 700;
            color: #1a237e;
            text-transform: uppercase;
            letter-spacing: .6px;
            margin-bottom: 10px;
            padding-bottom: 6px;
            border-bottom: 2px solid #e8f0fe;
        }

        /* ---- INFO GRID ---- */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 24px;
            margin-bottom: 24px;
        }
        .info-item { display: flex; flex-direction: column; gap: 2px; }
        .info-item .lbl { font-size: 10.5px; color: #6b7280; text-transform: uppercase; letter-spacing: .4px; font-weight: 600; }
        .info-item .val { font-size: 14px; font-weight: 700; color: #1a1a2e; }

        /* ---- METRICS CARDS ---- */
        .metrics-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }
        .metric-card {
            background: #f1f5ff;
            border-radius: 10px;
            padding: 16px;
            text-align: center;
            border-top: 3px solid #1565c0;
        }
        .metric-card.orange { border-top-color: #f47c20; }
        .metric-card .mc-val { font-size: 18px; font-weight: 800; color: #1a237e; line-height: 1.1; margin-bottom: 4px; }
        .metric-card .mc-lbl { font-size: 10.5px; color: #6b7280; font-weight: 600; text-transform: uppercase; letter-spacing: .3px; }

        /* ---- OMZET TABLE ---- */
        table.omzet-tbl {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            font-size: 12.5px;
        }
        table.omzet-tbl thead th {
            background: #1a237e;
            color: #fff;
            padding: 9px 12px;
            font-weight: 600;
            text-align: center;
        }
        table.omzet-tbl tbody td {
            padding: 8px 12px;
            border-bottom: 1px solid #edf2fb;
        }
        table.omzet-tbl tbody tr:nth-child(even) { background: #f8faff; }
        table.omzet-tbl tfoot td {
            padding: 10px 12px;
            background: #e8f0fe;
            font-weight: 700;
            color: #1a237e;
        }

        /* ---- FOOTER ---- */
        .pdf-footer {
            background: #f8faff;
            border-top: 2px solid #e8f0fe;
            padding: 16px 36px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            color: #9ca3af;
        }

        /* ---- PRINT BUTTON ---- */
        .print-btn-bar {
            max-width: 800px;
            margin: 16px auto;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            padding: 0 4px;
        }
        .btn-print {
            background: linear-gradient(135deg, #1a237e, #1565c0);
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }
        .btn-back {
            background: #f1f5f9;
            color: #1a237e;
            border: 1px solid #d1d5db;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        @media print {
            body { background: #fff; }
            .pdf-wrapper { box-shadow: none; margin: 0; border-radius: 0; max-width: 100%; }
            .print-btn-bar { display: none !important; }
        }
    </style>
</head>
<body>

{{-- Print buttons (hidden on print) --}}
<div class="print-btn-bar">
    <a href="{{ route('kalkulator') }}" class="btn-back">&#8592; Kembali</a>
    <button class="btn-print" onclick="window.print()">&#128438; Cetak / Simpan PDF</button>
</div>

<div class="pdf-wrapper">

    {{-- ---- HEADER ---- --}}
    <div class="pdf-header">
        <div class="kop-row">
            <div class="kop-text">
                <h1>UPT BLP2TK Surabaya</h1>
                <p>Balai Latihan Pengembangan Produktivitas Tenaga Kerja<br>
                   Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Timur</p>
            </div>
        </div>
        <div class="doc-title">Laporan Kalkulator Produktivitas</div>
        <div class="doc-subtitle">Hasil Pengukuran Produktivitas Tenaga Kerja</div>
        <div class="doc-date">Diterbitkan: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
    </div>

    {{-- ---- BODY ---- --}}
    <div class="pdf-body">

        {{-- Identitas Perusahaan --}}
        <div class="sec-title">Identitas Perusahaan</div>
        <div class="info-grid" style="margin-bottom:20px;">
            <div class="info-item">
                <span class="lbl">Nama Perusahaan</span>
                <span class="val">{{ $kal->nama_pt }}</span>
            </div>
            <div class="info-item">
                <span class="lbl">Jumlah Tenaga Kerja</span>
                <span class="val">{{ number_format($kal->tenaga_kerja) }} Orang</span>
            </div>
            <div class="info-item">
                <span class="lbl">Alamat</span>
                <span class="val">{{ $kal->alamat_pt }}</span>
            </div>
            <div class="info-item">
                <span class="lbl">Rekomendasi TK Optimal</span>
                <span class="val">{{ number_format($kal->rekomendasi_tk) }} Orang</span>
            </div>
        </div>

        {{-- Ringkasan Kinerja --}}
        <div class="sec-title">Ringkasan Kinerja</div>
        <div class="metrics-row" style="margin-bottom:20px;">
            <div class="metric-card">
                <div class="mc-val">Rp {{ number_format($kal->total_omzet / 1e6, 1) }}M</div>
                <div class="mc-lbl">Total Omzet (2 Bulan)</div>
            </div>
            <div class="metric-card">
                <div class="mc-val">{{ number_format($kal->tenaga_kerja) }}</div>
                <div class="mc-lbl">Jumlah TK Aktual</div>
            </div>
            <div class="metric-card orange">
                <div class="mc-val">Rp {{ number_format($kal->produktivitas_per_tk / 1e6, 2) }}M</div>
                <div class="mc-lbl">Rekomendasi</div>
            </div>
        </div>

        {{-- Omzet 2 Bulan --}}
        <div class="sec-title">Rincian Omzet 2 Bulan</div>
        @php
            $bulan = ['Bulan 1', 'Bulan 2'];
            $totalOmzet = 0;
        @endphp
        <table class="omzet-tbl">
            <thead>
                <tr>
                    <th style="text-align:left;width:40px;">No</th>
                    <th style="text-align:left;">Periode</th>
                    <th style="text-align:right;">Omzet (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bulan as $idx => $namaBulan)
                @php
                    $col = 'omzet_' . ($idx + 1);
                    $val = (float) ($kal->$col ?? 0);
                    $totalOmzet += $val;
                @endphp
                <tr>
                    <td style="text-align:center;color:#6b7280;">{{ $idx + 1 }}</td>
                    <td>{{ $namaBulan }}</td>
                    <td style="text-align:right;font-weight:600;">
                        Rp {{ number_format($val, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align:right;">TOTAL OMZET (2 BULAN)</td>
                    <td style="text-align:right;">Rp {{ number_format($totalOmzet, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        {{-- Tanda Tangan --}}
        <div style="margin-top:32px;display:flex;justify-content:flex-end;">
            <div style="text-align:center;min-width:200px;">
                <p style="font-size:12px;color:#6b7280;margin-bottom:60px;">Surabaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p style="font-size:12px;font-weight:700;color:#1a237e;border-top:1px solid #1a237e;padding-top:6px;">
                    Kepala UPT BLP2TK Surabaya
                </p>
            </div>
        </div>

    </div>{{-- end pdf-body --}}

    {{-- ---- FOOTER ---- --}}
    <div class="pdf-footer">
        <span>UPT BLP2TK Surabaya — Disnakertrans Jawa Timur</span>
        <span>Dokumen dicetak pada {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} WIB</span>
    </div>

</div>{{-- end pdf-wrapper --}}

</body>
</html>
