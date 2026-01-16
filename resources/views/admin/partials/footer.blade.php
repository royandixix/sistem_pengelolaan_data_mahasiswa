{{-- FILE: resources/views/admin/partials/footer.blade.php --}}

<footer class="bg-white shadow-inner px-6 py-4 text-center border-t border-gray-200">
    <div class="flex flex-col md:flex-row items-center justify-center md:justify-between gap-2">
        <p class="text-gray-500 text-xs md:text-sm">
            &copy; {{ date('Y') }} Sistem Pengelolaan Data Mahasiswa. All rights reserved.
        </p>
        <div class="flex items-center gap-4 text-xs text-gray-400">
            <span>v1.0.0</span>
            <span class="hidden md:inline">•</span>
            <span class="hidden md:inline">Made with ❤️</span>
        </div>
    </div>
</footer>