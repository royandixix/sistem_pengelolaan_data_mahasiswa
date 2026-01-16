{{-- FILE: resources/views/admin/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100 overflow-hidden">

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        @include('admin.partials.header')

        {{-- Main Content --}}
        <main class="flex-1 overflow-auto bg-gray-50">
            <div class="max-w-full">
                {{-- Session Success --}}
                @if(session('success'))
                    <div class="m-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="absolute top-0 right-0 px-4 py-3">
                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Page Content --}}
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        @include('admin.partials.footer')
    </div>

    {{-- JavaScript for Sidebar Toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const menuToggle = document.getElementById('menuToggle');
            const closeSidebar = document.getElementById('closeSidebar');

            // Open sidebar
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            }

            // Close sidebar function
            function closeSidebarFunc() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            // Close button click
            if (closeSidebar) {
                closeSidebar.addEventListener('click', closeSidebarFunc);
            }

            // Overlay click
            if (overlay) {
                overlay.addEventListener('click', closeSidebarFunc);
            }

            // Close sidebar when clicking a link (mobile only)
            if (sidebar) {
                const sidebarLinks = sidebar.querySelectorAll('a');
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth < 768) {
                            closeSidebarFunc();
                        }
                    });
                });
            }

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>

</body>
</html>