<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- Responsive Grid for the boxes -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
                
                <div class="mx-8 bg-white dark:bg-gray-800 shadow-sm rounded-lg hover:shadow-lg transition">
                    <a href="{{ route('fakta.index') }}" class="block p-6 text-center">
                        <img src="{{ asset('assets/Fakta.png') }}" alt="Fakta" class="mb-4 w-full object-cover rounded">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Fakta') }}</h2>
                    </a>
                </div>

                <!-- Jurusan Card -->
                <div class="mx-8 bg-white dark:bg-gray-800 shadow-sm rounded-lg hover:shadow-lg transition">
                    <a href="{{ route('jurusan.index') }}" class="block p-6 text-center">
                        <img src="{{ asset('assets/Jurusan.png') }}" alt="Jurusan" class="mb-4 w-full object-cover rounded">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Jurusan') }}</h2>
                    </a>
                </div>

                <!-- Test Card -->
                <div class="mx-8 bg-white dark:bg-gray-800 shadow-sm rounded-lg hover:shadow-lg transition">
                    <a href="{{ route('admin.test.index') }}" class="block p-6 text-center">
                        <img src="{{ asset('assets/test.png') }}" alt="Test" class="mb-4 w-full object-cover rounded">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Test') }}</h2>
                    </a>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
