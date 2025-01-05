<x-admin-layout>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('delete'))
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ session('delete') }}
                </div>
            @endif
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">
                    Teachers
                </h2>
                <div>
                    <form method="GET" action="{{ route('teachers.index') }}" class="inline-block">
                        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                            class="px-4 py-2 border rounded">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Search</button>
                    </form>
                    <a href="{{ route('teachers.create') }}" class="px-4 py-2 bg-green-500 text-white rounded ml-2">Add
                        Teacher</a>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden min-h-[50svh]">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Last Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    First Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Middle Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Unique Code
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $teacher->last_name }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $teacher->first_name }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $teacher->middle_name }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $teacher->email }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            @if ($teacher->user && $teacher->user->unique_code)
                                                {{ $teacher->user->unique_code }}
                                            @else
                                                <span class="text-gray-500 italic">No unique code</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                            class="text-blue-500">Edit</a>
                                        <button onclick="openModal({{ $teacher->id }})"
                                            class="text-red-500 ml-2">Delete</button>
                                        @if (!$teacher->user)
                                            <form method="GET"
                                                action="{{ route('teachers.account.create', $teacher->id) }}"
                                                class="inline-block">
                                                <button type="submit" class="text-green-500 ml-2">Create
                                                    Account</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl mb-4">Are you sure you want to delete this teacher?</h2>
            <div class="flex justify-end">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Cancel</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('deleteForm').action = `/teachers/${id}`;
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
