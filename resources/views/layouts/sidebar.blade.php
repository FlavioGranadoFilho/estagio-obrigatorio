<nav id="sidebar" class="bg-dark">
    <div class="sidebar-header">
        {{-- LOGO --}}
        <img src="{{ asset('imgs/icon-logo.jpg') }}" alt="logo" class=" img-fluid w-100">
    </div>
    <ul class="list-unstyled components">
        <li class="active mt-3 text-center">
            <a href="{{ url('/') }}"><i class="bi bi-house-fill icon-sidebar"></i></a>
        </li>
        <li class="mt-3 text-center">
            <a href="{{ url('/') }}">
                <img class="icon-sidebar img-fluid" src="{{ asset('imgs/itens-estoque.png') }}" alt="">
            </a>
        </li>
        <li class="mt-3 text-center">
            <a href="{{ url('/') }}">
                <img class="icon-sidebar img-fluid" src="{{ asset('imgs/entradas-estoque.png') }}" alt="">
            </a>
        </li>
        <li class="mt-3 text-center">
            <a href="{{ url('/') }}">
                <img class="icon-sidebar img-fluid" src="{{ asset('imgs/saida-estoque.png') }}" alt="">
            </a>
        </li>
        <li class="mt-3 text-center">
            <a href="{{ url('/') }}">
                <img class="icon-sidebar img-fluid" src="{{ asset('imgs/itens-estoque.png') }}" alt="">
            </a>
        </li>
        <li class="mt-3 text-center">
            <a class="text-center" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right icon-sidebar"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>