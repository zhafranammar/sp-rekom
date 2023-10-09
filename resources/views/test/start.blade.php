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
                        <!-- Input fields for your test -->
                        <div>
                            <label>Nama:</label>
                            <input type="text" name="nama">
                        </div>
                        <div>
                            <label>Kelas:</label>
                            <input type="text" name="kelas">
                        </div>
                        <!-- Repeat below for each fact -->
                        <div>
                            <label>Kode Fakta:</label>
                            <input type="text" name="kode_fakta">
                        </div>
                        <!-- ... -->
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
