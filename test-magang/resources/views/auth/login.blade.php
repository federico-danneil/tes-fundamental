<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-700 to-red-500">
        <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg space-y-5">
            <h1 class="text-xl font-bold text-center text-red-700">🔒 Masuk</h1>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 px-3 py-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 px-3 py-2" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                        <span class="ml-2 text-gray-600">Ingat saya</span>
                    </label>
                    <a href="#" class="text-red-600 hover:underline">Lupa Password?</a>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded shadow">
                    🔑 Masuk
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
