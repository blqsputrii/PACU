<?php

namespace Database\Seeders;

use App\Models\Evidence;
use App\Models\PointRule;
use App\Models\PointsLedger;
use App\Models\Prospect;
use App\Models\ProspectActivity;
use App\Models\PropertyCategory;
use App\Models\Role;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['nama_role' => 'Admin']);
        Role::create(['nama_role' => 'Pegawai']);

        $admin = User::create([
            'nama' => 'Admin PACU',
            'email' => 'admin@gmail.com',
            'password' => 'password123',
            'id_role' => User::ROLE_ADMIN,
        ]);

        $pegawai = collect([
            ['Pegawai PACU', 'pegawai@gmail.com'],
            ['Vivi', 'vivi@gmail.com'],
            ['Lavie', 'lavie@gmail.com'],
            ['Tasya', 'tasya@gmail.com'],
        ])->map(fn ($p) => User::create([
            'nama' => $p[0],
            'email' => $p[1],
            'password' => 'password123',
            'id_role' => User::ROLE_PEGAWAI,
        ]));

        $kategori = collect(['Agent Jual Properti', 'Agent Jual Kost', 'Agent Jual Tanah', 'Agent Jual Rumah'])
            ->map(fn ($nama) => PropertyCategory::create(['nama_kategori' => $nama]));

        PointRule::create(['kunci_aktivitas' => 'merespon', 'label_aktivitas' => 'Agen Merespon', 'nilai_poin' => 100]);
        PointRule::create(['kunci_aktivitas' => 'survey', 'label_aktivitas' => 'Agen Survey', 'nilai_poin' => 150]);
        PointRule::create(['kunci_aktivitas' => 'deal', 'label_aktivitas' => 'Agen Deal', 'nilai_poin' => 250]);

        $contoh = [
            [1, 0, 'Indra Gunawan', 'Jombang', 1, 1, 1, 'Approved'],
            [1, 1, 'Mia Jessica', 'Surabaya', 1, 1, 0, 'Approved'],
            [2, 1, 'Japota Hani', 'Semarang', 1, 1, 1, 'Approved'],
            [2, 2, 'Ratna Sakila', 'Solo', 1, 0, 0, 'Approved'],
            [3, 0, 'Adzan Ashar', 'Yogyakarta', 1, 1, 0, 'Approved'],
            [3, 3, 'Andre Kam', 'Bandung', 1, 0, 0, 'Pending'],
            [0, 2, 'Maulana Farrel', 'Jakarta', 1, 1, 0, 'Pending'],
        ];

        foreach ($contoh as $i => [$idx, $kat, $namaAgen, $domisili, $merespon, $survey, $deal, $status]) {
            $poin = $merespon * 100 + $survey * 150 + $deal * 250;

            $prospek = Prospect::create([
                'tanggal_prospek' => now()->subDays($i)->toDateString(),
                'domisili' => $domisili,
                'nama_agen' => $namaAgen,
                'no_telp_agen' => '62890456782'.$i.'4',
                'no_telp_kantor' => '62854610927'.$i.'6',
                'id_user' => $pegawai[$idx]->id_user,
                'id_kategori' => $kategori[$kat]->id_kategori,
            ]);

            ProspectActivity::create([
                'is_merespon' => (bool) $merespon,
                'is_survey' => (bool) $survey,
                'is_deal' => (bool) $deal,
                'poin_sementara' => $poin,
                'id_prospek' => $prospek->id_prospek,
            ]);

            Evidence::create([
                'nama_file' => 'contoh-bukti.png',
                'path_file' => 'bukti/contoh-bukti.png',
                'id_prospek' => $prospek->id_prospek,
            ]);

            Verification::create([
                'status' => $status,
                'waktu_verifikasi' => $status === 'Pending' ? null : now(),
                'id_prospek' => $prospek->id_prospek,
                'id_user' => $status === 'Pending' ? null : $admin->id_user,
            ]);

            if ($status === 'Approved') {
                PointsLedger::create([
                    'poin_diperoleh' => $poin,
                    'keterangan' => 'Prospek '.$namaAgen.' disetujui',
                    'waktu_diperoleh' => now(),
                    'id_user' => $pegawai[$idx]->id_user,
                    'id_prospek' => $prospek->id_prospek,
                ]);
            }
        }
    }
}
