<x-layout.admin />

<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Semua Peminjaman</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-md mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="w-full border-collapse bg-white">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left border-b border-gray-300">Nama Siswa</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Buku yang Dipinjam</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Status</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Tanggal</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Fine</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Notes</th>
                    <th class="py-3 px-6 text-left border-b border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowings as $borrowing)
                <tr class="hover:bg-gray-50 border-b border-gray-200">
                    <td class="py-4 px-6 border-r border-gray-200">{{ $borrowing->user->firstname }} {{ $borrowing->user->lastname }}</td>
                    <td class="py-4 px-6 border-r border-gray-200">
                        <ul class="list-disc list-inside">
                            @foreach($borrowing->details as $detail)
                                <li>{{ $detail->book->book_name ?? '-' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="py-4 px-6 border-r border-gray-200">
    <span class="{{ $borrowing->borrowing_isreturned ? 'text-green-600' : 'text-red-600' }} font-semibold">
        {{ $borrowing->borrowing_isreturned ? 'Dikembalikan' : 'Belum Dikembalikan' }}
    </span>
</td>

                    <td class="py-4 px-6 border-r border-gray-200">{{ $borrowing->created_at->format('d M Y') }}</td>
                    <td class="py-4 px-6 border-r border-gray-200">
                        <form method="POST" action="{{ route('admin.borrowings.update', $borrowing->borrowing_id) }}">
                            @csrf
                            <input type="number" step="0.01" name="borrowing_fine" value="{{ $borrowing->borrowing_fine }}" class="w-20 border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </td>
                    <td class="py-4 px-6 border-r border-gray-200">
                            <textarea name="borrowing_notes" class="w-60 h-16 border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $borrowing->borrowing_notes }}</textarea>
                    </td>
                    <td class="py-4 px-6">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-500">Tidak ada data peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>