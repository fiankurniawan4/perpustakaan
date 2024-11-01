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
<body class="bg-white rounded-lg py-5">
    <div class="container flex flex-col mx-auto bg-white rounded-lg">
        <div class="flex justify-center w-screen h-screen my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">
                    <form action="{{ route('adminLogin') }}" method="POST" class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl">
                        @csrf
                        <h3 class="mb-3 text-4xl font-extrabold text-grey-900">Sign In</h3>
                        <p class="text-grey-700">Welcome Back Admin</p>
                        <p class="mb-2 text-grey-700">Please Sign In to your account</p>
                        <label for="f_username" class="mb-2 text-sm text-start text-grey-900">Username*</label>
                        <input id="f_username" type="text" name="f_username" placeholder="yourusername"
                            class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-4 placeholder:text-grey-700 bg-grey-200 text-grey-900 rounded-2xl" autocomplete="off"/>
                        <label for="f_password" class="mb-2 text-sm text-start text-grey-900">Password*</label>
                        <input id="f_password" name="f_password" type="password" placeholder="Enter a password"
                            class="flex items-center w-full px-5 py-4 mb-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-grey-900 rounded-2xl" autocomplete="off"/>
                        <div class="flex flex-row justify-between">
                            <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
                                <input type="checkbox" name="remember">
                                <span class="ml-3 text-sm font-normal text-grey-900">Keep me logged in</span>
                            </label>
                        </div>
                        <div class="flex justify-start items-start">

                            <p class="text-red-600 mb-4"></p>
                        </div>
                        <button
                            class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none bg-blue-400 hover:bg-blue-600 hover:text-white text-gray-600 transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">Sign
                            In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
