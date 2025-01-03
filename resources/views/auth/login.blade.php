<x-layout>
    <div class="flex items-center justify-center bg-gray-50 min-h-screen">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Image Container -->
            <div class="w-full h-full bg-gray-300">
                <!-- Add your image here -->
                <img src="{{ asset('img/background-bshs.png') }}" alt="Login Header" class="w-full h-full object-cover">
            </div>

            <div class="py-6 space-y-6">
                <div>
                    <h2 class="text-xl bg-slate-200 p-2 text-gray-900 text-center w-full">Sign in to your account</h2>
                </div>
                <div class="px-8 border mx-20 rounded my-10 py-6">
                    <form class="space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label for="unique_code" class="sr-only">Unique Code</label>
                                <input id="unique_code" name="unique_code" type="text" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('unique_code') border-red-500 @enderror"
                                    placeholder="Unique Code" value="{{ old('unique_code') }}" autocomplete="off"
                                    autocorrect="off" autocapitalize="off" spellcheck="false">
                                @error('unique_code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('password') border-red-500 @enderror"
                                    placeholder="Password" autocomplete="off" autocorrect="off" autocapitalize="off"
                                    spellcheck="false">
                                <button type="button" onclick="togglePasswordVisibility()"
                                    class="absolute inset-y-0 right-0 px-3 py-2 text-gray-500">
                                    Show
                                </button>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordButton = passwordInput.nextElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                passwordButton.textContent = 'Show';
            }
        }
    </script>
</x-layout>
