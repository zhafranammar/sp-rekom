<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl mb-4">Edit Data</h3>
                    <form action="{{ route('fakta.update', $fakta->kode_fakta) }}" method="POST">
                        @csrf
                        @method('PUT')
                                <div class="mb-4">
                                    <label for="kode_fakta" class="block">Kode Fakta</label>
                                    <input type="text" name="kode_fakta" class="border p-2 w-full" value="{{ $fakta->kode_fakta }}">
                            </div>

                            <div class="mb-4">
                                    <label for="deskripsi" class="block">Deskripsi</label>
                                    <textarea class="border p-2 w-full" name="deskripsi" rows="3">{{ $fakta->deskripsi }}</textarea>
                            </div>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

