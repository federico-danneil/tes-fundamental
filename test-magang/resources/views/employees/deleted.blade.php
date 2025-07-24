<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-red-700">♻️ Data Karyawan Terhapus</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('employees.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">⬅️ Kembali</a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-4 py-3 text-sm font-semibold">Email</th>
                        <th class="px-4 py-3 text-sm font-semibold">Telepon</th>
                        <th class="px-4 py-3 text-sm font-semibold">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @forelse ($employees as $employee)
                        <tr class="hover:bg-red-50">
                            <td class="px-4 py-3">{{ $employee->name }}</td>
                            <td class="px-4 py-3">{{ $employee->email }}</td>
                            <td class="px-4 py-3">{{ $employee->phone }}</td>
                            <td class="px-4 py-3 flex space-x-2">
                                <form method="POST" action="{{ route('employees.restore', $employee->id) }}">
                                    @csrf
                                    @method('POST')
                                    <button onclick="return confirm('Yakin restore?')"
                                            class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                        ✅ Restore
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('employees.force-delete', $employee->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus permanen?')"
                                            class="bg-red-700 text-white px-3 py-1 rounded hover:bg-red-800">
                                        ❌ Hapus Permanen
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                Tidak ada data terhapus.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
