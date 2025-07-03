<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BacaKomik</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white transition-colors duration-300">
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="container mx-auto px-6 py-2 flex flex-wrap items-center justify-between">
            <a href="{{ route('login') }}" class="text-xl font-bold text-gray-800 dark:text-white">BacaKomik</a>

            <button id="nav-toggle" class="lg:hidden block text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <div id="nav-menu" class="w-full lg:flex lg:items-center lg:w-auto hidden">
                <ul class="lg:flex lg:space-x-6 mt-4 lg:mt-0 text-lg text-gray-700 dark:text-gray-200">
                    <li><a href="{{ route('index') }}" class="block py-2 hover:text-blue-400 {{ request()->is('/') ? 'text-blue-400 font-medium' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('komik.table') }}" class="block py-2 hover:text-blue-400">Table</a></li>
                    <li><a href="{{ route('komik.create') }}" class="block py-2 hover:text-blue-400">Tambah Komik</a></li>
                </ul>
                @if (Route::is('index'))
                    <ul class="lg:ml-6 mt-4 lg:mt-0 flex space-x-4">
                        @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="px-3 py-1 border border-gray-700 dark:border-gray-300 text-gray-700 dark:text-gray-200 text-sm rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}"
                                class="px-3 py-1 border border-blue-600 text-blue-600 dark:border-blue-400 dark:text-blue-400 text-sm rounded hover:bg-blue-50 dark:hover:bg-gray-700">
                                    Login
                                </a>
                            </li>
                        @endauth
                    </ul>
                @endif
            </div>
        </div>

        {{-- JS Toggle untuk mobile nav --}}
        <script>
            document.getElementById('nav-toggle').addEventListener('click', () => {
                document.getElementById('nav-menu').classList.toggle('hidden');
            });
        </script>
    </nav>

    @if(session('success'))
        <div class="fixed top-2 right-4 bg-green-500 text-white px-4 py-2 rounded shadow z-50">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</body>
</html>