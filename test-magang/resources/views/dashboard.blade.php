<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-700">You are logged in!</p>
        </div>
    </div>
</x-app-layout>
