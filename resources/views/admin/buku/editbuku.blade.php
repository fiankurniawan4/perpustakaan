@extends('admin.layouts.dash')
@section('content')
    <div class="flex h-full w-full flex-col">
        <!-- Main -->
        <div class="h-full overflow-hidden pl-10">
            <main id="dashboard-main" class="h-[calc(100vh-1rem)] overflow-auto px-4 py-10">
                <form class="max-w-sm" action="{{ route('edit', $buku->f_id) }}" method="POST" enctype="multipart/form-data">
                    {{-- <form class="max-w-sm" action="" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="mb-5">
                        <label for="f_judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Buku</label>
                        <input type="text" id="f_judul" name="f_judul"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Majo no Tabitabi" value="{{ $buku->f_judul }}" required autocomplete="off">
                    </div>
                    <div class="mb-5">
                        <label for="f_deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                            Buku</label>
                        <input type="text" id="f_deskripsi" name="f_deskripsi"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required autocomplete="off" value="{{ $buku->f_deskripsi }}">
                    </div>
                    <div class="mb-5">
                        <label for="f_idkategori"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                            Buku</label>
                        <select name="f_idkategori" id="f_idkategori"
                            class="shadow-sm border border-gray-200 w-full rounded-lg">
                            @foreach ($kategori as $item)
                                @php
                                    $kategoriid = $item->f_id;
                                @endphp
                                @if ($buku->f_idkategori == $kategoriid)
                                    <option selected value="{{ $item->f_id }}">{{ $item->f_kategori }}</option>
                                @else
                                    <option value="{{ $item->f_id }}">{{ $item->f_kategori }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="f_penerbit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                        <input type="text" id="f_penerbit" name="f_penerbit"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required autocomplete="off" value="{{ $buku->f_penerbit }}">
                    </div>
                    <div class="mb-5">
                        <label for="f_pengarang"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                        <input type="text" id="f_pengarang" name="f_pengarang"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required autocomplete="off" value="{{ $buku->f_pengarang }}">
                    </div>

                    <div class="mb-5">
                        <label for="f_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                            Buku</label>
                        <select name="f_status" id="f_status" class="shadow-sm border border-gray-200 w-full rounded-lg">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                        Buku</button>
                </form>
            </main>
        </div>
    </div>
    
@endsection
