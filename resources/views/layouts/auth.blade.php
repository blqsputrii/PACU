<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - PACU</title>
        <link rel="stylesheet" href="{{  asset('css/auth.css') }}">
    </head>
    <body>
        <main class="auth-card">
            @yield('content')
        </main>
    </body>
</html>
