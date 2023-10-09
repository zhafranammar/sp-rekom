<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Jurusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-xl mb-4">Detail Jurusan</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 font-bold">Kode Jurusan</td>
                                <td class="px-6 py-4">{{ $jurusan->kode_jurusan }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Nama Jurusan</td>
                                <td class="px-6 py-4">{{ $jurusan->nama_jurusan }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-bold">Fakta</td>
                                <td class="px-6 py-4">
                                    @foreach($jurusan->ruleDetails as $ruleDetail)
                                        {{ $ruleDetail->fakta->deskripsi }}<br>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
