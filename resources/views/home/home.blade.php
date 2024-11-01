<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class=" bg-gray-200 font-poppins">
    @include('home.layouts.navbar')
    <div class="flex justify-center items-center mt-14">
        <div class="container p-4">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Buku yang dipinjam</h2>
                </div>
                {{-- <div class="my-2 flex sm:flex-row flex-col">
                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <form action="">
                            <input placeholder="Search"
                                class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                        </form>
                    </div>
                </div> --}}
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nama Buku
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Tanggal Peminjaman
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Tanggal Kembali
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nama Pustakawan / Admin
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $item)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $item->details->buku->buku->f_judul }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @php
                                                    $timestamp = strtotime($item->f_tanggalpeminjaman);
                                                    $namaHari = [
                                                        'Minggu',
                                                        'Senin',
                                                        'Selasa',
                                                        'Rabu',
                                                        'Kamis',
                                                        'Jumat',
                                                        'Sabtu',
                                                    ];

                                                    // Array bulan dalam Bahasa Indonesia
                                                    $namaBulan = [
                                                        1 => 'Januari',
                                                        'Februari',
                                                        'Maret',
                                                        'April',
                                                        'Mei',
                                                        'Juni',
                                                        'Juli',
                                                        'Agustus',
                                                        'September',
                                                        'Oktober',
                                                        'November',
                                                        'Desember',
                                                    ];

                                                    // Mendapatkan nama hari
                                                    $hari = $namaHari[date('w', $timestamp)];

                                                    // Mendapatkan tanggal
                                                    $tanggal = date('j', $timestamp);

                                                    // Mendapatkan nama bulan
                                                    $bulan = $namaBulan[date('n', $timestamp)];

                                                    // Mendapatkan tahun
                                                    $tahun = date('Y', $timestamp);

                                                    // Format hasil
                                                    $formatHariTanggal =
                                                        $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
                                                @endphp
                                                {{ $formatHariTanggal }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @php
                                                    if ($item->details->f_tanggalkembali == null) {
                                                        $tgkembali = 'Belum Dikembalikan';
                                                    } else {
                                                        $time = strtotime($item->details->f_tanggalkembali);
                                                        $nH = [
                                                            'Minggu',
                                                            'Senin',
                                                            'Selasa',
                                                            'Rabu',
                                                            'Kamis',
                                                            'Jumat',
                                                            'Sabtu',
                                                        ];
                                                        $nB = [
                                                            1 => 'Januari',
                                                            'Februari',
                                                            'Maret',
                                                            'April',
                                                            'Mei',
                                                            'Juni',
                                                            'Juli',
                                                            'Agustus',
                                                            'September',
                                                            'Oktober',
                                                            'November',
                                                            'Desember',
                                                        ];
                                                        $h = $nH[date('w', $time)];
                                                        $t = date('j', $time);
                                                        $b = $nB[date('n', $time)];
                                                        $ta = date('Y', $time);
                                                        $tgkembali = $h . ', ' . $t . ' ' . $b . ' ' . $ta;
                                                    }
                                                @endphp
                                                {{ $tgkembali }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            {{ $item->admin->f_nama }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
