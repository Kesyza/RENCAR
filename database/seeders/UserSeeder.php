<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'User Biasa'
        ]);

        $user = new User();
        $user->name = 'Kesyza Andriana Hartuti';
        $user->nomor_hp = '085647019939';
        $user->jk = 'Perempuan';
        $user->agama = 'Islam';
        $user->alamat = 'Kp. Cilebak Ds. Rancamanyar RT. 02/02 (TB $ Saudara) Kecamatan Baleenadah Kabupaten Bandung Jawa Barat';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $pengunjung = new User();
        $pengunjung->name = 'Pengunjung';
        $pengunjung->nomor_hp = '085647019939';
        $pengunjung->jk = 'Perempuan';
        $pengunjung->agama = 'Islam';
        $pengunjung->alamat = 'Ds. Lemahabang Cantilan RT. 02/05 (Masjid Al-Hikmah) Kecamatan Tanjung Kabupaten Brebes Jawa Tengah';
        $pengunjung->email = 'pengunjung@gmail.com';
        $pengunjung->password = Hash::make('12345678');
        $pengunjung->save();

        $user->attachRole($admin);
        $pengunjung->attachRole($pengguna);
    }
}
