<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Data Tests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('admin.test.index') }}" class="flex w-full md:w-auto mb-2 md:mb-0">
                            <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" class="p-2 border rounded-l w-full md:w-auto md:ml-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r flex items-center">
                                <span class="material-symbols-outlined mr-2">
                                    search
                                </span> Search
                            </button>
                        </form>

                        <!-- Date Filter Form -->
                        <form method="GET" action="{{ route('admin.test.index') }}" class="flex w-full md:w-auto">
                            <input type="date" name="start_date" placeholder="Start Date" value="{{ request('start_date') }}" class="p-2 border rounded-l w-full md:w-auto md:ml-2">
                            <input type="date" name="end_date" placeholder="End Date" value="{{ request('end_date') }}" class="p-2 border rounded-l w-full md:w-auto md:ml-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r flex items-center">
                                <span class="material-symbols-outlined mr-2">
                                    filter_list
                                </span> Filter
                            </button>
                        </form>
                        
                    
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50">
                                    <a href="{{ route('admin.test.index', ['sort' => 'nama', 'direction' => request('sort') == 'nama' && request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                        Nama
                                        @if(request('sort') == 'nama')
                                            @if(request('direction') == 'asc')
                                                <span class="material-symbols-outlined">arrow_drop_up</span>
                                            @else
                                                <span class="material-symbols-outlined">arrow_drop_down</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <a href="{{ route('admin.test.index', ['sort' => 'usia', 'direction' => request('sort') == 'usia' && request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                        Usia
                                        @if(request('sort') == 'usia')
                                            @if(request('direction') == 'asc')
                                                <span class="material-symbols-outlined">arrow_drop_up</span>
                                            @else
                                                <span class="material-symbols-outlined">arrow_drop_down</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <a href="{{ route('admin.test.index', ['sort' => 'jenis_kelamin', 'direction' => request('sort') == 'jenis_kelamin' && request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                        Jenis Kelamin
                                        @if(request('sort') == 'jenis_kelamin')
                                            @if(request('direction') == 'asc')
                                                <span class="material-symbols-outlined">arrow_drop_up</span>
                                            @else
                                                <span class="material-symbols-outlined">arrow_drop_down</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <a href="{{ route('admin.test.index', ['sort' => 'hasil', 'direction' => request('sort') == 'hasil' && request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                        Hasil
                                        @if(request('sort') == 'hasil')
                                            @if(request('direction') == 'asc')
                                                <span class="material-symbols-outlined">arrow_drop_up</span>
                                            @else
                                                <span class="material-symbols-outlined">arrow_drop_down</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <a href="{{ route('admin.test.index', ['sort' => 'created_at', 'direction' => request('sort') == 'created_at' && request('direction') == 'asc' ? 'desc' : 'asc']) }}">
                                        Tanggal Test
                                        @if(request('sort') == 'created_at')
                                            @if(request('direction') == 'asc')
                                                <span class="material-symbols-outlined">arrow_drop_up</span>
                                            @else
                                                <span class="material-symbols-outlined">arrow_drop_down</span>
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tests as $test)
                            <tr>
                                <td class="px-6 py-4">{{ $test->nama }}</td>
                                <td class="px-6 py-4">{{ $test->usia }}</td>
                                <td class="px-6 py-4">{{ $test->jenis_kelamin }}</td>
                                <td class="px-6 py-4">{{ $test->hasil }}</td>
                                <td class="px-6 py-4">{{ $test->created_at->format('d-m-Y') }}</td>
                                <td class="border px-4 py-2 flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.test.show', $test->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-center">
                                            visibility
                                        </span>
                                    </a>
                                    <a href="{{ route('get.certificate', $test->id) }}" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-center">
                                            file_present
                                        </span>
                                    </a>
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
