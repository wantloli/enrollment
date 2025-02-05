<x-admin-layout>
    <div class="max-w-3xl mx-auto p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Settings</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <ul class="bg-white rounded-lg shadow-md overflow-hidden">
            <li class="border-b border-gray-200">
                <a href="{{ route('settings.change-password') }}"
                    class="block px-6 py-4 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200">
                    <i class="fas fa-key mr-3"></i>
                    Change Password
                </a>
            </li>
            <li class="border-b border-gray-200">
                <a href="{{ route('logs') }}"
                    class="block px-6 py-4 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200">
                    <i class="fas fa-paperclip mr-3"></i>
                    Laravel Logs
                </a>
            </li>
            <li class="border-b border-gray-200">
                <a href="{{ route('deleted-logs') }}"
                    class="block px-6 py-4 text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200">
                    <i class="fas fa-paperclip mr-3"></i>
                    Deleted Logs
                </a>
            </li>
            <li class="border-b border-gray-200">
                <form action="{{ route('migrate.database') }}" method="POST" class="block">
                    @csrf
                    <button type="submit"
                        class="w-full px-6 py-4 text-left text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-sync mr-3"></i>
                        Migrate Database
                        <span class="text-sm text-gray-500 ml-2">(Apply new database changes)</span>
                    </button>
                </form>
            </li>
            <li class="border-b border-gray-200 last:border-b-0">
                <button onclick="showDeleteModal()"
                    class="w-full px-6 py-4 text-left text-gray-700 hover:bg-gray-50 hover:text-red-600 transition-colors duration-200">
                    <i class="fas fa-database mr-3"></i>
                    Delete Database
                </button>
            </li>
        </ul>
    </div>

    <!-- Delete Database Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Delete Database</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Warning: This action cannot be undone. This will permanently delete all data in the database.
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <form action="{{ route('delete.database') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 mb-2">
                            Yes, Delete Database
                        </button>
                    </form>
                    <button onclick="hideDeleteModal()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                hideDeleteModal();
            }
        }
    </script>
</x-admin-layout>
