<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marvel HTML Bootstrap 4 Template</title>

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/unicons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('template/css/tooplate-style.css') }}">
    
<!--

Tooplate 2115 Marvel

https://www.tooplate.com/view/2115-marvel

-->
  </head>
  <body>

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html"><i class='uil uil-user'></i> Cindy</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="#about" class="nav-link"><span data-hover="About">About</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#project" class="nav-link"><span data-hover="Projects">Projects</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link"><span data-hover="Contact">Contact</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-lg-auto">
                    <div class="ml-lg-4">
                      <div class="color-mode d-lg-flex justify-content-center align-items-center">
                        <i class="color-mode-icon"></i>
                        Color mode
                      </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ABOUT -->
    <<section class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                    <div class="about-text">
                        <small class="small-text">Welcome to <span class="mobile-block">my portfolio website!</span></small>
                        <h1 class="mt-2" style="font-weight: bold; color: #333;">
                             Hello Everyone I'am <span style="color: #8a3ffc;">{{ $profile->name ?? 'Cindy Fitria Maharani' }}</span>
                  </h1>
                        <p class="mt-3">{{ $profile->description ?? 'Deskripsi default jika kosong' }}</p>
                        
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="about-image">
                        <img src="{{ $profile && $profile->photo ? asset('storage/' . $profile->photo) : asset('template/images/undraw/undraw_software_engineer_lvl7.svg') }}" class="img-fluid" alt="Profile Photo" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section class="project py-5" id="project">
        <div class="container">
                
                <div class="row">
                  <div class="col-lg-11 text-center mx-auto col-12">

                      <div class="col-lg-8 mx-auto mb-5">
                        <h2>Project Saya</h2>
                      </div>
        {{-- 1. SECTION BARISAN PROJECT UTAMA (TAMPILAN GRID KECIL KE SAMPING) --}}
<div class="row text-left">
    @foreach($projects as $project)
        {{-- Di sini ukurannya balik jadi col-lg-4 (Muat 3 project sejajar ke samping) --}}
        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="card-project" style="background: #fff; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); height: 100%; border: 1px solid #f0f0f0; display: flex; flex-direction: column; justify-content: space-between;">
                
                <div>
                    <span class="badge" style="background: #e8dbff; color: #8a3ffc; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block;">
                        {{ $project->category }}
                    </span>
                    
                    <h4 class="mt-3" style="color: #8a3ffc; font-weight: bold; font-size: 18px;">{{ $project->title }}</h4>
                    <p class="text-muted mt-2" style="font-size: 14px; line-height: 1.6;">{{ $project->description }}</p>
                </div>
                
                {{-- Tombol laporan awal bawaan lu tetep di dalam bubble --}}
                @if(str_contains(strtolower($project->title), 'dailycash'))
                    <div class="mt-4">
                        <a href="/project/{{ $project->id }}" class="btn" style="background: #8a3ffc; color: #fff; border-radius: 5px; padding: 10px 20px; text-decoration: none; display: inline-block; font-size: 14px; font-weight: bold; width: 100%; text-align: center;">
                            Detail Laporan Awal Project →
                        </a>
                    </div>
                @endif

            </div>
        </div>
    @endforeach
</div>

