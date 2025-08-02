<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', '{{env("APP_NAME")}}')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS via CDN (for production, consider using the build process) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-800 text-white px-4 py-3 shadow-md">
        <div class="container mx-auto">
            <a class="text-xl font-bold hover:text-gray-300 transition-colors"
                href="{{ route('transaksi.create') }}">
                {{env("APP_NAME")}}
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- JS Optional --}}
    @stack('scripts')
</body>

</html>
