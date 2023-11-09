    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
                {{ __('Data Jurusan') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">
                        <!-- Tambah Data Button -->
                        <a href="{{ route('jurusan.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            <span class="material-symbols-outlined mr-4">
                                add
                            </span> Tambah Data
                        </a>

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('jurusan.index') }}" class="flex w-full md:w-auto">
                            <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" class="p-2 border rounded-l w-full md:w-auto md:ml-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r flex items-center">
                                <span class="material-symbols-outlined mr-2">
                                    search
                                </span> Search
                            </button>
                        </form>
                    </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a href="{{ route('jurusan.index', ['sort' => 'kode_jurusan', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                            Kode Jurusan
                                            @if(request('sort') === 'kode_jurusan')
                                               @if(request('direction') === 'asc')
                                                    <span class="material-symbols-outlined">arrow_drop_up</span>
                                                @else
                                                    <span class="material-symbols-outlined">arrow_drop_down</span>
                                                @endif
                                            @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a href="{{ route('jurusan.index', ['sort' => 'nama_jurusan', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                            Nama Jurusan
                                            @if(request('sort') === 'nama_jurusan')
                                               @if(request('direction') === 'asc')
                                                    <span class="material-symbols-outlined">arrow_drop_up</span>
                                                @else
                                                    <span class="material-symbols-outlined">arrow_drop_down</span>
                                                @endif
                                            @endif
                                        </a>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
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
                                        <td class="border px-4 py-2 flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('jurusan.show', $jurusan->kode_jurusan) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    visibility
                                                </span>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('jurusan.edit', $jurusan->kode_jurusan) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center">
                                                <span class="material-symbols-outlined text-center">
                                                    edit
                                                </span>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('jurusan.destroy', $jurusan->kode_jurusan) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 flex items-center justify-center" onclick="return confirm('Are you sure?')">
                                                    <span class="material-symbols-outlined text-center">
                                                        delete
                                                    </span>
                                                </button>
                                            </form>
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