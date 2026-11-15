<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PACU!') | PACU!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top left, #FFF7D6 0%, #FFD54F 45%, #FFA000 100%);
            min-height: 100vh;
        }
        .pacu-card {
            width: 100%;
            max-width: 440px;
            border-radius: 32px;
            border: none;
        }
        .text-pacu {
            color: #F59E0B;
        }
        .pacu-input {
            border-radius: 50rem;
            padding: 0.65rem 1.2rem;
            font-size: 0.9rem;
        }
        .pacu-input:focus {
            border-color: #F59E0B;
            box-shadow: 0 0 0 0.2rem rgba(245, 158, 11, 0.25);
        }
        .btn-pacu {
            background-color: #FFA800;
            border-color: #FFA800;
            color: #fff;
            border-radius: 50rem;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
        }
        .btn-pacu:hover {
            background-color: #F59E0B;
            border-color: #F59E0B;
            color: #fff;
        }
    </style>
    @stack('styles')
</head>
<body class="d-flex align-items-center justify-content-center p-3">

    <div class="card pacu-card shadow-lg">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <h1 class="fw-bold text-pacu mb-1">Hi, there!</h1>
                <p class="text-muted small mb-0">@yield('subtitle')</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success rounded-4 small text-center py-2">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger rounded-4 small text-center py-2">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
