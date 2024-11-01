@extends('admin.layouts.dash')
@section('content')
    <div class="flex h-full w-full flex-col">
        <!-- Main -->
        <div class="h-full overflow-hidden pl-10">
            <main id="dashboard-main" class="h-[calc(100vh-1rem)] overflow-auto px-4 py-10">
                <form class="max-w-sm" action="{{ route('pinjamBuku') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="mb-5">
                        <label for="f_judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Buku</label>
                        <input type="text" id="f_judul" name="f_judul"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Majo no Tabitabi" required autocomplete="off">
                    </div> --}}
                    <div class="mb-5">
                        <label for="f_iddetailbuku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Buku</label>
                        <select name="f_iddetailbuku" id="f_iddetailbuku"
                            class="shadow-sm border border-gray-200 w-full rounded-lg">
                            <option value="0" selected disabled>Pilih Buku</option>
                            @foreach ($detail as $tes)
                                <option value="{{ $tes->buku->f_id }}">{{ $tes->buku->f_judul }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 text-sm">*Jika buku tidak tersedia maka buku tidak akan muncul dilist ini
                    </div>
                    <div class="mb-5">
                        <label for="f_idanggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Peminjam</label>
                        <select name="f_idanggota" id="f_idanggota"
                            class="shadow-sm border border-gray-200 w-full rounded-lg">
                            <option value="0" selected disabled>Pilih Anggota</option>
                            @foreach ($anggotas as $item)
                                <option value="{{ $item->f_id }}">{{ $item->f_username }}</option>
                            @endforeach
                        </select>
                       
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                        Peminjam
                        Buku</button>
                </form>
            </main>
        </div>
    </div>
@endsection
