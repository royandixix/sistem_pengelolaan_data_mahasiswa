<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Mahasiswa')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Mengatur agar konten utama memiliki scrollbar sendiri jika sidebar sticky */
        .main-content {
            height: calc(100vh - 64px); /* 64px adalah estimasi tinggi header */
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen overflow-x-hidden">

    {{-- HEADER: Sticky di paling atas --}}
    @include('mahasiswa.partials.header')

    <div class="flex flex-1 relative">
        {{-- SIDEBAR: Sticky di samping --}}
        @include('mahasiswa.partials.navbar')

        {{-- MAIN CONTENT: Area yang bisa di-scroll --}}
        <main class="flex-1 p-4 sm:p-8 w-full">
            @yield('content')
            
            {{-- FOOTER: Di dalam main agar ikut ter-scroll di bawah konten --}}
            @include('mahasiswa.partials.footer')
        </main>
    </div>

    @stack('scripts')
</body>
</html>