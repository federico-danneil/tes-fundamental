<!-- Nama -->
<div>
    <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
    <input type="text" name="name" id="name"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm"
        value="{{ old('name', $employee->name ?? '') }}" required>
</div>

<!-- Email -->
<div>
    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
    <input type="email" name="email" id="email"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm"
        value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<!-- Departemen -->
<div>
    <label for="department_id" class="block font-medium text-sm text-gray-700">Departemen</label>
    <select name="department_id" id="department_id"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
        <option value="">-- Pilih Departemen --</option>
        @foreach ($departments as $dept)
            <option value="{{ $dept->id }}"
                {{ old('department_id', $employee->department_id ?? '') == $dept->id ? 'selected' : '' }}>
                {{ $dept->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Jabatan / Posisi -->
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

<!-- Tanggal Lahir -->
<div>
    <label for="birth_date" class="block font-medium text-sm text-gray-700">Tanggal Lahir</label>
    <input type="date" name="birth_date" id="birth_date"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm"
        value="{{ old('birth_date', $employee->birth_date ?? '') }}" required>
</div>

<!-- Nomor Telepon -->
<div>
    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
    <input type="text" name="phone" id="phone"
        value="{{ old('phone', $employee->phone ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500"
        required>
    @error('phone')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Gender -->
<div>
    <label class="block font-medium text-sm text-gray-700">Jenis Kelamin</label>
    <div class="mt-1 flex items-center gap-4">
        <label class="inline-flex items-center">
            <input type="radio" name="gender" value="male"
                {{ old('gender', $employee->gender ?? '') == 'male' ? 'checked' : '' }} required>
            <span class="ml-2">Laki-laki</span>
        </label>
        <label class="inline-flex items-center">
            <input type="radio" name="gender" value="female"
                {{ old('gender', $employee->gender ?? '') == 'female' ? 'checked' : '' }} required>
            <span class="ml-2">Perempuan</span>
        </label>
    </div>
</div>



<!-- Tombol Submit -->
<div class="pt-4">
    <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
        {{ $button }}
    </button>
    <a href="{{ route('employees.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
</div>
