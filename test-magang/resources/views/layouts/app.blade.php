<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700" rel="stylesheet" />

</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-red-700 to-red-600 shadow text-white">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Brand -->
            <a href="{{ url('/') }}" class="text-xl font-bold">MyApp</a>

            <!-- Links -->
            <div class="space-x-6">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('employees.index') }}" class="hover:underline">Karyawan</a>
                <a href="{{ route('profile.edit') }}" class="hover:underline">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-8">
        {{ $slot }}
    </main>

</body>
</html>
