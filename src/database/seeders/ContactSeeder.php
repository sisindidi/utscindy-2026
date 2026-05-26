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
      
        DB::table('contacts')->insert([
            'whatsapp'   => '08123',
            'email'      => 'cindy@example.com', 
            'name'       => null, 
            'message'    => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}