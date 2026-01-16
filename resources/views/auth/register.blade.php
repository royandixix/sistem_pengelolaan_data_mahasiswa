<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
function toggleMahasiswaFields() {
    const role = document.querySelector('select[name="role"]').value;
    const mahasiswaFields = document.getElementById('mahasiswa-fields');
    if (role === 'mahasiswa') {
        mahasiswaFields.style.display = 'block';
    } else {
        mahasiswaFields.style.display = 'none';
    }
}
document.addEventListener('DOMContentLoaded', () => {
    toggleMahasiswaFields();
    document.querySelector('select[name="role"]').addEventListener('change', toggleMahasiswaFields);
});
</script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required class="w-full px-3 py-2 border rounded">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required class="w-full px-3 py-2 border rounded">
        <input type="password" name="password" placeholder="Password" required class="w-full px-3 py-2 border rounded">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-3 py-2 border rounded">

        <select name="role" class="w-full px-3 py-2 border rounded" required>
            <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <!-- Input khusus mahasiswa -->
        <div id="mahasiswa-fields" class="space-y-2 mt-2">
            <input type="text" name="nim" placeholder="NIM" value="{{ old('nim') }}" class="w-full px-3 py-2 border rounded">
            <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" class="w-full px-3 py-2 border rounded">

            <select name="jurusan_id" class="w-full px-3 py-2 border rounded">
                <option value="">-- Pilih Jurusan --</option>
                @foreach(\App\Models\Jurusan::all() as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Register</button>
    </form>

    <p class="mt-6 text-center text-gray-600 text-sm">
        Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
</div>
</body>
</html>
