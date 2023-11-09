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
                <a href="/" class="flex items-center">
                    <img src="https://umsida.ac.id/wp-content/uploads/2020/01/logoGraph300x300.png" class="h-8 md:h-12 mr-3" alt="UNIVERSITAS MUHAMMADIYAH SIDOARJO Logo" />
                    <span class="self-center text-xl md:text-2xl font-semibold whitespace-nowrap dark:text-white">SIPRESKU</span>
                </a>
                <a href="{{ route('login') }}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Login</a>
            </div>
        </nav>

    </header>

    <main class="mt-10">
        <div class="max-w-screen-2xl grid-cols-1 items-center mx-auto p-4 text-center grid justify-center">
            <h1 class="font-bold text-3xl mb-6 md:mb-8 md:font-extrabold md:text-5xl">Sistem Pakar Rekomendasi Jurusan</h1>
            <div class="ml-0 md:ml-48 lg:ml-96 text-center max-w-xl p-6 mt-5 mb-16 md:mb-24 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <form action="{{ route('test.submit') }}" method="post">
                    @csrf
                    <div x-data="{
                        slide: 0,
                        slides: {{ 2 + count($fakta) }},
                        checkValidity() {
                            for (let i = 0; i < this.slides; i++) {
                                const slideElement = this.$refs['slide' + i];
                                const inputs = slideElement.querySelectorAll('input:required');
                                for (let input of inputs) {
                                    if (!input.checkValidity()) {
                                        this.slide = i;
                                        return false;
                                    }
                                }
                            }
                            return true;
                        }
                    }" class="relative">

                        <!-- Slide for Nama -->
                        <div x-show="slide === 0" x-ref="slide0" class="carousel-slide">
                            <h5 class="text-center mb-4">Masukkan Nama Anda</h5>
                            <div class="text-center">
                                <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required>
                            </div>
                        </div>

                        <!-- Slide for Nis -->
                        <div x-show="slide === 1" x-ref="slide1" class="carousel-slide">
                            <h5 class="text-center mb-4">Masukkan NIS Anda</h5>
                            <div class="text-center">
                                <input type="text" name="nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required>
                            </div>
                        </div>    

                        <!-- Slide for Usia -->
                        <div x-show="slide === 2" x-ref="slide2" class="carousel-slide">
                            <h5 class="text-center mb-4">Masukkan Usia Anda</h5>
                            <div class="text-center">
                                <input type="number" name="usia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Usia" required>
                            </div>
                        </div>

                        <!-- Slide for Jenis Kelamin -->
                        <div x-show="slide === 3" x-ref="slide3" class="carousel-slide">
                            <h5 class="text-center mb-4">Pilih Jenis Kelamin Anda</h5>
                            <div class="text-center">
                                <select name="jenis_kelamin" class="border p-2 rounded mb-3 w-full" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>


                        <!-- Slides for Fakta -->
                        @foreach($fakta as $index => $fact)
                            <div x-show="slide === {{ $index + 4 }}" x-ref="slide{{ $index + 4 }}" class="carousel-slide">
                                <h5 class="text-center mb-4">{{ $fact->deskripsi }}</h5>
                                <div class="text-center">
                                    <label class="inline-flex items-center mr-3">
                                        <input type="radio" class="form-radio" name="{{ $fact->kode_fakta }}" value="1" required>
                                        <span class="ml-2">Ya</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio" name="{{ $fact->kode_fakta }}" value="0" required>
                                        <span class="ml-2">Tidak</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach

                        <!-- Controls -->
                        <div class="flex justify-center mt-4">
                            <button type="button" x-show="slide > 0" @click="slide--" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Previous</button>
                            <button type="button" x-show="slide < slides - 1" @click="slide++" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Next</button>
                            <button type="submit" x-show="slide === slides - 1" @click.prevent="checkValidity() && $el.closest('form').submit()" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                        </div>
                    </div>
                </form>
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
            {{ __('Start Test') }}
        </h2>
    </x-slo t>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('test.submit') }}" method="post">
                        @csrf

                        <div x-data="{
                            slide: 0,
                            slides: {{ 2 + count($fakta) }},
                            checkValidity() {
                                for (let i = 0; i < this.slides; i++) {
                                    const slideElement = this.$refs['slide' + i];
                                    const inputs = slideElement.querySelectorAll('input:required');
                                    for (let input of inputs) {
                                        if (!input.checkValidity()) {
                                            this.slide = i;
                                            return false;
                                        }
                                    }
                                }
                                return true;
                            }
                        }" class="relative">

                            <!-- Slide for Nama -->
                            <div x-show="slide === 0" x-ref="slide0" class="carousel-slide">
                                <h5 class="text-center mb-4">Masukkan Nama Anda</h5>
                                <div class="text-center">
                                    <input type="text" name="nama" class="border p-2 rounded mb-3 w-full" placeholder="Nama" required>
                                </div>
                            </div>

                            <!-- Slide for Usia -->
                            <div x-show="slide === 1" x-ref="slide1" class="carousel-slide">
                                <h5 class="text-center mb-4">Masukkan Usia Anda</h5>
                                <div class="text-center">
                                    <input type="number" name="usia" class="border p-2 rounded mb-3 w-full" placeholder="Usia" required>
                                </div>
                            </div>

                            <!-- Slide for Jenis Kelamin -->
                            <div x-show="slide === 2" x-ref="slide2" class="carousel-slide">
                                <h5 class="text-center mb-4">Pilih Jenis Kelamin Anda</h5>
                                <div class="text-center">
                                    <select name="jenis_kelamin" class="border p-2 rounded mb-3 w-full" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Slides for Fakta -->
                            @foreach($fakta as $index => $fact)
                                <div x-show="slide === {{ $index + 3 }}" x-ref="slide{{ $index + 3 }}" class="carousel-slide">
                                    <h5 class="text-center mb-4">{{ $fact->deskripsi }}</h5>
                                    <div class="text-center">
                                        <label class="inline-flex items-center mr-3">
                                            <input type="radio" class="form-radio" name="{{ $fact->kode_fakta }}" value="1" required>
                                            <span class="ml-2">Ya</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio" name="{{ $fact->kode_fakta }}" value="0" required>
                                            <span class="ml-2">Tidak</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Controls -->
                            <div class="flex justify-center mt-4">
                                <button type="button" x-show="slide > 0" @click="slide--" class="mr-2 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Previous</button>
                                <button type="button" x-show="slide < slides - 1" @click="slide++" class="ml-2 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Next</button>
                                <button type="submit" x-show="slide === slides - 1" @click.prevent="checkValidity() && $el.closest('form').submit()" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
