<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="transition duration-300">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        AgroSense
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased
             bg-white dark:bg-[#071122]
             transition duration-300">

<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-72 min-h-screen
                  bg-white dark:bg-[#081526]
                  border-r border-gray-200 dark:border-gray-800
                  hidden md:flex flex-col">

        <!-- Logo -->
        <div class="px-6 py-6 border-b
                    border-gray-200 dark:border-gray-800">

            <h1 class="text-3xl font-bold text-green-600">
                AgroSense
            </h1>

        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2">

            <a href="/farmer/dashboard"

               class="flex items-center gap-3
                      px-4 py-3 rounded-2xl
                      text-gray-700 dark:text-gray-300
                      hover:bg-gray-100
                      dark:hover:bg-[#11233d]
                      transition">

                🏠 Dashboard

            </a>

            <a href="{{ route('farms.index') }}"

               class="flex items-center gap-3
                      px-4 py-3 rounded-2xl
                      text-gray-700 dark:text-gray-300
                      hover:bg-gray-100
                      dark:hover:bg-[#11233d]
                      transition">

                🌾 My Farms

            </a>

            <a href="{{ route('farms.create') }}"

               class="flex items-center gap-3
                      px-4 py-3 rounded-2xl
                      text-gray-700 dark:text-gray-300
                      hover:bg-gray-100
                      dark:hover:bg-[#11233d]
                      transition">

                ➕ Add Farm

            </a>

        </nav>

        <!-- Bottom Card -->
        <div class="p-4">

            <div class="bg-green-50 dark:bg-green-900/20
                        border border-green-200 dark:border-green-800
                        rounded-3xl p-4">

                <h3 class="text-lg font-bold
                           text-green-700 dark:text-green-400 mb-2">

                    AgroSense Tip

                </h3>

                <p class="text-sm
                          text-gray-600 dark:text-gray-300">

                    Smart farming starts with proper monitoring.

                </p>

            </div>

        </div>

    </aside>

    <!-- MAIN -->
    <div class="flex-1">

        <!-- NAVBAR -->
        <header class="h-20
                       bg-white/80 dark:bg-[#081526]/80
                       backdrop-blur
                       border-b border-gray-200 dark:border-gray-800
                       sticky top-0 z-50">

            <div class="h-full px-8
                        flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-bold
                               text-gray-800 dark:text-white">

                        AgroSense Dashboard

                    </h2>

                </div>

                <div class="flex items-center gap-4">

                    <!-- Theme Toggle -->
                    <button id="theme-toggle"

                            class="w-12 h-12 rounded-2xl
                                   bg-gray-100 dark:bg-[#11233d]
                                   hover:scale-105
                                   transition text-xl">

                        🌙

                    </button>

                    <!-- User -->
                    <div class="text-gray-700 dark:text-gray-300
                                font-semibold">

                        {{ Auth::user()->role }}

                    </div>

                </div>

            </div>

        </header>

        <!-- PAGE CONTENT -->
        <main>

            {{ $slot }}

        </main>

    </div>

</div>

<!-- DARK MODE SCRIPT -->
<script>

    const html = document.documentElement;

    const toggle = document.getElementById('theme-toggle');

    // Load Theme
    if (localStorage.getItem('theme') === 'dark') {

        html.classList.add('dark');

        toggle.innerHTML = '☀️';

    } else {

        toggle.innerHTML = '🌙';

    }

    // Toggle Theme
    toggle.addEventListener('click', () => {

        html.classList.toggle('dark');

        if (html.classList.contains('dark')) {

            localStorage.setItem('theme', 'dark');

            toggle.innerHTML = '☀️';

        } else {

            localStorage.setItem('theme', 'light');

            toggle.innerHTML = '🌙';

        }

    });

</script>

</body>
</html>