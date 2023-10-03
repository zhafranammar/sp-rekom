    <x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode Jurusan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Jurusan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fakta
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($jurusans as $jurusan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $jurusan->kode_jurusan }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $jurusan->nama_jurusan }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        @foreach($jurusan->rule_jurusan as $ruleJurusan)
                                            @foreach($ruleJurusan->rule_details as $ruleDetail)
                                                {{ $ruleDetail->fakta->deskripsi }}<br>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>