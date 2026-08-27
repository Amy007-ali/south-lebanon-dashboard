<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-gray-900 text-white p-6">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-xl font-bold">South Lebanon Dashboard</h1>
            <nav class="flex gap-6">
                <a href="/" class="hover:text-gray-300 transition">Home</a>
                <a href="/villages" class="hover:text-gray-300 transition">Villages</a>
                <a href="/about" class="hover:text-gray-300 transition">About</a>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="border-t mt-12 py-6 text-center text-gray-500">Academic Training Project</footer>
</body>
</html>