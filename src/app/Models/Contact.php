<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Ini baris sakti yang diprotes sama Laravel tadi, wajib ditulis semua kolomnya:
    protected $fillable = ['whatsapp','email', 'github'];
}