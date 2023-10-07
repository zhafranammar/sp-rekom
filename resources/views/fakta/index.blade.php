    <x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col md:flex-row justify-between mb-4 font-roboto">
                        <!-- Tambah Data Button -->
                        <a href="{{ route('fakta.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 md:mb-0 flex items-center">
                            <span class="material-symbols-outlined mr-4"> +
                            </span> Tambah Data
                        </a>
                        </div>
                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode Fakta
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($faktas as $fakta)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $fakta->kode_fakta }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $fakta->deskripsi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('fakta.edit', $fakta->kode_fakta) }}" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-2 flex items-center justify-center">Edit</a>
                                            <form action="{{ route('fakta.destroy', $fakta->kode_fakta) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 flex items-center justify-center">
                                                    Delete
                                                </button>                                            
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $faktas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>