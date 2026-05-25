<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Fungsi ini jalan saat kita ketik perintah 'dca project:init' atau 'php artisan migrate'
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); 

            
            $table->string('category');    
            $table->string('title');       
            $table->text('description');   
            $table->string('link')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     * Fungsi ini jalan kalau kita mau ngebatalin / nge-drop tabelnya
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};