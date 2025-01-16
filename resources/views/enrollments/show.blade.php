<x-admin-layout>
    <style>
        @media print {

            /* Hide header and other layout elements */
            header,
            nav,
            .no-print {
                display: none !important;
            }

            /* Reset any layout margins/padding */
            body {
                margin: 0;
                padding: 0;
                background: #fff;
            }

            /* Ensure the content is visible */
            .print-content {
                display: block !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                position: absolute;
                left: 0;
                top: 0;
            }

            /* Force background colors to print */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* Ensure all content is visible */
            .grid {
                display: grid !important;
            }

            /* Ensure proper page breaks */
            .page-break {
                page-break-before: always;
            }
        }
    </style>

    <!-- Header buttons - Will not print -->
    <div class="container mx-auto px-4 py-6 no-print">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Enrollment Details</h1>
            <a href="javascript:history.back()"
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back
            </a>
        </div>
    </div>

    <!-- Printable content -->
    <div class="print-content container mx-auto px-4 py-6">

        <!-- Main Content -->
        <!-- Status Section -->
        <div class="w-full bg-blue-100 text-blue-800 text-center py-2 mb-6 rounded-lg">
            <p class="text-lg font-semibold">Status: {{ strtoupper($enrollment->status) }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Personal Information Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
                </div>
                @if ($enrollment->personalInformation)
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <p class="text-lg font-medium text-gray-900">
                                {{ $enrollment->personalInformation->first_name }}
                                {{ $enrollment->personalInformation->middle_name }}
                                {{ $enrollment->personalInformation->last_name }}
                            </p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Birth Certificate No:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->birth_certificate_no }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Age:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->age }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Sex:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->sex }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Birth Date:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->birth_date }}</p>
                        </div>
                        <div class="col-span-2 space-y-2">
                            <p class="text-sm text-gray-600">Birth Place:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->birth_place }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Religion:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->religion }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Mother Tongue:</p>
                            <p class="font-medium">{{ $enrollment->personalInformation->mother_tongue }}</p>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500 italic">Personal information is not available.</p>
                @endif
            </div>

            <!-- Parent Information Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-900">Parent Information</h2>
                </div>
                @if ($enrollment->parentInformation)
                    <div class="space-y-6">
                        <div class="border-l-4 border-green-500 pl-4">
                            <p class="text-sm text-gray-600">Father's Name</p>
                            <p class="font-medium">{{ $enrollment->parentInformation->father_first_name }}
                                {{ $enrollment->parentInformation->father_middle_name }}
                                {{ $enrollment->parentInformation->father_last_name }}</p>
                            <p class="text-sm text-gray-600 mt-1">Contact:
                                {{ $enrollment->parentInformation->father_contact_number }}</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4">
                            <p class="text-sm text-gray-600">Mother's Name</p>
                            <p class="font-medium">{{ $enrollment->parentInformation->mother_first_name }}
                                {{ $enrollment->parentInformation->mother_middle_name }}
                                {{ $enrollment->parentInformation->mother_last_name }}</p>
                            <p class="text-sm text-gray-600 mt-1">Contact:
                                {{ $enrollment->parentInformation->mother_contact_number }}</p>
                        </div>
                        @if ($enrollment->parentInformation->legal_first_name)
                            <div class="border-l-4 border-green-500 pl-4">
                                <p class="text-sm text-gray-600">Legal Guardian's Name</p>
                                <p class="font-medium">{{ $enrollment->parentInformation->legal_first_name }}
                                    {{ $enrollment->parentInformation->legal_middle_name }}
                                    {{ $enrollment->parentInformation->legal_last_name }}</p>
                                <p class="text-sm text-gray-600 mt-1">Contact:
                                    {{ $enrollment->parentInformation->legal_contact_number }}</p>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-gray-500 italic">Parent information is not available.</p>
                @endif
            </div>

            <!-- Senior High School Information -->
            @if ($enrollment->learnerSenior)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-orange-600 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900">Senior High School Details</h2>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Semester:</p>
                            <p class="font-medium">{{ $enrollment->learnerSenior->semester }}</p>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600">Track:</p>
                            <p class="font-medium">{{ $enrollment->learnerSenior->track }}</p>
                        </div>
                        <div class="col-span-2 space-y-2">
                            <p class="text-sm text-gray-600">Strand:</p>
                            <p class="font-medium">{{ $enrollment->learnerSenior->strand }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Special Needs & Returning Learner Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="space-y-6">
                    <div>
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 text-purple-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h2 class="text-xl font-semibold text-gray-900">Special Needs</h2>
                        </div>
                        @if (
                            $enrollment->specialNeed &&
                                ($enrollment->specialNeed->with_diagnosis ||
                                    $enrollment->specialNeed->with_manifestations ||
                                    $enrollment->specialNeed->is_have_pwd_id != 1))
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <span
                                        class="w-3 h-3 rounded-full {{ $enrollment->specialNeed->with_diagnosis ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                    <span>With Diagnosis: {{ $enrollment->specialNeed->with_diagnosis }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span
                                        class="w-3 h-3 rounded-full {{ $enrollment->specialNeed->with_manifestations ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                    <span>With Manifestations:
                                        {{ $enrollment->specialNeed->with_manifestations }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span
                                        class="w-3 h-3 rounded-full {{ $enrollment->specialNeed->is_have_pwd_id !== null || $enrollment->specialNeed->is_have_pwd_id == 1 ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                    <span>Has PWD ID</span>
                                </div>
                            </div>
                        @else
                            <p class="text-gray-500 italic">No special needs information available.</p>
                        @endif
                    </div>


                    <div class="border-t pt-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h2 class="text-xl font-semibold text-gray-900">Returning Learner</h2>
                        </div>
                        @if (
                            $enrollment->returningLearner &&
                                ($enrollment->returningLearner->grade_level ||
                                    $enrollment->returningLearner->school_year ||
                                    $enrollment->returningLearner->school ||
                                    $enrollment->returningLearner->school_id))
                            <div class="grid grid-cols-2 gap-4">
                                @if ($enrollment->returningLearner->grade_level)
                                    <div class="space-y-2">
                                        <p class="text-sm text-gray-600">Grade Level:</p>
                                        <p class="font-medium">{{ $enrollment->returningLearner->grade_level }}</p>
                                    </div>
                                @endif
                                @if ($enrollment->returningLearner->school_year)
                                    <div class="space-y-2">
                                        <p class="text-sm text-gray-600">School Year:</p>
                                        <p class="font-medium">{{ $enrollment->returningLearner->school_year }}</p>
                                    </div>
                                @endif
                                @if ($enrollment->returningLearner->school)
                                    <div class="col-span-2 space-y-2">
                                        <p class="text-sm text-gray-600">School:</p>
                                        <p class="font-medium">{{ $enrollment->returningLearner->school }}</p>
                                    </div>
                                @endif
                                @if ($enrollment->returningLearner->school_id)
                                    <div class="col-span-2 space-y-2">
                                        <p class="text-sm text-gray-600">School ID:</p>
                                        <p class="font-medium">{{ $enrollment->returningLearner->school_id }}</p>
                                    </div>
                                @endif
                            </div>
                        @else
                            <p class="text-gray-500 italic">No returning learner information available.</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Address & Requirements Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900">Addresses</h2>
                    </div>
                    <div class="space-y-4">
                        @if ($enrollment->currentAddress)
                            <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                <div class="flex items-center border-b border-gray-200 pb-2">
                                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <h3 class="font-semibold text-gray-700">Current Address</h3>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div><span class="text-gray-600">House/Unit No:</span> <span
                                            class="font-medium">{{ $enrollment->currentAddress->house_no }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Street:</span> <span
                                            class="font-medium">{{ $enrollment->currentAddress->street_name }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Barangay:</span> <span
                                            class="font-medium">{{ $enrollment->currentAddress->barangay }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Municipality:</span> <span
                                            class="font-medium">{{ $enrollment->currentAddress->municipality }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Province:</span> <span
                                            class="font-medium">{{ $enrollment->currentAddress->province }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Country:</span> <span
                                            class="font-medium">{{ $enrollment->currentAddress->country }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($enrollment->homeAddress)
                            <div class="bg-gray-50 rounded-lg p-4 space-y-3 mt-4">
                                <div class="flex items-center border-b border-gray-200 pb-2">
                                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <h3 class="font-semibold text-gray-700">Home Address</h3>
                                </div>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div><span class="text-gray-600">House/Unit No:</span> <span
                                            class="font-medium">{{ $enrollment->homeAddress->house_no }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Street:</span> <span
                                            class="font-medium">{{ $enrollment->homeAddress->street_name }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Barangay:</span> <span
                                            class="font-medium">{{ $enrollment->homeAddress->barangay }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Municipality:</span> <span
                                            class="font-medium">{{ $enrollment->homeAddress->municipality }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Province:</span> <span
                                            class="font-medium">{{ $enrollment->homeAddress->province }}</span>
                                    </div>
                                    <div><span class="text-gray-600">Country:</span> <span
                                            class="font-medium">{{ $enrollment->homeAddress->country }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="border-t pt-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900">Requirements</h2>
                    </div>
                    @if ($enrollment->requirements && count($enrollment->requirements) > 0)
                        <div class="space-y-3">
                            @foreach ($enrollment->requirements as $requirement)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-medium">{{ $requirement->description }}</span>
                                    </div>
                                    <a href="{{ $requirement->path }}" target="_blank"
                                        class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-700 rounded-md hover:bg-indigo-100 transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">No requirements uploaded.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Action buttons - Will not print -->
    <div class="mt-6 flex justify-end space-x-4 no-print">
        <form action="{{ route('enrollments.mark-reviewed', $enrollment->id) }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Mark as Reviewed
            </button>
        </form>

        <a href="{{ route('enrollments.edit', $enrollment) }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Enrollment
        </a>
        <button type="button" onclick="printEnrollment()"
            class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Print Details
        </button>
    </div>

    <script>
        function printEnrollment() {
            // Add a small delay to ensure content is ready
            setTimeout(() => {
                window.print();
            }, 100);
        }
    </script>
</x-admin-layout>
