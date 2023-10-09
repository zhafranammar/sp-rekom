<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Nama: {{ $test->nama }}</h3>
                    <h4>Kelas: {{ $test->kelas }}</h4>
                    
                    <h5>Results:</h5>
                    <ul>
                        @foreach($test->testDetails as $detail)
                            <li>{{ $detail->kode_fakta }}: {{ $detail->isTrue ? 'True' : 'False' }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>