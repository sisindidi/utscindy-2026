<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data sosmed Anda di sini. Kolom name & message dikosongkan (null).
        DB::table('contacts')->insert([
            'whatsapp'   => '081234567890', // <-- Ganti pakai nomor WA asli Anda
            'email'      => 'cindy@example.com', // <-- Ganti pakai email asli Anda
            'github'     => 'https://github.com/username', // <-- Ganti pakai link GitHub asli Anda
            'name'       => null, 
            'message'    => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}