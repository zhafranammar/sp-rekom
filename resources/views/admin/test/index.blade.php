<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50">Nama</th>
                                <th class="px-6 py-3 bg-gray-50">Kelas</th>
                                <th class="px-6 py-3 bg-gray-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tests as $test)
                            <tr>
                                <td class="px-6 py-4">{{ $test->nama }}</td>
                                <td class="px-6 py-4">{{ $test->kelas }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.test.show', $test->id) }}" class="text-blue-500">View</a>
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
