<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Admin Aplikasi',
            'level' => 'admin',
            'nis' => '',
            'rayon' => '',
            'rombel' => '',
            'username' => 'admin1',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Ilham Farhan Ardiansyah',
            'level' => 'siswa',
            'nis' => '11907191',
            'rayon' => '',
            'rombel' => '',
            'username' => 'farhan956',
            'password' => bcrypt('siswa'),
            'remember_token' => Str::random(60),
        ]);
    }
}
