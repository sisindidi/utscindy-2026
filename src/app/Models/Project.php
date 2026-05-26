<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    protected $guarded = [];

    /**
     * Relasi ke Projectdetail (d kecil)
     */
    public function detail()
    {
        return $this->hasOne(Projectdetail::class, 'project_id');
    }
}