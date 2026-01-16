<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Password Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Set Password</h2>

        @if(session('success'))
            <p class="text-green-500 mb-4 text-center">{{ session('success') }}</p>
        @endif

        <form action="{{ route('set-password.submit') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email Mahasiswa" value="{{ old('email') }}" required class="w-full px-3 py-2 border rounded">
            @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror

            <input type="password" name="password" placeholder="Password Baru" required class="w-full px-3 py-2 border rounded">
            @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required class="w-full px-3 py-2 border rounded">

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Set Password</button>
        </form>

        <p class="mt-6 text-center text-gray-600 text-sm">
            Sudah punya password? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
