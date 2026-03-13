<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Template Surat') }}: {{ $template->nama_template }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg text-sm text-blue-800">
                        <p class="font-bold mb-2">Petunjuk Penggunaan Placeholder:</p>
                        <p>Gunakan tag berikut untuk mengisi data penduduk secara otomatis:</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-2 font-mono">
                            <div>@{{ nama }}</div>
                            <div>@{{ nik }}</div>
                            <div>@{{ alamat }}</div>
                            <div>@{{ rt }} / @{{ rw }}</div>
                            <div>@{{ tempat_lahir }}</div>
                            <div>@{{ tanggal_lahir }}</div>
                            <div>@{{ pekerjaan }}</div>
                            <div>@{{ agama }}</div>
                        </div>
                    </div>

                    <form action="{{ route('template.update', $template) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-6">
                            <x-input-label for="nama_template" value="Nama Template" />
                            <x-text-input id="nama_template" name="nama_template" type="text" class="mt-1 block w-full" :value="old('nama_template', $template->nama_template)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_template')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="isi_template" value="Isi Template" />
                            <textarea id="isi_template" name="isi_template" rows="15" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm font-serif p-4" required>{{ old('isi_template', $template->isi_template) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('isi_template')" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-secondary-button type="button" onclick="history.back()" class="mr-3">Batal</x-secondary-button>
                            <x-primary-button>Update Template</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
