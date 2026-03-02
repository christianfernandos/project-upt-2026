<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('program_kegiatan')->truncate();

        $programs = [

            // ──────────────────────────────────────────────────────────────
            // 1. PELATIHAN KERJA
            // ──────────────────────────────────────────────────────────────
            [
                'nama_kegiatan'  => 'Pelatihan Teknisi Komputer dan Jaringan',
                'kategori'       => 'pelatihan-kerja',
                'durasi'         => '200 Jam Pelajaran (± 25 hari kerja)',
                'peserta_target' => 'Pencari kerja, lulusan SMK/SMA sederajat',
                'narasi'         => 'Program pelatihan berbasis kompetensi untuk mencetak tenaga teknisi komputer dan jaringan yang mampu melakukan instalasi, konfigurasi, perawatan perangkat keras & lunak komputer, serta pengelolaan jaringan LAN/WAN. Kurikulum mengacu pada SKKNI Nomor 282 Tahun 2016 Bidang Teknisi Komputer.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan Operator Mesin CNC (Computer Numerical Control)',
                'kategori'       => 'pelatihan-kerja',
                'durasi'         => '240 Jam Pelajaran (± 30 hari kerja)',
                'peserta_target' => 'Pencari kerja, karyawan industri manufaktur',
                'narasi'         => 'Pelatihan intensif pengoperasian mesin CNC untuk industri manufaktur, meliputi pemrograman G-Code, setup mesin, pengoperasian turning/milling CNC, dan quality control hasil produksi. Peserta mendapatkan praktik langsung di workshop CNC UPT BLP2TK.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan Pengelasan SMAW (Shielded Metal Arc Welding)',
                'kategori'       => 'pelatihan-kerja',
                'durasi'         => '200 Jam Pelajaran (± 25 hari kerja)',
                'peserta_target' => 'Pencari kerja, karyawan industri, lulusan SMK Teknik',
                'narasi'         => 'Pelatihan juru las SMAW posisi 1G, 2G, 3G, dan 4G sesuai standar internasional AWS D1.1. Materi mencakup keselamatan kerja pengelasan, teknik pengelasan, pengujian hasil las (visual dan destructive test), serta persiapan sertifikasi kompetensi juru las dari BNSP.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan Tata Busana & Desain Fashion',
                'kategori'       => 'pelatihan-kerja',
                'durasi'         => '160 Jam Pelajaran (± 20 hari kerja)',
                'peserta_target' => 'Pencari kerja, ibu rumah tangga, wirausahawan muda',
                'narasi'         => 'Program pelatihan membuat busana mulai dari pengambilan ukuran, pembuatan pola, pemotongan bahan, menjahit, hingga finishing produk busana wanita dan pria. Peserta juga mendapat materi desain dasar dan kewirausahaan bidang fashion untuk mendukung pembukaan usaha mandiri.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan Teknisi Instalasi Listrik',
                'kategori'       => 'pelatihan-kerja',
                'durasi'         => '200 Jam Pelajaran (± 25 hari kerja)',
                'peserta_target' => 'Pencari kerja, lulusan SMK Teknik Elektro',
                'narasi'         => 'Pelatihan untuk menghasilkan tenaga instalatir listrik yang kompeten sesuai PUIL 2011 dan SNI. Materi meliputi instalasi listrik rumah tinggal, instalasi industri, pembacaan gambar teknik, penggunaan alat ukur listrik, dan keselamatan kerja listrik. Lulusan dapat mengikuti uji kompetensi BNSP untuk mendapatkan SLO.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan Pengolahan Hasil Pertanian & Pangan',
                'kategori'       => 'pelatihan-kerja',
                'durasi'         => '120 Jam Pelajaran (± 15 hari kerja)',
                'peserta_target' => 'Pencari kerja, petani, pelaku UMKM pangan',
                'narasi'         => 'Program pelatihan pengolahan produk pangan berbasis komoditas lokal Jawa Timur, meliputi teknik pengawetan, pengemasan, labeling, dan standar keamanan pangan BPOM. Peserta dibekali kemampuan membuat produk olahan bernilai tambah dan strategi pemasaran digital produk pangan.',
                'foto'           => null,
            ],

            // ──────────────────────────────────────────────────────────────
            // 2. PENINGKATAN PRODUKTIVITAS
            // ──────────────────────────────────────────────────────────────
            [
                'nama_kegiatan'  => 'Konsultansi Produktivitas untuk UMKM',
                'kategori'       => 'peningkatan-produktivitas',
                'durasi'         => 'Berkelanjutan (min. 3 bulan pendampingan)',
                'peserta_target' => 'UMKM Mikro, Kecil, dan Menengah di Jawa Timur',
                'narasi'         => 'Layanan konsultansi produktivitas langsung ke tempat usaha (in-plant consultation) untuk membantu UMKM mengidentifikasi pemborosan (waste), menerapkan 5R/5S, Kaizen, dan metode peningkatan produktivitas lainnya. Tim konsultan berpengalaman UPT BLP2TK akan mendampingi selama proses implementasi dan evaluasi hasil.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan 5R/5S dan Kaizen untuk Industri',
                'kategori'       => 'peningkatan-produktivitas',
                'durasi'         => '16 Jam Pelajaran (2 hari)',
                'peserta_target' => 'Supervisor, mandor, karyawan industri manufaktur & jasa',
                'narasi'         => 'Workshop intensif penerapan metode 5R (Ringkas, Rapi, Resik, Rawat, Rajin) dan Kaizen (perbaikan berkelanjutan) di lingkungan kerja. Peserta belajar mengidentifikasi pemborosan dengan Value Stream Mapping, membuat rencana aksi perbaikan, dan mengukur peningkatan produktivitas kerja secara nyata.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pengukuran Produktivitas Perusahaan (Total Factor Productivity)',
                'kategori'       => 'peningkatan-produktivitas',
                'durasi'         => '3–5 hari kerja (sesuai skala perusahaan)',
                'peserta_target' => 'Perusahaan industri dan jasa di Jawa Timur',
                'narasi'         => 'Layanan pengukuran tingkat produktivitas perusahaan menggunakan metode Total Factor Productivity (TFP) dan Partial Productivity sesuai panduan ILO. Hasil pengukuran berupa laporan komprehensif yang mencakup indeks produktivitas, analisis faktor penghambat, dan rekomendasi strategis peningkatan produktivitas.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Pelatihan Leadership & Manajemen Produktivitas',
                'kategori'       => 'peningkatan-produktivitas',
                'durasi'         => '24 Jam Pelajaran (3 hari)',
                'peserta_target' => 'Manajer, supervisor, calon pemimpin organisasi/perusahaan',
                'narasi'         => 'Program pengembangan kompetensi kepemimpinan yang berfokus pada peningkatan produktivitas tim kerja. Materi meliputi gaya kepemimpinan situasional, manajemen kinerja berbasis KPI, teknik motivasi karyawan, manajemen waktu efektif, dan strategi membangun budaya kerja produktif di era digital.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Gerakan Nasional Peningkatan Produktivitas & Daya Saing (GNPPDS)',
                'kategori'       => 'peningkatan-produktivitas',
                'durasi'         => 'Program tahunan (series pelatihan & pendampingan)',
                'peserta_target' => 'Perusahaan, UMKM, dan tenaga kerja di Jawa Timur',
                'narasi'         => 'Implementasi program nasional GNPPDS di wilayah Jawa Timur yang digagas Kementerian Ketenagakerjaan RI. Program ini mencakup sosialisasi budaya produktif, kompetisi produktivitas tingkat provinsi, pendampingan perusahaan percontohan, dan penghargaan Productivity Award bagi perusahaan dengan peningkatan produktivitas terbaik.',
                'foto'           => null,
            ],

            // ──────────────────────────────────────────────────────────────
            // 3. SERTIFIKASI KOMPETENSI
            // ──────────────────────────────────────────────────────────────
            [
                'nama_kegiatan'  => 'Uji Kompetensi Juru Las SMAW – BNSP',
                'kategori'       => 'sertifikasi-kompetensi',
                'durasi'         => '1–2 hari (sesi uji kompetensi)',
                'peserta_target' => 'Juru las yang telah berpengalaman atau lulus pelatihan las',
                'narasi'         => 'Pelaksanaan uji kompetensi juru las SMAW melalui Tempat Uji Kompetensi (TUK) yang telah diakreditasi oleh BNSP. Skema kompetensi mencakup posisi las 1G hingga 4G sesuai SKKNI. Peserta yang lulus mendapatkan Sertifikat Kompetensi BNSP yang diakui secara nasional dan berlaku 3 tahun.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Uji Kompetensi Teknisi Komputer & Jaringan – BNSP',
                'kategori'       => 'sertifikasi-kompetensi',
                'durasi'         => '1 hari (sesi uji kompetensi)',
                'peserta_target' => 'Teknisi komputer berpengalaman, lulusan kursus/pelatihan IT',
                'narasi'         => 'Uji kompetensi skema Teknisi Komputer dan Jaringan mencakup unit kompetensi instalasi sistem operasi, konfigurasi jaringan, troubleshooting perangkat keras dan lunak, serta keamanan jaringan dasar. Sertifikat BNSP yang dikeluarkan berlaku sebagai pengakuan resmi kompetensi di bidang teknologi informasi.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Uji Kompetensi Operator Produksi Industri – BNSP',
                'kategori'       => 'sertifikasi-kompetensi',
                'durasi'         => '1–2 hari (sesuai skema)',
                'peserta_target' => 'Operator produksi di industri manufaktur',
                'narasi'         => 'Sertifikasi kompetensi untuk operator produksi industri mencakup skema pengoperasian mesin produksi, pengendalian kualitas, keselamatan kerja mesin, dan perawatan mesin tingkat dasar. Program ini mendukung upaya peningkatan daya saing industri Jawa Timur melalui pengakuan kompetensi tenaga kerjanya.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Sertifikasi Assessor Kompetensi – BNSP',
                'kategori'       => 'sertifikasi-kompetensi',
                'durasi'         => '3 hari (pelatihan & uji)',
                'peserta_target' => 'Instruktur, praktisi industri yang akan menjadi asesor',
                'narasi'         => 'Program pelatihan dan sertifikasi untuk menjadi Asesor Kompetensi yang berwenang melakukan asesmen uji kompetensi di TUK. Kurikulum mencakup metodologi asesmen berbasis kompetensi, penyusunan materi uji kompetensi (MUK), teknik observasi dan wawancara, serta etika asesor. Sertifikat berlaku 3 tahun dan dapat diperpanjang.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Uji Kompetensi Tata Busana & Menjahit – BNSP',
                'kategori'       => 'sertifikasi-kompetensi',
                'durasi'         => '1 hari (sesi uji kompetensi)',
                'peserta_target' => 'Penjahit, pengusaha konveksi, lulusan kursus menjahit',
                'narasi'         => 'Uji kompetensi skema Tata Busana yang mengacu pada SKKNI Subgolongan Jasa Perorangan. Materi uji mencakup pembuatan pola, pemotongan kain, teknik menjahit, dan finishing busana. Sertifikat BNSP yang diperoleh meningkatkan nilai jual tenaga kerja di industri garmen dan konveksi nasional maupun ekspor.',
                'foto'           => null,
            ],

            // ──────────────────────────────────────────────────────────────
            // 4. KONSULTASI PRODUKTIVITAS
            // ──────────────────────────────────────────────────────────────
            [
                'nama_kegiatan'  => 'Konsultasi Sistem Manajemen Mutu ISO 9001:2015',
                'kategori'       => 'konsultasi',
                'durasi'         => 'Pendampingan 3–6 bulan',
                'peserta_target' => 'Perusahaan yang ingin mendapatkan sertifikasi ISO 9001',
                'narasi'         => 'Layanan konsultasi dan pendampingan implementasi Sistem Manajemen Mutu ISO 9001:2015 untuk perusahaan industri dan jasa. Tim konsultan UPT BLP2TK membantu penyusunan dokumen mutu, pelatihan internal auditor, pelaksanaan internal audit, tinjauan manajemen, hingga kesiapan audit sertifikasi oleh lembaga sertifikasi terakreditasi KAN.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Konsultasi Ergonomi dan Lingkungan Kerja',
                'kategori'       => 'konsultasi',
                'durasi'         => '2–3 hari (survei & laporan)',
                'peserta_target' => 'Perusahaan, instansi pemerintah, rumah sakit',
                'narasi'         => 'Layanan konsultasi ergonomi untuk mengevaluasi kesesuaian antara manusia, mesin, dan lingkungan kerja. Meliputi penilaian postur kerja (RULA/REBA), analisis beban kerja fisik dan mental, rekomendasi desain workstation ergonomis, dan penyusunan program K3 ergonomi guna mengurangi risiko musculoskeletal disorder (MSD).',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Konsultasi Manajemen Kinerja Berbasis KPI',
                'kategori'       => 'konsultasi',
                'durasi'         => 'Pendampingan 1–3 bulan',
                'peserta_target' => 'Perusahaan skala menengah-besar, instansi pemerintah',
                'narasi'         => 'Pendampingan penyusunan sistem manajemen kinerja berbasis Key Performance Indicator (KPI) yang terukur dan selaras dengan strategi organisasi. Tim konsultan membantu identifikasi KPI kritis, cascade dari level korporat ke individu, perancangan form penilaian kinerja, dan pelatihan manajemen dalam menjalankan siklus performance review secara efektif.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Konsultasi Analisis Jabatan & Beban Kerja (ANJAB-ABK)',
                'kategori'       => 'konsultasi',
                'durasi'         => 'Pendampingan 1–2 bulan',
                'peserta_target' => 'Instansi pemerintah daerah, BUMN, perusahaan swasta',
                'narasi'         => 'Layanan konsultasi analisis jabatan (ANJAB) dan analisis beban kerja (ABK) untuk mendukung efisiensi organisasi dan perencanaan SDM yang tepat. Meliputi survei dan wawancara jabatan, pengukuran beban kerja menggunakan metode FTE (Full Time Equivalent), penyusunan uraian jabatan, dan rekomendasi kebutuhan formasi pegawai yang optimal.',
                'foto'           => null,
            ],

            // ──────────────────────────────────────────────────────────────
            // 5. MAGANG INDUSTRI
            // ──────────────────────────────────────────────────────────────
            [
                'nama_kegiatan'  => 'Program Magang Mahasiswa di Industri (MSIB – Mitra BLP2TK)',
                'kategori'       => 'magang-industri',
                'durasi'         => '4–6 bulan (1–2 semester)',
                'peserta_target' => 'Mahasiswa D3/D4/S1 aktif dari perguruan tinggi mitra',
                'narasi'         => 'Program magang mahasiswa di perusahaan industri mitra UPT BLP2TK Surabaya yang terintegrasi dengan program MSIB Kemendikbudristek. Mahasiswa mendapatkan pengalaman kerja nyata di bidang manufaktur, teknologi informasi, manajemen produksi, dan pengembangan produk. UPT BLP2TK berperan sebagai fasilitator penempatan dan monitoring proses magang.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Magang Industri untuk Peserta Pelatihan (On-The-Job Training)',
                'kategori'       => 'magang-industri',
                'durasi'         => '1–3 bulan (pasca pelatihan)',
                'peserta_target' => 'Alumni peserta pelatihan kerja UPT BLP2TK',
                'narasi'         => 'Program On-The-Job Training (OJT) bagi alumni pelatihan kerja UPT BLP2TK untuk mempraktikkan kompetensi yang telah dipelajari di lingkungan industri nyata. Peserta ditempatkan di perusahaan mitra sesuai bidang keahliannya dengan bimbingan pembimbing lapangan dari perusahaan dan instruktur dari UPT BLP2TK.',
                'foto'           => null,
            ],
            [
                'nama_kegiatan'  => 'Kerjasama Magang dengan Industri Jepang (IM Japan)',
                'kategori'       => 'magang-industri',
                'durasi'         => '3 tahun (program penuh)',
                'peserta_target' => 'Pemuda usia 18–26 tahun, lulusan SMA/SMK/Sederajat',
                'narasi'         => 'Program magang ke Jepang melalui kerjasama IM Japan (International Manpower Development Organization Japan) yang difasilitasi Kemnaker RI. UPT BLP2TK berperan dalam persiapan kompetensi teknis dan bahasa Jepang dasar calon peserta magang. Program mencakup pelatihan kerja 3 bulan di Indonesia sebelum keberangkatan ke Jepang.',
                'foto'           => null,
            ],
        ];

        foreach ($programs as $program) {
            DB::table('program_kegiatan')->insert(array_merge($program, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
