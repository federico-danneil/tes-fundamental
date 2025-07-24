<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Karyawan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('employees.update', $employee) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    @include('employees._form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
