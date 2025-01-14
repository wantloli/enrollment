<x-admin-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Enrolled Students</h2>
        </div>

        <div class="mb-6 bg-white rounded-lg shadow-md p-4">
            <form method="GET" class="flex gap-4 items-end">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search by name...">
                </div>
                <div class="flex-1">
                    <label for="school_year" class="block text-sm font-medium text-gray-700">School Year</label>
                    <select name="school_year" id="school_year"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All School Years</option>
                        @foreach ($schoolYears as $year)
                            <option value="{{ $year }}" {{ request('school_year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Alphabet Filter Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Filter by Last Name</h3>
            <div class="flex flex-wrap gap-2">
                <a href="{{ request()->fullUrlWithQuery(['letter' => '']) }}"
                    class="px-4 py-2 rounded-md transition duration-200 ease-in-out text-sm font-medium
                    {{ !request('letter') ? 'bg-blue-600 text-white shadow-md hover:bg-blue-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    All
                </a>
                @foreach (range('A', 'Z') as $letter)
                    <a href="{{ request()->fullUrlWithQuery(['letter' => $letter]) }}"
                        class="px-4 py-2 rounded-md transition duration-200 ease-in-out text-sm font-medium
                        {{ request('letter') == $letter ? 'bg-blue-600 text-white shadow-md hover:bg-blue-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $letter }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Middle Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            School Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Enrolled At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($enrolledStudents as $enrollment)
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
                                {{ $enrollment->enrolled_at?->format('M d, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No enrolled students found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $enrolledStudents->links() }}
        </div>
    </div>
</x-admin-layout>
