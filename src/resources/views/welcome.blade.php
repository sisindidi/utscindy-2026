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
                        <h1>
                            <span class="mr-2">{{ $profile->title ?? "Hey folks, I'm" }}</span>
                            <span class="text-success">{{ $profile->name ?? 'Cindy Fitria' }}</span>
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

                      <div class="row text-left">
                          @foreach($projects as $project)
                              <div class="col-lg-4 col-md-6 col-12 mb-4">
                                  <div class="card-project" style="background: #fff; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); height: 100%; border: 1px solid #f0f0f0;">
                                      
                                      <span class="badge" style="background: #e8dbff; color: #8a3ffc; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block;">
                                          {{ $project->category }}
                                      </span>
                                      
                                      <h4 class="mt-3" style="color: #8a3ffc; font-weight: bold; font-size: 18px;">{{ $project->title }}</h4>
                                      
                                      <p class="text-muted mt-2" style="font-size: 14px; line-height: 1.6;">{{ $project->description }}</p>
                                      
                                      @if(str_contains(strtolower($project->title), 'dailycash'))
                                <div class="mt-4">
                                    <a href="/project/{{ $project->id }}" class="btn" style="background: #8a3ffc; color: #fff; border-radius: 5px; padding: 10px 20px; text-decoration: none; display: inline-block; font-size: 14px; font-weight: bold;">
                                        Detail Laporan Awal Project →
                                    </a>
                                </div>
                            @endif

                                  </div>
                              </div>
                          @endforeach
                      </div>
                      </div>
                </div>
        </div>
    </section>

    <!-- CONTACT -->
<section class="contact py-5" id="contact">
    <div class="container text-center">
        <h2 class="mb-5"
            style="color: #8a3ffc; font-weight: bold; font-size: 28px;">
            Hubungi Saya
        </h2>

        <div class="row justify-content-center">
            <div class="col-md-10 col-12 d-flex justify-content-center flex-wrap"
                 style="gap: 45px;">

                {{-- WhatsApp --}}
                @if($contact && $contact->whatsapp)
                @php
                    $nomor_wa = $contact->whatsapp;

                    if (str_starts_with($nomor_wa, '0')) {
                        $nomor_wa = '62' . substr($nomor_wa, 1);
                    }

                    $nomor_wa = str_replace([' ', '-'], '', $nomor_wa);
                @endphp

                <a href="https://wa.me/{{ $nomor_wa }}"
                   target="_blank"
                   style="text-decoration: none; text-align: center;">

                    <div style="
                        background: #e8dbff;
                        width: 95px;
                        height: 95px;
                        border-radius: 22px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0 5px 15px rgba(138,63,252,0.12);
                        margin: 0 auto 12px auto;
                    ">
                        <div style="
                            background: #25D366;
                            width: 52px;
                            height: 52px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="bi bi-whatsapp"
                               style="font-size: 26px; color: white;"></i>
                        </div>
                    </div>

                    <p style="color: #555; font-weight: bold;">
                        WhatsApp
                    </p>
                </a>
                @endif


                {{-- Email --}}
                @if($contact && $contact->email)
                <a href="mailto:{{ $contact->email }}"
                   style="text-decoration: none; text-align: center;">

                    <div style="
                        background: #e8dbff;
                        width: 95px;
                        height: 95px;
                        border-radius: 22px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0 5px 15px rgba(138,63,252,0.12);
                        margin: 0 auto 12px auto;
                    ">
                        <div style="
                            background: #ea4335;
                            width: 52px;
                            height: 52px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="bi bi-envelope-fill"
                               style="font-size: 24px; color: white;"></i>
                        </div>
                    </div>

                    <p style="color: #555; font-weight: bold;">
                        Email
                    </p>
                </a>
                @endif


                {{-- GitHub --}}
                @if($contact && $contact->github)
                <a href="{{ $contact->github }}"
                   target="_blank"
                   style="text-decoration: none; text-align: center;">

                    <div style="
                        background: #e8dbff;
                        width: 95px;
                        height: 95px;
                        border-radius: 22px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0 5px 15px rgba(138,63,252,0.12);
                        margin: 0 auto 12px auto;
                    ">
                        <div style="
                            background: #24292e;
                            width: 52px;
                            height: 52px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="bi bi-github"
                               style="font-size: 24px; color: white;"></i>
                        </div>
                    </div>

                    <p style="color: #555; font-weight: bold;">
                        GitHub
                    </p>
                </a>
                @endif

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