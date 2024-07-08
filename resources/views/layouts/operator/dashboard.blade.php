<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Admin Solo Safari</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('layouts.operator.sidebar')
        <!-- Mobile sidebar -->

        <div class="flex flex-col flex-1 w-full">
            @include('layouts.operator.navbar')

            <main class="h-full pb-10 overflow-y-auto">
                <div class="container grid px-10">
                    <div>
                        @yield('breadcrumb')
                    </div>

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
</body>

</html>