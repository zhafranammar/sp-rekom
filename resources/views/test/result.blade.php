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
</x-app-layout>
