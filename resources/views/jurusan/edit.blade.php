<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Jurusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl mb-4">Edit Jurusan</h3>
                    <form action="{{ route('jurusan.update', $jurusan->kode_jurusan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="kode_jurusan" class="block">Kode Jurusan</label>
                            <input type="text" name="kode_jurusan" value="{{ $jurusan->kode_jurusan }}" class="border p-2 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="nama_jurusan" class="block">Nama Jurusan</label>
                            <textarea class="border p-2 w-full" name="nama_jurusan" rows="3">{{ $jurusan->nama_jurusan }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="ruleDetails" class="block">Fakta</label>
                            <select name="ruleDetails[]" id="ruleDetails" class="border p-2 w-full select2" multiple="multiple">
                                @php
                                $faktas = \App\Models\Fakta::all();
                                $selectedFaktas = $jurusan->ruleDetails->pluck('kode_fakta')->toArray();
                                @endphp

                                @foreach($faktas as $fakta)
                                    <option value="{{ $fakta->kode_fakta }}" {{ in_array($fakta->kode_fakta, $selectedFaktas) ? 'selected' : '' }}>
                                        {{ $fakta->deskripsi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