{{-- ================================================================== --}}
{{-- 2. SECTION TERPISAH: RINCIAN DETAIL LAPORAN UTS (DI LUAR BUBBLE GRID) --}}
{{-- ================================================================== --}}
<div class="row text-left mt-5">
    <div class="col-12">
        {{-- Kita cari data detail khusus dari project yang namanya DailyCash --}}
        @php
            $dailyCashProject = $projects->first(function($p) {
                return str_contains(strtolower($p->title), 'dailycash');
            });
        @endphp

        @if($dailyCashProject && $dailyCashProject->detail)
            <div class="main-laporan-section" style="background: #fff; border-radius: 15px; padding: 35px; box-shadow: 0 4px 20px rgba(138, 63, 252, 0.05); border: 1px solid #e8dbff; font-family: 'Poppins', sans-serif;">
                
                <h4 style="color: #6929c4; font-weight: bold; margin-bottom: 25px; font-size: 20px; border-bottom: 2px solid #f1f1f1; padding-bottom: 15px;">
                    📋 Rincian Laporan UTS (Dinamis dari Tabel Projectdetail)
                </h4>

                @if($dailyCashProject->detail->project_type)
                    <p style="font-size: 15px;"><strong>Jenis Pengujian:</strong> <span class="badge" style="background: #8a3ffc; color: #fff; padding: 5px 12px; border-radius: 5px;">{{ $dailyCashProject->detail->project_type }}</span></p>
                @endif

                @if($dailyCashProject->detail->background)
                    <h5 style="font-weight: bold; color: #8a3ffc; margin-top: 30px; border-left: 4px solid #8a3ffc; padding-left: 12px; font-size: 16px;">A. Latar Belakang</h5>
                    <div style="font-size: 14px; color: #555; line-height: 1.8;" class="mt-2 pl-3">
                        {!! $dailyCashProject->detail->background !!}
                    </div>
                @endif

                @if($dailyCashProject->detail->problem_analysis || $dailyCashProject->detail->system_requirements)
                    <h5 style="font-weight: bold; color: #8a3ffc; margin-top: 30px; border-left: 4px solid #8a3ffc; padding-left: 12px; font-size: 16px;">B. Analisis & Kebutuhan Sistem</h5>
                    <div class="pl-3 mt-2">
                        @if($dailyCashProject->detail->problem_analysis)
                            <strong style="font-size: 14px; color: #333;" class="d-block">Analisis Masalah:</strong>
                            <div style="font-size: 14px; color: #555; line-height: 1.7;">{!! $dailyCashProject->detail->problem_analysis !!}</div>
                        @endif
                        @if($dailyCashProject->detail->system_requirements)
                            <strong style="font-size: 14px; color: #333;" class="mt-3 d-block">Kebutuhan Fitur:</strong>
                            <div style="font-size: 14px; color: #555; line-height: 1.7;">{!! $dailyCashProject->detail->system_requirements !!}</div>
                        @endif
                    </div>
                @endif

                <h5 style="font-weight: bold; color: #8a3ffc; margin-top: 30px; border-left: 4px solid #8a3ffc; padding-left: 12px; font-size: 16px;">C. Spesifikasi Teknologi</h5>
                <div class="row mt-3 mx-0" style="font-size: 14px; color: #555; background: #fcfaff; padding: 20px; border-radius: 12px; border: 1px solid #e8dbff;">
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Backend Framework:</strong> {{ $dailyCashProject->detail->backend_tech ?? '-' }}</p>
                        <p class="mb-2"><strong>Frontend Engine:</strong> {{ $dailyCashProject->detail->frontend_tech ?? '-' }}</p>
                        <p class="mb-2"><strong>Admin Panel:</strong> {{ $dailyCashProject->detail->admin_panel_tech ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Database System:</strong> {{ $dailyCashProject->detail->database_tech ?? '-' }}</p>
                        <p class="mb-2"><strong>Development Env:</strong> {{ $dailyCashProject->detail->environment_tech ?? '-' }}</p>
                    </div>
                </div>

                @if($dailyCashProject->detail->workflow_commands)
                    <strong style="font-size: 14px; color: #333;" class="mt-3 d-block pl-3">Workflow Perintah Terminal:</strong>
                    <div style="font-size: 13px; background: #f8f5fe; padding: 12px; border-radius: 8px; border: 1px solid #e8dbff; font-family: monospace; color: #6929c4;" class="mx-3 mt-1">
                        {!! $dailyCashProject->detail->workflow_commands !!}
                    </div>
                @endif

                @if($dailyCashProject->detail->erd_image)
                    <h5 style="font-weight: bold; color: #8a3ffc; margin-top: 30px; border-left: 4px solid #8a3ffc; padding-left: 12px; font-size: 16px;">D. Rancangan ERD</h5>
                    <div class="mt-3 pl-3 text-center">
                        <img src="{{ asset('storage/' . $dailyCashProject->detail->erd_image) }}" alt="ERD {{ $dailyCashProject->title }}" class="img-fluid" style="border-radius: 12px; border: 1px solid #e8dbff; max-height: 450px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    </div>
                @endif

            </div>
        @endif
    </div>
</div>
    <!-- CONTACT -->
<section class="contact py-5" id="contact" style="background: #fff; margin-top: 50px;">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #8a3ffc; font-weight: bold; font-size: 28px;">💬 Hubungi Saya</h2>
        <p class="text-center text-muted mb-5">Punya pertanyaan atau tertarik untuk bekerja sama? Hubungi melalui sosial media atau kirim pesan di bawah ini!</p>

        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col-12 d-flex justify-content-center flex-wrap" style="gap: 45px;">

                {{-- WhatsApp Bubble --}}
                @if($contact && $contact->whatsapp)
                @php
                    $nomor_wa = $contact->whatsapp;
                    if (str_starts_with($nomor_wa, '0')) {
                        $nomor_wa = '62' . substr($nomor_wa, 1);
                    }
                    $nomor_wa = str_replace([' ', '-'], '', $nomor_wa);
                @endphp
                <a href="https://wa.me/{{ $nomor_wa }}" target="_blank" style="text-decoration: none; text-align: center;">
                    <div style="background: #e8dbff; width: 95px; height: 95px; border-radius: 22px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(138,63,252,0.12); margin: 0 auto 12px auto;">
                        <div style="background: #25D366; width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-whatsapp" style="font-size: 26px; color: white;"></i>
                        </div>
                    </div>
                    <p style="color: #555; font-weight: bold;">WhatsApp</p>
                </a>
                @endif

                {{-- Email Bubble --}}
                @if($contact && $contact->email)
                <a href="mailto:{{ $contact->email }}" style="text-decoration: none; text-align: center;">
                    <div style="background: #e8dbff; width: 95px; height: 95px; border-radius: 22px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(138,63,252,0.12); margin: 0 auto 12px auto;">
                        <div style="background: #ea4335; width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-envelope-fill" style="font-size: 24px; color: white;"></i>
                        </div>
                    </div>
                    <p style="color: #555; font-weight: bold;">Email</p>
                </a>
                @endif

                {{-- GitHub Bubble --}}
                @if($contact && $contact->github)
                <a href="{{ $contact->github }}" target="_blank" style="text-decoration: none; text-align: center;">
                    <div style="background: #e8dbff; width: 95px; height: 95px; border-radius: 22px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(138,63,252,0.12); margin: 0 auto 12px auto;">
                        <div style="background: #24292e; width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-github" style="font-size: 24px; color: white;"></i>
                        </div>
                    </div>
                    <p style="color: #555; font-weight: bold;">GitHub</p>
                </a>
                @endif

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div style="background: #fcfaff; border-radius: 24px; padding: 40px; box-shadow: 0 10px 30px rgba(138, 63, 252, 0.08);">
                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf <div class="row">
                            <div class="col-md-6 col-12 mb-4">
                                <label style="font-weight: bold; color: #555; display: block; margin-bottom: 8px;">Nama Lengkap</label>
                                <input type="text" name="name" placeholder="Masukkan nama Anda" required style="width: 100%; padding: 12px 20px; border: 2px solid #e8dbff; border-radius: 12px; outline: none; background: #fff; transition: 0.3s;">
                            </div>
                            <div class="col-md-6 col-12 mb-4">
                                <label style="font-weight: bold; color: #555; display: block; margin-bottom: 8px;">Alamat Email</label>
                                <input type="email" name="email" placeholder="nama@email.com" required style="width: 100%; padding: 12px 20px; border: 2px solid #e8dbff; border-radius: 12px; outline: none; background: #fff; transition: 0.3s;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label style="font-weight: bold; color: #555; display: block; margin-bottom: 8px;">Isi Pesan / Laporan</label>
                            <textarea name="message" rows="5" placeholder="Ketikkan pesan atau laporan awal project Anda di sini..." required style="width: 100%; padding: 12px 20px; border: 2px solid #e8dbff; border-radius: 12px; outline: none; background: #fff; resize: none; transition: 0.3s;"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" style="background: #8a3ffc; color: #fff; border: none; padding: 14px 35px; font-size: 16px; font-weight: bold; border-radius: 12px; cursor: pointer; box-shadow: 0 5px 15px rgba(138, 63, 252, 0.3); transition: 0.3s; display: inline-block; width: 100%;">
                                Kirim Pesan Sekarang →
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>


    <script src="{{ asset('template/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/Headroom.js') }}"></script>
    <script src="{{ asset('template/js/jQuery.headroom.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
  </body>
</html>