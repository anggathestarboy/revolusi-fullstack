@extends('layouts.user')

@section('title', 'Library App - Home')

@section('content')
<!-- Hero -->
<section class="relative bg-cover bg-center h-[80vh] flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794');">
  <div class="absolute inset-0 bg-black opacity-60"></div>
  <div class="relative z-10 text-center text-white max-w-xl px-4">
    <h1 class="text-3xl md:text-4xl font-semibold mb-4">Welcome to Library App</h1>
    <p class="text-base mb-6">Choose from a wide range of popular books from all the categories you want here.</p>
    <a href="#" class="px-6 py-2 bg-white text-gray-800 rounded hover:bg-gray-200 transition">Check Our Books</a>
  </div>
</section>

<!-- Welcome Section -->
<section class="bg-gray-50 py-10 px-4">
  <div class="max-w-xl mx-auto flex flex-col items-center text-center gap-4">
    <img src="https://cdn-icons-png.freepik.com/512/15772/15772135.png" alt="Book Image" class="w-24" />
    <h2 class="text-xl font-semibold">WELCOME TO LIBRARY APP</h2>
    <p class="text-sm text-gray-700">Choose the best books you want to read in here.</p>
    <button class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
      Check Our Books
    </button>
  </div>
</section>


<!-- Featured Books -->
<section class="py-16 px-6 bg-white">
  <h2 class="text-center text-2xl font-semibold mb-10">Featured Books</h2>
  <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Book Cards -->
    <div class="bg-gray-100 rounded-lg shadow-md p-4 text-center">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHApvr1ZFdQ8ugssvTcmfUXeOSEFj1jKNiPQ&s" alt="Madilog" class="w-32 h-44 object-cover mx-auto rounded" />
      <h3 class="mt-4 font-medium text-gray-700">Madilog</h3>
      <a href="#" class="text-sm mt-1 inline-block text-blue-600 hover:underline">View Details</a>
    </div>
    <div class="bg-gray-100 rounded-lg shadow-md p-4 text-center">
      <img src="https://elibrary.smapjbintaro.sch.id/lib/minigalnano/createthumb.php?filename=images/docs/sejarah_dunia_yang_disembunyikan.jpg.jpg&width=200" alt="Book 2" class="w-32 h-44 object-cover mx-auto rounded" />
      <h3 class="mt-4 font-medium text-gray-700">Sejarah Dunia Yang Disembunyikan</h3>
      <a href="#" class="text-sm mt-1 inline-block text-blue-600 hover:underline">View Details</a>
    </div>
    <div class="bg-gray-100 rounded-lg shadow-md p-4 text-center">
      <img src="https://www.lib.bwi.go.id/wp-content/uploads/2021/01/438-scaled.jpg" alt="Book 3" class="w-32 h-44 object-cover mx-auto rounded" />
      <h3 class="mt-4 font-medium text-gray-700">Aldof Hitler Mati Di Indonesia</h3>
      <a href="#" class="text-sm mt-1 inline-block text-blue-600 hover:underline">View Details</a>
    </div>
    <div class="bg-gray-100 rounded-lg shadow-md p-4 text-center">
      <img src="https://www.whiteboardjournal.com/wp-content/uploads/2022/09/FcsC-XpaIAMADSK.jpeg" alt="Book 4" class="w-32 h-44 object-cover mx-auto rounded" />
      <h3 class="mt-4 font-medium text-gray-700">Siksa Neraka</h3>
      <a href="#" class="text-sm mt-1 inline-block text-blue-600 hover:underline">View Details</a>
    </div>
  </div>
</section>

<!-- Book Categories -->
<section class="py-16 px-6 bg-gray-50">
  <h2 class="text-center text-2xl font-semibold mb-10">Book Categories</h2>
  <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-100 transition">
      <i class="fas fa-book text-2xl text-gray-700 mb-2"></i>
      <p class="text-sm font-medium">Fiction</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-100 transition">
      <i class="fas fa-flask text-2xl text-gray-700 mb-2"></i>
      <p class="text-sm font-medium">Science</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-100 transition">
      <i class="fas fa-history text-2xl text-gray-700 mb-2"></i>
      <p class="text-sm font-medium">History</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-100 transition">
      <i class="fas fa-laugh text-2xl text-gray-700 mb-2"></i>
      <p class="text-sm font-medium">Humor</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center hover:bg-gray-100 transition">
      <i class="fas fa-brain text-2xl text-gray-700 mb-2"></i>
      <p class="text-sm font-medium">Psychology</p>
    </div>
  </div>
</section>
@endsection
