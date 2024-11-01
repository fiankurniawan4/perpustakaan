<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIBRARY | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&family=PT+Sans&family=Poppins&family=Rubik+Doodle+Shadow&display=swap"
        rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css"
        rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900 font-poppins">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;1,600&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            font-family: 'Source Sans Pro';
        }

        main#dashboard-main::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        main#dashboard-main::-webkit-scrollbar-thumb {
            border-radius: 9999px;
            background-color: rgb(156 163 175 / 0.75);
        }

        main#dashboard-main::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgb(156 163 175 / 0.75);
            border-radius: 10px;
        }
    </style>

    <div class="bg-slate-200 flex h-screen">
        <aside class="fixed z-50 md:relative">
            <!-- Sidebar -->
            <input type="checkbox" class="peer hidden" id="sidebar-open" />
            <label
                class="peer-checked:rounded-full peer-checked:p-2 peer-checked:right-6 peer-checked:bg-gray-600 peer-checked:text-white absolute top-8 z-20 mx-4 cursor-pointer md:hidden"
                for="sidebar-open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </label>
            <nav aria-label="Sidebar Navigation"
                class="peer-checked:w-64 left-0 z-10 flex h-screen w-0 flex-col overflow-hidden bg-gray-700 text-white transition-all md:h-screen md:w-64 lg:w-72">
                <div class="bg-slate-800 mt-5 py-4 pl-10 md:mt-10">
                    <span class="flex flex-col">
                        <span class="text-xl">{{ auth()->guard('admin')->user()->f_nama }}</span>
                        <span class="text-sm">{{ auth()->guard('admin')->user()->f_level }}</span>
                    </span>
                </div>
                <ul class="mt-4 md:mt-8">
                    <li class="relative">
                        @if($home == 'active')
                        <a href="/dashboard"
                            class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none underline">
                            <span><i class="fa-light fa-house"></i></span><span class="">Overview</span>
                        </a>
                        @else
                        <a href="/dashboard"
                            class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                            <span><i class="fa-light fa-house"></i></span><span class="">Overview</span>
                        </a>
                        @endif
                    </li>
                </ul>
                <ul class="">
                    <li class="relative">
                        @if($book == 'active')
                        <a href="/dashboard/buku"
                            class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none underline">
                            <span><i class="fa-light fa-book"></i></span><span class="">Buku</span>
                        </a>
                        @else
                        <a href="/dashboard/buku"
                            class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                            <span><i class="fa-light fa-book"></i></span><span class="">Buku</span>
                        </a>
                        @endif
                    </li>
                </ul>                    
                <ul class="">
                    <li class="relative">
                        @if($kategoris == 'active')
                        <a href="/dashboard/kategori"
                            class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none underline">
                            <span><i class="fa-light fa-book"></i></span><span class="">Kategori</span>
                        </a>
                        @else
                        <a href="/dashboard/kategori"
                            class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                            <span><i class="fa-light fa-book"></i></span><span class="">Kategori</span>
                        </a>
                        @endif
                    </li>
                </ul>
                <ul class="">
                    <li class="relative">
                        @if($pinjam == 'active')
                        <a href="/dashboard/peminjaman"
                        class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none underline">
                        <span><i class="fa-light fa-table"></i></span><span class="">Peminjaman Buku</span>
                    </a>
                        @else
                    <a href="/dashboard/peminjaman"
                    class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                            <span><i class="fa-light fa-table"></i></span><span class="">Peminjaman Buku</span>
                        </a>
                        @endif
                    </li>
                </ul>
                <ul class="">
                    <li class="relative">
                        @if($anggota == 'active')
                        <a href="/dashboard/anggota"
                            class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none underline">
                            <span><i class="fa-light fa-user"></i></span><span class="">Anggota</span>
                        </a>
                        @else
                        <a href="/dashboard/anggota"
                        class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                        <span><i class="fa-light fa-user"></i></span><span class="">Anggota</span>
                    </a>
                        @endif
                    </li>
                </ul>
                @if (auth()->guard('admin')->user()->f_level == 'Admin')
                <ul class="">
                    <li class="relative">
                        @if($admin == 'active')
                        <a href="/dashboard/admin"
                            class="focus:bg-slate-600 hover:bg-slate-600 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none underline">
                            <span><i class="fa-light fa-user"></i></span><span class="">Admin / Pustakawan</span>
                        </a>
                        @else
                        <a href="/dashboard/admin"
                        class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                        <span><i class="fa-light fa-user"></i></span><span class="">Admin / Pustakawan</span>
                    </a>
                        @endif
                    </li>
                </ul>
                @endif
                <ul class="">
                    <li class="relative">
                        <a href="/admin/logout"
                        class="focus:bg-slate-600 hover:bg-slate-600 text-gray-200 flex w-full space-x-2 rounded-md px-10 py-4 font-semibold focus:outline-none">
                            <span><i class="fa-regular fa-right-from-bracket"></i></span><span class="">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        @yield('content')
        <script>
            window.onload = function () {
                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ session('error') }}',
                    })
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{ $error }}',
                        })
                    @endforeach
                @endif
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                    })
                @endif
            }
        </script>
</body>