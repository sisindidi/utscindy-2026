<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Daftarkan semua kolom agar bisa diisi atau disimpan ke database
    protected $fillable = [
        'whatsapp',
        'email',
        'github',
        'name',
        'message',
    ];
}