<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menghapus semua user sebelum menambahkan yang baru (optional)
        DB::table('users')->truncate();

        // Menambahkan akun admin
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Gunakan password yang kuat di aplikasi nyata
            'role' => 'admin', // Set role sebagai admin
        ]);

        // Menambahkan akun user biasa
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Gunakan password yang kuat di aplikasi nyata
            'role' => 'user', // Set role sebagai user biasa
        ]);
    }
}
