<x-admin-layout>
    <div class="container py-4">
        <div class="step" id="step4">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 border-b pb-2">Edit Teacher</h2>
            <div class="mb-4 text-sm text-gray-600">
                Fields marked as optional can be left blank if not applicable.
            </div>

            <form method="POST" action="{{ route('teachers.update', $teacher->id) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="first_name" class="block text-sm font-semibold text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" required placeholder="First Name"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                            value="{{ old('first_name', $teacher->first_name) }}">
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="middle_name" class="block text-sm font-semibold text-gray-700">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                            value="{{ old('middle_name', $teacher->middle_name) }}">
                        @error('middle_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required placeholder="Last Name"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                            value="{{ old('last_name', $teacher->last_name) }}">
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Email"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                            value="{{ old('email', $teacher->email) }}">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <a href="{{ route('teachers.index') }}"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors inline-flex items-center space-x-2">
                        <span>←</span>
                        <span>Cancel</span>
                    </a>

                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors inline-flex items-center space-x-2">
                        <span>Update Teacher</span>
                        <span>→</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
