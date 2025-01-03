<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Enrollment Count Card -->
                    <div class="bg-blue-100 p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-2">Total Enrollments</h2>
                        <p class="text-3xl font-bold text-blue-600">
                            {{ $enrollmentCount ?? 0 }}
                        </p>
                    </div>

                    <!-- Enrollment Period Card -->
                    <div class="bg-green-100 p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-2">Current Enrollment Period</h2>
                        @if ($currentPeriod ?? null)
                            <p class="text-md">
                                <span class="font-semibold">Start:</span>
                                {{ $currentPeriod->start_date->format('M d, Y') }}<br>
                                <span class="font-semibold">End:</span> {{ $currentPeriod->end_date->format('M d, Y') }}
                            </p>
                            <p class="mt-2 {{ $currentPeriod->is_active ? 'text-green-600' : 'text-red-600' }}">
                                Status: {{ $currentPeriod->is_active ? 'Active' : 'Inactive' }}
                            </p>
                            <button onclick="openModal()" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Edit</button>
                        @else
                            <p class="text-gray-600">No active enrollment period</p>
                        @endif
                    </div>
                </div>

                <!-- Recent Enrollments Table -->
                {{-- <div class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Recent Enrollments</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Student</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Course</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($recentEnrollments ?? [] as $enrollment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->student->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->course->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $enrollment->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No recent
                                            enrollments</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Edit Enrollment Period Modal -->
    {{-- <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Enrollment Period</h3>
                <div class="mt-2 px-7 py-3">
                    <form id="editForm" method="POST" action="{{ route('enrollment-period.update', $currentPeriod->id ?? 0) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ $currentPeriod->start_date->format('Y-m-d') ?? '' }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ $currentPeriod->end_date->format('Y-m-d') ?? '' }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="is_active" class="block text-sm font-medium text-gray-700">Active</label>
                            <select id="is_active" name="is_active" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="1" {{ $currentPeriod->is_active ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$currentPeriod->is_active ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-600 text-white rounded mr-2">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
        function openModal() {
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
