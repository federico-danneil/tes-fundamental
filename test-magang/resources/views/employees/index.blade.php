<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-red-700 to-red-500 px-4 py-6 rounded-md shadow text-white">
            <h2 class="text-2xl font-bold">📋 Data Karyawan</h2>
            <p class="text-sm text-red-100">Kelola data karyawan dengan elegan dan profesional.</p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Action Buttons -->
           <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Daftar Karyawan</h1>
                <div class="flex space-x-2">
             <a href="{{ route('employees.create') }}"
                class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700 transition">
                 ➕ Tambah
             </a>
             <a href="{{ route('employees.deleted') }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow hover:bg-yellow-600 transition">
                ♻️ Trash
            </a>
         </div>
    </div>

         <!-- Filter Box -->
        <div class="bg-white shadow rounded-md p-4">
            <form method="GET" class="flex flex-wrap items-center gap-4">
                <!-- Filter Jabatan -->
                <div>
                    <label for="position_id" class="block text-sm text-gray-700 mb-1"></label>
                    <select name="position_id" id="position_id"
                        onchange="this.form.submit()"
                        class="border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500">
                        <option value="">Semua Jabatan</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}"
                                {{ request('position_id') == $position->id ? 'selected' : '' }}>
                                {{ $position->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

        <!-- Filter Departemen -->
        <div>
            <label for="department_id" class="block text-sm text-gray-700 mb-1"></label>
            <select name="department_id" id="department_id"
                onchange="this.form.submit()"
                class="border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500">
                <option value="">Semua Divisi</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ request('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filter Gender -->
        <div>
            <label for="gender" class="block text-sm text-gray-700 mb-1"></label>
            <select name="gender" id="gender"
                onchange="this.form.submit()"
                class="border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500">
                <option value="">Semua Gender</option>
                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
    </form>
</div>


            <!-- Table -->
            <div class="bg-white shadow rounded-md overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-4 py-3 text-sm font-semibold">Email</th>
                        <th class="px-4 py-3 text-sm font-semibold">Telepon</th>
                        <th class="px-4 py-3 text-sm font-semibold">Divisi</th>
                        <th class="px-4 py-3 text-sm font-semibold">Jabatan</th>
                        <th class="px-4 py-3 text-sm font-semibold">Lahir</th>
                        <th class="px-4 py-3 text-sm font-semibold">Gender</th>
                        <th class="px-4 py-3 text-sm font-semibold">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @forelse ($employees as $employee)
                        <tr class="hover:bg-red-50">
                            <td class="px-4 py-3">{{ $employee->name }}</td>
                            <td class="px-4 py-3">{{ $employee->email }}</td>
                            <td class="px-4 py-3">{{ $employee->phone }}</td>
                            <td class="px-4 py-3">{{ $employee->department->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $employee->position->title ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $employee->birth_date }}</td>
                            <td class="px-4 py-3">{{ $employee->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td class="px-4 py-3 flex space-x-2">
                                <a href="{{ route('employees.edit', $employee) }}"
                                   class="text-red-600 hover:underline font-semibold">Edit</a>
                                <form method="POST" action="{{ route('employees.destroy', $employee) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')"
                                            class="text-gray-600 hover:text-red-700 hover:underline font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-4 text-center text-gray-500">
                                Tidak ada data.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
