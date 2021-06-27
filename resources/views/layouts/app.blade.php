<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">

    <meta name="theme-color" content="#ffffff">
    <title>{{ config('app.name', 'FTBLOG') }}</title>
    <meta name="description" content="FTBLOG.in">
    <meta property="og:url" content="https://ftblog.in/">
    <meta property="og:type" content="article">
    <meta property="og:description" content="FTBLOG.in">
    <meta property="og:image" content="https://ftblog.in/logo.png">
    <meta name="twitter:title" content="FTBLOG.in">
    <meta property="og:title" content="FTBLOG.in">

    <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('favicon.jpg') }}" sizes="180x180">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-app.js"></script>
    
    <script data-ad-client="ca-pub-9624538133715401" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-analytics.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('nav-bar')

        <!-- Page Content -->
        <main class="pt-16">
            {{ $slot }}
        </main>
        {{-- Footer --}}
    </div>
    <footer class="w-full h-8 bg-indigo-400">
        <div class="flex justify-center items-center px-2">
            <h1 class="text-white">&copy; 2021 - FTBLOG.in</h1>
        </div>
    </footer>

    @stack('modals')
    @livewireScripts

</body>

</html>
