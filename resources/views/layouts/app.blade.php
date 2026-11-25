<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | PACU!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top left, #FFE066 0%, #FFB800 50%, #FF8A00 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .pacu-main-card {
            background-color: #ffffff;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            position: relative;
            overflow: hidden;
        }
        .text-pacu-orange {
            color: #FFA800;
        }
    </style>
    @stack('styles')
</head>
<body>

    @include('layouts.partials.navbar')

    <main class="container-xl flex-grow-1 d-flex flex-column pb-4">
        <div class="pacu-main-card flex-grow-1 d-flex flex-column justify-content-between pt-4 px-3 px-md-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
