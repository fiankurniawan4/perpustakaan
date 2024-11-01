@extends('admin.layouts.dash')
@section('content')
    <div class="flex h-full w-full flex-col">
        <!-- Main -->
        <div class="h-full overflow-hidden pl-10">
            <main id="dashboard-main" class="h-[calc(100vh-1rem)] overflow-auto px-4 py-10">
                <form class="max-w-sm" action="{{ route('adminTambah') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="f_username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username Admin</label>
                        <input type="text" id="f_username" name="f_username"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="username" required autocomplete="off">
                    </div>
                    <div class="mb-5">
                        <label for="f_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Admin</label>
                        <input type="text" id="f_nama" name="f_nama" placeholder="Fian Kurniawan"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required autocomplete="off">
                    </div>
                    <div class="mb-5">
                        <label for="f_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="f_password" name="f_password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required autocomplete="off">
                    </div>
                    <div class="mb-5">
                        <label for="f_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Admin</label>
                        <select name="f_level" id="f_level" class="shadow-sm border border-gray-200 w-full rounded-lg">
                            <option selected disabled>Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Pustakawan">Pustakawan</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambahkan
                        Admin</button>
                </form>
            </main>
        </div>
    </div>
@endsection
