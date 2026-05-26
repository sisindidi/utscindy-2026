<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Menggunakan title dinamis dari database --}}
    <title>Detail Project - {{ $project->name ?? $project->title }}</title>
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        body { background-color: #fcfaff; font-family: 'Poppins', sans-serif; color: #333; }
        .detail-card { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(138, 63, 252, 0.08); padding: 40px; margin-top: 30px; margin-bottom: 30px; }
        .back-btn { color: #8a3ffc; text-decoration: none; font-weight: bold; transition: 0.3s; }
        .back-btn:hover { color: #6929c4; }
        .badge-cat { background: #e8dbff; color: #8a3ffc; font-weight: bold; padding: 6px 15px; border-radius: 20px; display: inline-block; font-size: 13px; }
        .section-subheading { font-weight: bold; color: #8a3ffc; margin-top: 25px; margin-bottom: 10px; }
        .erd-image { width: 100%; border-radius: 15px; border: 1px solid #e8dbff; box-shadow: 0 5px 15px rgba(138, 63, 252, 0.03); margin-top: 15px; }
        ul { color: #555; padding-left: 20px; }
        li { margin-bottom: 8px; }
    </style>
</head>
<body>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11 col-12">
                
                {{-- TOMBOL KEMBALI --}}
                <div class="mt-4">
                    <a href="/" class="back-btn"><i class="uil uil-arrow-left"></i> Kembali ke Portfolio</a>
                </div>

                {{-- CARD 1: RINGKASAN UTAMA & LATAR BELAKANG --}}
                <div class="detail-card">
                    <span class="badge-cat mb-3">{{ $project->category ?? 'Web Development' }}</span>
                    <h1 style="font-weight: bold; color: #111;" class="mb-4">{{ $project->name ?? $project->title }}</h1>
                    
                    <hr style="border-top: 2px solid #f1f1f1;" class="mb-4">

                    {{-- Deskripsi Singkat Bawaan --}}
                    <div style="font-size: 16px; line-height: 1.8; color: #555; white-space: pre-line;" class="mb-4">
                        {!! $project->description !!}
                    </div>

                    {{-- ISI LATAR BELAKANG DARI DATABASE BARU --}}
                    @if($project->detail && $project->detail->background)
                        <h4 class="section-subheading"><i class="uil uil-file-alt"></i> Latar Belakang Project</h4>
                        <div style="font-size: 15px; line-height: 1.8; color: #555;">
                            {!! $project->detail->background !!}
                        </div>
                    @endif
                </div>

                {{-- JIKA DATA DETAIL DI DATABASE SUDAH DIISI, TAMPILKAN STRUKTUR LAPORAN UTS --}}
                @if($project->detail)
                    
                    {{-- CARD 2: ANALISIS SISTEM --}}
                    @if($project->detail->problem_analysis || $project->detail->system_requirements)
                    <div class="detail-card">
                        <span class="badge-cat mb-3">System Analysis</span>
                        <h3 style="font-weight: bold; color: #111;" class="mb-3">Analisis Masalah & Kebutuhan</h3>
                        <hr style="border-top: 2px solid #f1f1f1;" class="mb-4">

                        @if($project->detail->problem_analysis)
                            <h5 class="section-subheading">Masalah yang Dihadapi</h5>
                            <div style="font-size: 15px; color: #555;">
                                {!! $project->detail->problem_analysis !!}
                            </div>
                        @endif

                        @if($project->detail->system_requirements)
                            <h5 class="section-subheading">Kebutuhan Sistem & Fitur Utama</h5>
                            <div style="font-size: 15px; color: #555;">
                                {!! $project->detail->system_requirements !!}
                            </div>
                        @endif
                    </div>
                    @endif

                    {{-- CARD 3: ARCHITECTURE & TECH STACK --}}
                    <div class="detail-card">
                        <span class="badge-cat mb-3">Technology Stack</span>
                        <h3 style="font-weight: bold; color: #111;" class="mb-3">Arsitektur & Komponen Teknologi</h3>
                        <hr style="border-top: 2px solid #f1f1f1;" class="mb-4">

                        @if($project->detail->architecture_text)
                            <h5 class="section-subheading">Arsitektur Sistem</h5>
                            <p style="font-size: 15px; color: #555;">{{ $project->detail->architecture_text }}</p>
                        @endif

                        <h5 class="section-subheading">Spesifikasi Teknologi</h5>
                        <ul>
                            <li><strong>Backend Framework:</strong> {{ $project->detail->backend_tech ?? 'Laravel' }}</li>
                            <li><strong>Frontend Engine:</strong> {{ $project->detail->frontend_tech ?? 'Blade + Livewire' }}</li>
                            <li><strong>Admin Panel:</strong> {{ $project->detail->admin_panel_tech ?? 'Filament v3' }}</li>
                            <li><strong>Database System:</strong> {{ $project->detail->database_tech ?? 'MariaDB / MySQL' }}</li>
                            <li><strong>Dev Environment:</strong> {{ $project->detail->environment_tech ?? 'Docker / Local WSL' }}</li>
                        </ul>

                        @if($project->detail->workflow_commands)
                            <h5 class="section-subheading">Workflow Command Terminal</h5>
                            <div style="font-size: 14px; background: #f8f5fe; padding: 15px; border-radius: 10px; border: 1px solid #e8dbff;">
                                {!! $project->detail->workflow_commands !!}
                            </div>
                        @endif
                    </div>

                    {{-- CARD 4: RANCANGAN ERD --}}
                    @if($project->detail->erd_image)
                    <div class="detail-card">
                        <span class="badge-cat mb-3">System Design</span>
                        <h3 style="font-weight: bold; color: #111;" class="mb-3">Rencana Perancangan Sistem (ERD)</h3>
                        <hr style="border-top: 2px solid #f1f1f1;" class="mb-4">
                        <p style="font-size: 15px; color: #555;">Berikut merupakan rancangan Entity Relationship Diagram (ERD) dinamis dari sistem yang dibangun:</p>
                        
                        <img src="{{ asset('storage/' . $project->detail->erd_image) }}" alt="ERD {{ $project->name }}" class="erd-image">
                    </div>
                    @endif

                @else
                    {{-- Alert kalau lu belum isi data detailnya di Filament --}}
                    <div class="alert alert-warning text-center mt-4" style="border-radius: 15px; font-weight: 500;">
                        <i class="uil uil-info-circle"></i> Konten laporan detail untuk project ini belum diinput di Admin Panel Filament.
                    </div>
                @endif

            </div>
        </div>
    </div>

</body>
</html>