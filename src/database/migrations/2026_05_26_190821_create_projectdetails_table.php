<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            
            
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            
            $table->string('project_type')->nullable();
            $table->text('background')->nullable();
            $table->text('problem_analysis')->nullable();
            $table->text('system_requirements')->nullable();
            $table->string('backend_tech')->nullable();
            $table->string('frontend_tech')->nullable();
            $table->string('admin_panel_tech')->nullable();
            $table->string('database_tech')->nullable();
            $table->string('environment_tech')->nullable();
            $table->text('workflow_commands')->nullable();
            $table->string('erd_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};