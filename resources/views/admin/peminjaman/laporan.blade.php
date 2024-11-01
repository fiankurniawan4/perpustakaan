<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Peminjaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <h1 class="text-2xl font-bold">PEMINJAMAN</h1>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Anggota
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Kembali
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Pustakawan / Admin
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $item)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        {{-- jika null maka kosongkan --}}
                        {{ $item->details->buku->buku->f_judul }}
                        {{-- Fikri Baidel --}}
                    </th>
                    <td class="px-6 py-4">
                        @php
                            $timestamp = strtotime($item->f_tanggalpeminjaman);
                            $namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

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
                            $formatHariTanggal = $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
                        @endphp
                        {{ $formatHariTanggal }}
                        {{-- Surya Citra --}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->anggota->f_nama }}
                        {{-- Alan --}}
                    </td>
                    <td class="px-6 py-4">
                        @php
                            if ($item->details->f_tanggalkembali == null) {
                                $tgkembali = 'Belum Dikembalikan';
                            } else {
                                $time = strtotime($item->details->f_tanggalkembali);
                                $nH = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
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
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->admin->f_nama }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer mt-4">
        <div>&copy; LIBRARY</div>
    </div>
</body>

</html>
