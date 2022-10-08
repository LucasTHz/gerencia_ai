<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>@yield('title')</title>
    <style>
        .dropdown:hover>.dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <header class="text-white body-font bg-gradient-to-r from-blue-400 to-violet-400">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl text-white font-bold-sm ">Gerencia Ai</span>
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-white	flex flex-wrap items-center text-base justify-center">
                    <button class=" mr-2 px-2">
                        <a href="{{ route('edital.index') }}">Editais</a>
                    </button>
                {{-- <a class="mr-5 hover:text-gray-900" href="{{route('edital.index')}}">Editais</a> --}}
                @auth('estudante')
                <a class="mr-5 hover:text-gray-900" href="{{route('estudante.inscricoes')}}">Inscricoes</a>
                <a class="mr-5 hover:text-gray-900"
                    href="{{route('estudante.show', auth('estudante')->user()->id)}}">Perfil</a>
                <form action="{{route('auth.logout')}}" name="logout" method="post">
                    @csrf
                    <a class="mr-5 hover:text-gray-900" href='javascript:logout.submit()'>Logout</a>
                </form>
                @endauth

                @unless (auth('estudante')->check() || auth('professor')->check())
                <a class="mr-5 hover:text-gray-900" href="{{route('auth.login')}}">Login</a>
                @endunless
                @auth('professor')
                <div class="dropdown">
                    <label tabindex="0" class="btn">Minhas Tarefas</label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a class="text-gray-700 block px-4 py-1 text-sm">Cadastrar edital</a></li>
                        <li><a class="text-gray-700 block px-4 py-2 text-sm">Cadastrar resultado</a></li>
                    </ul>
                </div>
                href="{{ route('professor.show', auth('professor')->user()->id_professor)}}"
                <form action="{{route('auth.logout')}}" name="logout" method="post">
                    @csrf
                    <a class="nav-link" href='javascript:logout.submit()'>Logout</a>
                </form>
                @endauth
            </nav>
            <div class="dropdown">
                <label tabindex="0" class="btn mr-5 hover:text-gray-900">Cadastrar se</label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 right-0">
                    <li><a class="text-gray-700 block px-4 py-1 text-sm">Estudante</a></li>
                    <li><a class="text-gray-700 block px-4 py-1 text-sm">Professor</a></li>
                </ul>
            </div>
    </header>
    </ul>
    </div>
    </div>
    </nav>
    </header>
    @yield('content')
</body>

</html>
