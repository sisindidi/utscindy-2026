<?php

use App\Models\Contact;
use App\Models\Project; 
use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Illuminate\Support\Facades\Response;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
 /*/
Route::get('/', function () {
    // Ambil data profile yang paling baru lu input di admin panel
    $profile = Profile::latest()->first(); 

    return view('welcome', compact('profile'));
});


Route::get('/', function () {
    $profile = Profile::latest()->first(); 
    $projects = Project::all(); 
    
    return view('welcome', compact('profile', 'projects'));
});

Route::get('/', function () {
    $profile = Profile::latest()->first(); 
    $projects = Project::all();
    $contact = Contact::latest()->first(); 
    
    return view('welcome', compact('profile', 'projects', 'contact')); 
});