<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library App - Register</title>
    @vite('resources/css/app.css')
    
    <!-- Font dan Tailwind -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Alpine.js untuk popup -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 font-[Poppins]">

    <!-- Popup Success -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transition ease-out duration-300 z-50">
            <div class="flex justify-between items-center gap-4">
                <span>🎉 {{ session('success') }}</span>
                <button @click="show = false" class="text-white font-bold">✖</button>
            </div>
        </div>
    @endif

    <main class="px-6 md:px-64 lg:px-[32rem]">
        <section class="flex justify-center items-center min-h-screen">
            <div class="py-6 px-4 bg-white rounded-lg border border-gray-200 w-full shadow-md">
                <h1 class="text-center font-semibold text-gray-800">Library App - Register</h1>
                <hr class="my-3 w-full bg-gray-100">
                <form action="/register" method="POST" class="mt-4">
                    @csrf
                    <div class="flex flex-col gap-3 text-gray-800">
                        <div class="flex flex-col gap-2">
                            <label class="font-medium text-sm">First Name</label>
                            <input type="text" name="firstname" placeholder="First Name"
                                class="px-3 py-2 border border-gray-300 rounded text-sm placeholder-gray-400 
                                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-medium text-sm">Last Name</label>
                            <input type="text" name="lastname" placeholder="Last Name"
                                class="px-3 py-2 border border-gray-300 rounded text-sm placeholder-gray-400 
                                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-medium text-sm">Username</label>
                            <input type="text" name="username" placeholder="Username"
                                class="px-3 py-2 border border-gray-300 rounded text-sm placeholder-gray-400 
                                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-medium text-sm">Email</label>
                            <input type="email" name="email" placeholder="Email"
                                class="px-3 py-2 border border-gray-300 rounded text-sm placeholder-gray-400 
                                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-medium text-sm">Password</label>
                            <input type="password" name="password" placeholder="Password"
                                class="px-3 py-2 border border-gray-300 rounded text-sm placeholder-gray-400 
                                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        </div>

                        <div class="flex flex-col gap-3 mt-2">
                            <button type="submit"
                                class="px-3 py-2 bg-gray-800 rounded text-sm text-white font-medium block w-full 
                                transition-all duration-300 hover:bg-gray-900">Register</button>
                            <p class="text-sm text-center">Already have an account?
                                <a href="/login" class="text-blue-500 underline">Login here</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
