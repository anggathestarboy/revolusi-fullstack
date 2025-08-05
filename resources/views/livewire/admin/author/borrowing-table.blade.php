<div>
    <div class="bg-white shadow-md rounded-lg p-6 mt-10">
    <h2 class="text-base font-semibold mb-4 text-gray-700">📖 Daftar Peminjaman</h2>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
   
</div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-6 py-4 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        

     <input
    type="search"
    placeholder="Search Student borrowing by name"
    wire:model.live.debounce.250ms="searchStudent"
    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
>

<br><br>

        <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
            <thead class="bg-gray-50">
                <tr class="text-gray-700 font-semibold text-xs uppercase tracking-wider">
                    <th class="px-4 py-3">Nama Siswa</th>
                    <th class="px-4 py-3">Buku yang Dipinjam</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Fine</th>
                    <th class="px-4 py-3">Notes</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($borrowings as $borrowing)
                <tr class="hover:bg-gray-50 cursor-pointer">
                    <td class="px-4 py-3">{{ $borrowing->user->firstname }} {{ $borrowing->user->lastname }}</td>
                    <td class="px-4 py-3">
                        <ul class="list-disc list-inside">
                            @foreach($borrowing->details as $detail)
                               {{ $detail->book->book_name ?? '-' }}
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-4 py-3">
                        <span class="{{ $borrowing->borrowing_isreturned ? 'text-green-700' : 'text-red-700' }} font-semibold">
                            {{ $borrowing->borrowing_isreturned ? 'Dikembalikan' : 'Belum Dikembalikan' }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $borrowing->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3">
                        <form method="POST" action="{{ route('admin.borrowings.update', $borrowing->borrowing_id) }}">
                            @csrf
                            <input type="number" step="0.01" name="borrowing_fine" value="{{ $borrowing->borrowing_fine }}" class="w-24 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition">
                        </td>
                    <td class="px-4 py-3">
                            <textarea name="borrowing_notes" class="w-72 h-20 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition">{{ $borrowing->borrowing_notes }}</textarea>
                    </td>
                    <td class="px-4 py-3">
           <button type="button" wire:click="showDetails('{{ $borrowing->borrowing_id }}')" 
    class="bg-gray-700 text-white px-3 py-2 rounded-md hover:bg-gray-800 ml-2">
    Lihat Detail
</button>


                            <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-1 focus:ring-blue-500 transition duration-200">Simpan</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-600 font-medium">Tidak ada data peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@if($showModal && $selectedBorrowing)
<div class="fixed inset-0 z-50 flex items-center justify-center pointer-events-none">
    <div class="bg-white border border-gray-300 shadow-2xl rounded-xl p-6 w-full max-w-xl mx-auto relative pointer-events-auto">
        <!-- Tombol close -->
        <button wire:click="$set('showModal', false)"
            class="absolute top-3 right-3 text-gray-500 hover:text-red-600 text-xl font-bold focus:outline-none">
            ❌
        </button>

        <h2 class="text-2xl font-semibold mb-4 text-gray-800">📋 Detail Peminjaman</h2>

        <div class="space-y-3 text-gray-700 text-sm">
            <p><strong>👤 Nama Siswa:</strong> {{ $selectedBorrowing->user->firstname }} {{ $selectedBorrowing->user->lastname }}</p>
            <p><strong>📅 Tanggal Pinjam:</strong> {{ $selectedBorrowing->created_at->format('d M Y H:i') }}</p>
            <p>
                <strong>📦 Tanggal Pengembalian:</strong>
                @if($selectedBorrowing->borrowing_isreturned)
                    {{ $selectedBorrowing->updated_at->format('d M Y H:i') }}
                @else
                    <span class="text-red-500 font-semibold">Belum dikembalikan</span>
                @endif
            </p>

            <div>
                <strong>📚 Buku yang Dipinjam:</strong>
                <ul class="list-disc list-inside ml-4 mt-1">
                    @foreach($selectedBorrowing->details as $detail)
                        {{ $detail->book->book_name }}
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif





</div>


