<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data lama
        DB::table('users')->truncate();

        // Tambahkan data pengguna
        DB::table('users')->insert([
            [
                'name' => 'Admin Shadeva',
                'email' => 'shadevaf@gmail.com',
                'password' => Hash::make('12345678'), // Gunakan hash untuk password
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
            ],
            // Tambahkan lebih banyak pengguna jika diperlukan
        ]);
    }
}
