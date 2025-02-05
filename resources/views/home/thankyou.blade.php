<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-indigo-50">
        <div
            class="text-center max-w-md px-6 py-12 bg-white rounded-xl shadow-2xl transform transition-all duration-500 hover:scale-105">
            <!-- Animated Checkmark Icon -->
            <div class="mb-6">
                <svg class="w-20 h-20 mx-auto text-green-500 animate-bounce" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl font-bold text-gray-800 mb-4 animate-fade-in">
                Thank You for Your Enrollment!
            </h1>

            <!-- Subtext -->
            <p class="text-gray-600 mb-8 animate-fade-in delay-100">
                Your enrollment has been successfully completed. We’re excited to have you on board!
            </p>

            <!-- Button -->
            <a href="{{ route('home.index') }}"
                class="inline-block px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Return Home
            </a>
        </div>
    </div>
</x-layout>
