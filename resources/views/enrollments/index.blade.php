<x-admin-layout>
    <div class="container mx-auto px-4 py-6">
        <!-- Search and Filter Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form method="GET" action="{{ route('enrollments.index') }}"
                class="space-y-4 md:space-y-0 md:flex md:items-end md:space-x-4">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search by Name</label>
                    <input type="text" id="search" name="search" placeholder="Enter student name..."
                        value="{{ request('search') }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="flex-1">
                    <label for="year" class="block text-sm font-medium text-gray-700 mb-1">School Year</label>
                    <select name="year" id="year"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Years</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-search mr-2"></i> Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('enrollments.index', ['sort' => 'last_name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}"
                                class="flex items-center space-x-1 hover:text-gray-700">
                                <span>Last Name</span>
                                <span class="text-gray-400">
                                    <i class="fas fa-sort"></i>
                                </span>
                            </a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Middle Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            School Year</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($enrollments as $enrollment)
                        <tr class="hover:bg-gray-50 cursor-pointer"
                            onclick="window.location='{{ route('enrollments.show', $enrollment->id) }}'">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->personalInformation->last_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->personalInformation->first_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->personalInformation->middle_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->school_year }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No enrollments found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $enrollments->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin-layout>
