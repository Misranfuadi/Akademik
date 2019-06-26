<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ url('/') }}">Akademik</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (!empty($halaman)&& $halaman == 'siswa')
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('siswa') }}">Siswa
                <span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('siswa') }}">Siswa</a>
            </li>
            @endif
            @if (Auth::check())
                @if (!empty($halaman)&& $halaman == 'kelas')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('kelas') }}">Kelas
                    <span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('kelas') }}">Kelas</a>
                </li>
                @endif
            @endif
            @if (Auth::check())
                @if (!empty($halaman)&& $halaman =='hobi')
                <li class="nav-item active">
                    <a  class="nav-link"    href="{{ url('hobi') }}">Hobi
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('hobi') }}">Hobi</a>
                </li>
                @endif
            @endif
            @if (!empty($halaman)&& $halaman == 'about')
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('about') }}">About
                <span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('about') }}">About</a>
            </li>
            @endif
            @if (Auth::check()&& Auth::user()->level == 'admin')
                @if (!empty($halaman)&& $halaman == 'user')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('user') }}">User
                    <span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('user') }}">User</a>
                </li>
                @endif
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <li><a class="btn btn-outline-light " href="{{ url('logout') }}">{{ Auth::user()->name }}</a></li>
            @else
                <li><a class="btn btn-outline-light " href="{{ url('login') }}">Login</a></li>
            @endif
        </ul>
    </div>
</nav>
