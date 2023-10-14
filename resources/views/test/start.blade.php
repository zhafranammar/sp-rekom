<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Start Test') }}
        </h2>
    </x-slot>

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
</x-app-layout>
