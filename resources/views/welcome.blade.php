<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css"
        rel="stylesheet">
</head>

<body>
    <div class="overflow-x-hidden">
        <header
            class="text-slate-700 relative flex max-w-screen-xl flex-col overflow-hidden px-4 py-4 lg:mx-auto lg:flex-row lg:items-center">
            <a href="#" class="flex items-center whitespace-nowrap text-2xl font-black">
                {{-- <span class="mr-2 w-8">
                    <img src="/images/JOJj79gp_Djhwdp_ZOKLL.png" alt="" />
                </span> --}}
                PERPUSTAKAAN
            </a>
            <input type="checkbox" class="peer hidden" id="navbar-open" achecked />
            <label class="absolute top-5 right-5 cursor-pointer lg:hidden" for="navbar-open">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>
            <nav aria-label="Header Navigation"
                class="peer-checked:pt-8 peer-checked:max-h-60 flex max-h-0 w-full flex-col items-center overflow-hidden transition-all lg:ml-24 lg:max-h-full lg:flex-row">
                <hr class="mt-4 w-full lg:hidden" />
                <div class="my-4 flex items-center space-x-6 space-y-2 lg:my-0 lg:ml-auto lg:space-x-8 lg:space-y-0">
                    <a href="{{ route('loginPage') }}" title=""
                        class="whitespace-nowrap rounded font-medium transition-all duration-200 focus:outline-none focus:ring-1 focus:ring-blue-700 focus:ring-offset-2 hover:text-opacity-50">
                        Log in </a>
                </div>
            </nav>
        </header>
        <div class="relative py-12 sm:py-16 lg:pt-20 xl:pb-0">
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <h1
                        class="mt-5 text-3xl font-light leading-tight text-gray-900 sm:text-5xl sm:leading-tight lg:text-6xl lg:leading-tight">
                        PERPUSTAKAAN
                    </h1>
                    <p class="mx-auto mt-12 max-w-md leading-7 text-gray-600">Perpustakaan membaca buku / meminjam buku
                    </p>
                    
                </div>
            </div>
            <div
                class="mt-16 mb-16 flex flex-col items-center justify-center divide-y divide-gray-300 sm:flex-row sm:divide-x sm:divide-y-0 md:mt-20">
                <div class="flex max-w-xs space-x-2 px-4 py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600"
                    viewBox="0 0 448 512">
                        <path
                            d="M64 0C28.7 0 0 28.7 0 64L0 448l0 0c0 35.3 28.7 64 64 64H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H416V413.3c18.6-6.6 32-24.4 32-45.3V48c0-26.5-21.5-48-48-48H64zM384 416v64H64c-17.7 0-32-14.3-32-32s14.3-32 32-32H384zM64 384c-11.7 0-22.6 3.1-32 8.6L32 64c0-17.7 14.3-32 32-32H96V384H64zm64 0V32H400c8.8 0 16 7.2 16 16V368c0 8.8-7.2 16-16 16H128zm48-240c0 8.8 7.2 16 16 16H352c8.8 0 16-7.2 16-16s-7.2-16-16-16H192c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H352c8.8 0 16-7.2 16-16s-7.2-16-16-16H192c-8.8 0-16 7.2-16 16z" />
                    </svg>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="flex max-w-xs space-x-2 px-4 py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="flex max-w-xs space-x-2 px-4 py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="f_username" class="block text-gray-700 font-semibold mb-2">Username</label>
                <input id="f_username" type="f_username" class="border rounded w-full py-2 px-3 text-gray-700" name="f_username" value="{{ old('f_username') }}" required autofocus autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="f_password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input id="f_password" type="f_password" class="border rounded w-full py-2 px-3 text-gray-700" name="f_password" required autocomplete="off">
            </div>

            <div class="mb-4">
                <input class="mr-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="text-gray-700" for="remember">Remember Me</label>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Login
                </button>
            </div>
        </form>
    </div> --}}
</body>

</html>
