<header class="container-xl pt-4 pb-3">
    <nav class="navbar navbar-expand">
        <div class="container-fluid px-2">
            <a class="navbar-brand text-white fw-bolder fs-2 tracking-wide" href="{{ Auth::check() ? route('dashboard') : route('beranda') }}">
                PACU!
            </a>

            <ul class="navbar-nav ms-auto align-items-center gap-3 gap-md-4">
                @auth
                    @if (Auth::user()->id_role == 1)
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white fw-semibold {{ request()->is('pegawai*') ? 'text-decoration-underline' : '' }}">
                                Manajemen &amp; Status Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white fw-semibold {{ request()->is('verifikasi*') ? 'text-decoration-underline' : '' }}">
                                Verifikasi
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white fw-semibold {{ request()->is('progress*') ? 'text-decoration-underline' : '' }}">
                                Input
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('history.index') }}" class="nav-link text-white fw-semibold {{ request()->is('history*') ? 'text-decoration-underline' : '' }}">
                                History
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold text-warning">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold text-warning">
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
