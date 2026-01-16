<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | SISFO MHS</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex flex-col justify-center items-center">

    <!-- Header / Judul -->
    <h1 class="text-4xl font-extrabold text-blue-800 mb-6">Selamat Datang di SISFO MHS</h1>
    <p class="text-gray-600 mb-8 text-center max-w-md">
        Silakan pilih role Anda dan masuk ke sistem untuk mengakses fitur yang tersedia.
    </p>

    <!-- Role Selector -->
    <div class="flex mb-6 space-x-4">
        <button id="btn-admin" class="px-6 py-2 rounded-full font-semibold bg-blue-600 text-white shadow-md hover:bg-blue-700 transition"
                onclick="switchRole('admin')">
            Admin
        </button>
        <button id="btn-mahasiswa" class="px-6 py-2 rounded-full font-semibold bg-gray-200 text-gray-700 shadow-md hover:bg-gray-300 transition"
                onclick="switchRole('mahasiswa')">
            Mahasiswa
        </button>
    </div>

    <!-- Form Login -->
    <form action="{{ route('login') }}" method="POST" class="w-full max-w-lg space-y-4 px-4">
        @csrf

        <!-- ADMIN FIELDS -->
        <div id="admin-fields">
            <input type="email" name="email" placeholder="Email Admin"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            <input type="password" name="password" placeholder="Password Admin"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- MAHASISWA FIELDS -->
        <div id="mahasiswa-fields" class="hidden">
            <input type="text" name="nim" placeholder="NIM Mahasiswa"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
            <input type="email" name="email_mahasiswa" placeholder="Email Mahasiswa"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
        </div>

        <!-- Hidden Role Input -->
        <input type="hidden" name="role" id="role-input" value="admin">

        <!-- Submit Button -->
        <button type="submit"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all">
            Login
        </button>
    </form>

    <!-- Footer -->
    <p class="mt-6 text-gray-500 text-sm">&copy; 2026 SISFO MHS. Semua hak cipta dilindungi.</p>

    <!-- Script Toggle Role -->
    <script>
        function switchRole(role) {
            document.getElementById('role-input').value = role;

            const adminFields = document.getElementById('admin-fields');
            const mahasiswaFields = document.getElementById('mahasiswa-fields');

            adminFields.classList.toggle('hidden', role !== 'admin');
            mahasiswaFields.classList.toggle('hidden', role !== 'mahasiswa');

            // Toggle button colors
            const btnAdmin = document.getElementById('btn-admin');
            const btnMhs = document.getElementById('btn-mahasiswa');

            if(role === 'admin') {
                btnAdmin.classList.add('bg-blue-600','text-white');
                btnAdmin.classList.remove('bg-gray-200','text-gray-700');
                btnMhs.classList.add('bg-gray-200','text-gray-700');
                btnMhs.classList.remove('bg-blue-600','text-white');
            } else {
                btnMhs.classList.add('bg-blue-600','text-white');
                btnMhs.classList.remove('bg-gray-200','text-gray-700');
                btnAdmin.classList.add('bg-gray-200','text-gray-700');
                btnAdmin.classList.remove('bg-blue-600','text-white');
            }
        }
    </script>

</body>
</html>
