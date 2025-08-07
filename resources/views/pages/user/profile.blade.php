<x-layout.admin />
<div class="flex-1 flex flex-col overflow-hidden">
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 px-4 py-4 md:px-8 md:py-8">
        <div class="flex flex-col gap-1 mb-6">
            <h1 class="font-semibold text-lg text-gray-800">Edit Profil</h1>
            <div class="flex items-center gap-1 text-sm text-gray-500">
                <span>Admin</span>
                <span>/</span>
                <span>Profil</span>
            </div>
        </div>

        @if (session('success'))
            <div id="alertBox" class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-5">
            @csrf
 

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="firstname" value="{{ old('firstname', $user->firstname) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                @error('firstname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                @error('lastname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ url()->previous() }}"
                    class="px-4 py-2 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </main>
</div>

{{-- Script auto-close alert --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertBox = document.getElementById('alertBox');
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 3000);
        }
    });
</script>
