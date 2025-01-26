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

        <!-- Alphabet Filter Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Filter by Last Name</h3>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('enrollments.index', array_merge(request()->query(), ['letter' => ''])) }}"
                    class="px-4 py-2 rounded-md transition duration-200 ease-in-out text-sm font-medium
                {{ !request('letter') ? 'bg-blue-600 text-white shadow-md hover:bg-blue-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    All
                </a>
                @foreach (range('A', 'Z') as $letter)
                    <a href="{{ route('enrollments.index', array_merge(request()->query(), ['letter' => $letter])) }}"
                        class="px-4 py-2 rounded-md transition duration-200 ease-in-out text-sm font-medium
                {{ request('letter') == $letter ? 'bg-blue-600 text-white shadow-md hover:bg-blue-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $letter }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-x-auto">

            <p class="text-sm text-gray-600 p-4 flex gap-1"><span><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </span>Click on the items inside the table to see the details.</p>
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Strand
                        </th>
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
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ strtoupper($enrollment->learnerSenior->strand) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
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

        <!-- Export Section -->
        <div class="mb-6 bg-white rounded-lg shadow-md p-4">
            <form action="{{ route('enrollments.export') }}" method="GET" class="flex items-end space-x-4">
                <div class="flex-1">
                    <label for="export_year" class="block text-sm font-medium text-gray-700 mb-1">School Year to
                        Export</label>
                    <select name="export_year" id="export_year"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="all">All School Years</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="strand" class="block text-sm font-medium text-gray-700 mb-1">Strand</label>
                    <select name="strand" id="strand"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="all">All Strands</option>
                        @foreach ($strands as $strand)
                            <option value="{{ $strand }}">{{ $strand }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M3 14h18M3 6h18M3 18h18" />
                    </svg>
                    Export to Excel
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
