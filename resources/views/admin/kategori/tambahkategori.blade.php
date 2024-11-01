@extends('admin.layouts.dash')
@section('content')
    <div class="flex h-full w-full flex-col">
        <!-- Main -->
        <div class="h-full overflow-hidden pl-10">
            <main id="dashboard-main" class="h-[calc(100vh-1rem)] overflow-auto px-4 py-10">
                <form class="max-w-sm" action="{{ route('tambahKategori') }}" method="POST" enctype="multipart/form-data">
                    {{-- <form class="max-w-sm" action="" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="mb-5">
                        <label for="f_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                            Buku</label>
                        <input type="text" id="f_kategori" name="f_kategori"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Novel" required autocomplete="off">
                    </div>
                    
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Kategori</button>
                </form>
            </main>
        </div>
    </div>
    
@endsection
