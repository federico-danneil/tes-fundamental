<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Karyawan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                {{-- Tampilkan error validasi jika ada --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <strong>Ada kesalahan:</strong>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                            value="{{ old('name') }}" required>
                    </div>

                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                            value="{{ old('email') }}" required>
                    </div>

                    <div>
                        <label for="department_id" class="block font-medium text-sm text-gray-700">Divisi</label>
                        <select name="department_id" id="department_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                            <option value=""> Pilih Divisi </option>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="position_id" class="block font-medium text-sm text-gray-700">Jabatan</label>
                        <select name="position_id" id="position_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                            <option value=""> Pilih Jabatan </option>
                            @foreach ($positions as $pos)
                                <option value="{{ $pos->id }}" {{ old('position_id') == $pos->id ? 'selected' : '' }}>
                                    {{ $pos->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="birth_date" class="block font-medium text-sm text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date" class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                            value="{{ old('birth_date') }}" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $employee->phone ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block font-medium text-sm text-gray-700">Jenis Kelamin</label>
                        <div class="mt-1 flex items-center gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                <span class="ml-2">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                                <span class="ml-2">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-red-700 hover:bg-blue-200 text-white font-semibold px-4 py-2 rounded">
                            Simpan
                        </button>
                        <a href="{{ route('employees.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
