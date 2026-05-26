<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Project; 
use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Livewire Routes (Do Not Remove)
|--------------------------------------------------------------------------
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

/*
|--------------------------------------------------------------------------
| Home Page (Sudah Dirapikan & Anti Bentrok)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $profile = Profile::latest()->first(); 
    $projects = Project::all();
    
    // Ambil data yang ada nomor WA-nya (Khusus profil sosmed lu sendiri)
    $contact = Contact::whereNotNull('whatsapp')->latest()->first(); 
    
    return view('welcome', compact('profile', 'projects', 'contact')); 
});

/*
|--------------------------------------------------------------------------
| Detail Project
|--------------------------------------------------------------------------
*/
Route::get('/project/{id}', function ($id) {
    $project = Project::find($id);
    if (!$project) { 
        return redirect('/'); 
    }
    return view('detail', compact('project'));
});

/*
|--------------------------------------------------------------------------
| Contact Form Store (Simpan Pesan Pengunjung)
|--------------------------------------------------------------------------
*/
Route::post('/contact-store', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    DB::table('contacts')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message, 
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Pesan Anda berhasil disimpan ke database!');
})->name('contact.store');