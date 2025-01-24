<div class="overflow-hidden">
    <div class="step active sm:p-12" id="step1">
        <div class="grid grid-cols-2 gap-6">
            <!-- Image Section -->
            <div class="grid-cols-1 ">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-[400px] overflow-hidden rounded-lg">
                        @foreach ($images as $index => $image)
                            <div class="hidden absolute w-full h-full transition-opacity duration-700 ease-in-out"
                                data-carousel-item>
                                <img src="{{ asset($image) }}"
                                    class="absolute inset-0 w-full h-full object-cover object-center"
                                    alt="Image {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @foreach ($images as $index => $image)
                            <button type="button"
                                class="w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors duration-300"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"
                                data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-1/2 -translate-y-1/2 start-4 z-30 flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50 transition-all duration-300 focus:outline-none"
                        data-carousel-prev>
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button"
                        class="absolute top-1/2 -translate-y-1/2 end-4 z-30 flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50 transition-all duration-300 focus:outline-none"
                        data-carousel-next>
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>

            <!-- Rest of the content remains the same -->
            <div class="grid-cols-1 text-center space-y-6">
                <h2 class="text-3xl sm:text-4xl font-bold text-blue-900 tracking-wide font-oswald">
                    Welcome to Balayan Senior High School
                </h2>
                <p class="text-sm text-gray-600 max-w-2xl mx-auto">
                    Please complete all the required information for student enrollment. Make sure to prepare all
                    necessary documents.
                </p>
            </div>
        </div>

        <!-- Button Section -->
        <div class="mt-12 flex justify-end">
            <button type="button" onclick="nextStep(1)"
                class="group relative inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                Get Started
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>
