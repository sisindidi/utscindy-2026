<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectdetail extends Model
{
    use HasFactory;

   
    protected $table = 'project_details'; 

    protected $fillable = [
        'project_id',
        'project_type',
        'background',
        'problem_analysis',
        'system_requirements',
        'backend_tech',
        'frontend_tech',
        'admin_panel_tech',
        'database_tech',
        'environment_tech',
        'workflow_commands',
        'erd_image',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}