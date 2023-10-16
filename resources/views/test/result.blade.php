<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Load jQuery FIRST -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class=" bg-cyan-200">
    <header class="bg-white shadow-xl dark:bg-gray-900">
        <nav >
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ route('test.start') }}" class="flex items-center">
                    <img src="https://umsida.ac.id/wp-content/uploads/2020/01/logoGraph300x300.png" class="h-8 md:h-12 mr-3" alt="UNIVERSITAS MUHAMMADIYAH SIDOARJO Logo" />
                    <span class="self-center text-xl md:text-2xl font-semibold whitespace-nowrap dark:text-white">SIPRESKU</span>
                </a>
                <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
            </div>
        </nav>

    </header>

    <main>
        <div class=" class="bg-white max-w-screen-xl shadow-2x1 mt-10">
            <div class="py-12">
                <div class="max-w-7xl mx-auto px-5 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class=" bg-white border-b border-gray-200">
                            <h3 class="text-xl md:text-2x1 font-extrabold text-center mt-6 mb-4">BIODATA TEST</h3>
                            <hr>
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200 p-2 md:p-6">
                                    <tr>
                                        <td class="px-6 py-4 font-bold">Nama</td>
                                        <td class="px-6 py-4">{{ $test->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">Usia</td>
                                        <td class="px-6 py-4">{{ $test->usia }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">Jenis Kelamin</td>
                                        <td class="px-6 py-4">{{ $test->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">Hasil</td>
                                        <td class="px-6 py-4">{{ $test->hasil }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">Sertifikat</td>
                                        <td class="px-6 py-4"><a href="{{ route('get.certificate', ['id' => $test->id]) }}"><i class="fas fa-file-pdf" style="color: red;"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" class="bg-white max-w-screen-xl shadow-2xl">
            <div class="py-12">
                <div class="max-w-7xl mx-auto px-5 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class=" bg-white border-b border-gray-200">
                            <h3 class="text-xl md:text-2x1 font-bold text-center mt-6 mb-5 md:mt-10">DETAIL JAWABAN TEST</h3>
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200 p-2 md:p-6">
                                    <hr>
                                    @foreach($test->details as $detail)
                                    <tr>
                                        <td class="px-6 py-4 font-bold">{{ $detail->fakta->deskripsi }}</td>
                                        <td class="px-6 py-4">{{ $detail->is_true ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <footer class="bg-white shadow-xl dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="flex items-center justify-between">
                <a class="flex items-center mb-4 mt-4 md:mt-0 sm:mb-0">
                    <img src="https://umsida.ac.id/wp-content/uploads/2020/01/logoGraph300x300.png" class=" h-8 md:h-12 mr-3" alt="UNIVERSITAS MUHAMMADIYAH SIDOARJO Logo" />
                    <span class="self-center text-xl md:text-2xl font-semibold whitespace-nowrap dark:text-white">SIPRESKU</span>
                </a>
                <div>
                    <a href="#" class="text-lg md:text-xl mr-4 hover:underline md:mr-6 ">About</a>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-5" />
            <span class="block text-sm text-gray-500 text-center dark:text-gray-400">© 2023 <a class="hover:underline">Erika Anjani Putri™</a>. All Rights Reserved.</span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl mb-4">Biodata Test</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 font-bold">Nama</td>
                                <td class="px-6 py-4">{{ $test->nama }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Usia</td>
                                <td class="px-6 py-4">{{ $test->usia }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Jenis Kelamin</td>
                                <td class="px-6 py-4">{{ $test->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Hasil</td>
                                <td class="px-6 py-4">{{ $test->hasil }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Sertifikat</td>
                                <td class="px-6 py-4"><a href="{{ route('get.certificate', ['id' => $test->id]) }}"><i class="fas fa-file-pdf" style="color: red;"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="text-xl my-4">Detail Jawaban Test</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($test->details as $detail)
                            <tr>
                                <td class="px-6 py-4 font-bold">{{ $detail->fakta->deskripsi }}</td>
                                <td class="px-6 py-4">{{ $detail->is_true ? 'Ya' : 'Tidak' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
