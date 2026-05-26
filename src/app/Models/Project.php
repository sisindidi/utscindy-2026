<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Pake guarded kosong biar Filament bebas ngisi data utama sekaligus data relasi detailnya
    protected $guarded = [];

    /**
     * Relasi ke Projectdetail (d kecil)
     */
    public function detail()
    {
        return $this->hasOne(Projectdetail::class, 'project_id');
    }
}