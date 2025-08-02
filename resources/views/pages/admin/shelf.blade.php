<x-layout.admin />

<div class="flex-1 flex flex-col overflow-hidden">
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 px-4 py-4 md:px-8 md:py-8">
        <div class="flex flex-col gap-1">
            <h1 class="font-semibold md:text-lg text-gray-800">Shelf</h1>
            <div class="flex items-center gap-1">
                <p class="text-xs text-gray-400 md:text-sm">Admin</p>
                <p class="text-xs text-gray-400 md:text-sm">/</p>
                <p class="text-xs text-gray-400 md:text-sm">Shelf</p>
            </div>
        </div>

        @if (session('success'))
            <div id="alertBox" role="alert" class="bg-green-600 mt-4 rounded-md px-4 py-3 flex items-center">
                <i class="fas fa-check-circle text-white mr-2"></i>
                <span class="text-white font-medium text-sm">{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div id="alertBox" role="alert" class="bg-red-600 mt-4 rounded-md px-4 py-3 flex items-center">
                <i class="fas fa-times-circle text-white mr-2"></i>
                <span class="text-white font-medium text-sm">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 my-8">
            <!-- Shelf Table -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-base font-semibold mb-2">Shelves Table</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left">
                        <thead class="border-b font-medium">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shelves as $shelf)
                                <tr class="border-t" onclick="document.getElementById('shelfDetailModal-{{ $shelf->shelf_id }}').showModal()">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $shelf->shelf_name }}</td>
                                    <td class="px-4 py-2">{{ $shelf->shelf_position }}</td>
                                </tr>

                                <!-- Modal for update/delete -->
    <dialog id="shelfDetailModal-{{ $shelf->shelf_id }}" class="modal">
    <div class="modal-box bg-white rounded-lg shadow-lg w-full max-w-xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" style="padding: 20px">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-lg text-gray-800">Update Shelf Form</h3>
            <form method="dialog">
                <button type="submit" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </form>
        </div>

        <form action="{{ route('admin.shelf.update', ['shelf_id' => $shelf->shelf_id]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input
                    type="text"
                    name="shelf_name"
                    value="{{ $shelf->shelf_name }}"
                    placeholder="shelf Name"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                @error('shelf_name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Shelf Position</label>
                <textarea
                    name="shelf_position"
                    rows="3"
                    placeholder="Shelf Position"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ $shelf->shelf_position }}</textarea>
                @error('shelf_position')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end gap-2">
		<!-- Submit -->
<div class="flex items-center justify-end gap-2">
    <button type="submit"
        class="px-3 py-2 bg-gray-800 rounded text-sm text-white font-medium transition-all duration-300">Update</button>
</div>
</form> <!-- Penutup Form PATCH -->

<!-- Pisahkan form DELETE -->
<form action="{{ route('admin.shelf.delete', ['shelf_id' => $shelf->shelf_id]) }}" method="POST" class="mt-2 flex justify-end">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="px-3 py-2 bg-red-600 rounded text-sm text-white font-medium transition-all duration-300">Delete</button>
</form>

    </div>
</dialog>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-10">
                        {{ $shelves->links() }}
                    </div>
                </div>
            </div>

            <!-- Create Shelf Form -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-base font-semibold mb-2">Create Shelf Form</h2>
                <hr class="mb-4">
                <form action="{{ route('admin.shelf.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Name</label>
                            <input type="text" name="shelf_name" placeholder="Shelf Name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" />
                            @error('shelf_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Position -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Position</label>
                            <textarea name="shelf_position" placeholder="Shelf Position" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"></textarea>
                            @error('shelf_position')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Button -->
                        <button type="submit"
                            class="w-full bg-gray-800 text-white font-semibold py-2 px-4 rounded-md hover:bg-gray-700 transition">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

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
