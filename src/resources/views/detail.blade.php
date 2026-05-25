<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Project - {{ $project->title }}</title>
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        body { background-color: #fcfaff; font-family: 'Poppins', sans-serif; color: #333; }
        .detail-card { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(138, 63, 252, 0.08); padding: 40px; margin-top: 50px; }
        .back-btn { color: #8a3ffc; text-decoration: none; font-weight: bold; transition: 0.3s; }
        .back-btn:hover { color: #6929c4; }
        .badge-cat { background: #e8dbff; color: #8a3ffc; font-weight: bold; padding: 6px 15px; border-radius: 20px; display: inline-block; font-size: 13px; }
    </style>
</head>
<body>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                
                <div class="mt-4">
                    <a href="/" class="back-btn"><i class="uil uil-arrow-left"></i> Kembali ke Portfolio</a>
                </div>

                <div class="detail-card">
                    <span class="badge-cat mb-3">{{ $project->category ?? 'Web Development' }}</span>
                    <h1 style="font-weight: bold; color: #111;" class="mb-4">{{ $project->title }}</h1>
                    
                    <hr style="border-top: 2px solid #f1f1f1;" class="mb-4">

                    <div style="font-size: 16px; line-height: 1.8; color: #555; white-space: pre-line;">
                        {!! $project->description !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>