<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\PropertyCategory;
use App\Models\PointRule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create(['nama_role' => 'Admin']);
        $salesRole = Role::create(['nama_role' => 'Pegawai']);

        User::create([
            'idrole' => $adminRole->idrole,
            'nama' => 'Admin_PACU',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'idrole' => $salesRole->idrole,
            'nama' => 'Pegawai_PACU',
            'email' => 'pegawai@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        PropertyCategory::create([
            'nama_kategori' => 'Rumah',
            'deskripsi' => 'Unit Rumah Baru',
        ]);
        PropertyCategory::create([
            'nama_kategori' => 'Ruko',
            'deskripsi' => 'Area komersial dan rumah toko',
        ]);

        PointRule::create([
            'nama_aturan' => 'Survey',
            'jumlah_poin' => 50,
            'deskripsi' => 'Poin untuk aktivitas kunjungan ke klien',
        ]);
        PointRule::create([
            'nama_aturan' => 'Deal',
            'jumlah_poin' => 200,
            'deskripsi' => 'Poin bonus jika prospek berhasil transaksi',
        ]);
    }
}
