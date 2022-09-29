<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="{{route('about')}}" class="nav-link px-2 text-muted">About</a></li>
            @guest
                @if (Route::has('login'))
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link px-2 text-muted">Login</a></li>
                    @endif
            @if (Route::has('register'))
            <li class="nav-item"><a href="{{route('register')}}" class="nav-link px-2 text-muted">Register</a></li>
                    @endif
            @else
                <li class="nav-item">
                <a class="nav-link px-2 text-muted" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            @endguest
        </ul>
        <p class="text-center text-muted">Programmeren 5 - Wessel van Beek</p>
    </footer>
</div>
