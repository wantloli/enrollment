<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="text-center max-w-md px-6 py-8 bg-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Thank You for Your Enrollment!</h1>
            <p class="text-gray-600 mb-8">Your enrollment has been successfully completed.</p>
            <a href="{{ route('home.index') }}"
                class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Return Home
            </a>
        </div>
    </div>
</x-layout>
