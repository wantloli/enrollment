<x-layout>
    <!-- Hero Section -->
    <div
        class="relative bg-gradient-to-r from-blue-900 to-blue-800 text-white py-32 opacity-0 transition-opacity duration-1000 animate-on-scroll">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl">
                <h1 class="text-5xl font-bold mb-6 animate-fade-in">Welcome to Balayan Senior High School</h1>
                <p class="text-xl mb-8 animate-fade-in delay-100">The only Stand-alone Public Senior High School in the
                    Municipality of Balayan, established in 2016.</p>
                <a href="{{ route('form.create') }}"
                    class="inline-block bg-yellow-500 text-blue-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition duration-300 transform hover:scale-105 animate-fade-in delay-200">
                    Enroll Now
                </a>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <section class="py-20 bg-gray-50 opacity-0 transition-opacity duration-1000 animate-on-scroll">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 animate-fade-in">Academic Strands Offered</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- STEM -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">STEM</h3>
                    <p class="text-gray-600">Science, Technology, Engineering, and Mathematics (STEM) strand prepares
                        students for careers in science, technology, engineering, mathematics, and medical fields
                        through advanced subjects in calculus, biology, physics, and research.</p>
                </div>
                <!-- ABM -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">ABM</h3>
                    <p class="text-gray-600">Accountancy, Business, and Management (ABM) strand focuses on
                        business-related subjects like accounting, economics, business math, and management to prepare
                        students for careers in corporate and entrepreneurial fields.</p>
                </div>
                <!-- HUMSS -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">HUMSS</h3>
                    <p class="text-gray-600">Humanities and Social Sciences (HUMSS) strand develops students' skills in
                        communication, social sciences, and liberal arts. Perfect for future educators, lawyers,
                        writers, and social workers.</p>
                </div>
                <!-- ICT -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">ICT</h3>
                    <p class="text-gray-600">Information and Communications Technology (ICT) strand provides training in
                        computer programming, web design, digital animation, and other tech-related skills to prepare
                        students for careers in the IT industry.</p>
                </div>
                <!-- Home Economics -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">Home Economics</h3>
                    <p class="text-gray-600">Home Economics (HE) strand focuses on hospitality management, tourism,
                        culinary arts, and fashion design. Students learn practical skills for careers in the service
                        and hospitality industries.</p>
                </div>
                <!-- Agri-Fishery Arts -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">Agri-Fishery Arts</h3>
                    <p class="text-gray-600">Agri-Fishery Arts strand provides training in agriculture, aquaculture, and
                        food processing. Students learn modern farming techniques, sustainable practices, and
                        agribusiness management.</p>
                </div>
                <!-- Industrial Arts -->
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-3xl font-bold mb-4 text-center text-blue-900">Industrial Arts</h3>
                    <p class="text-gray-600">Industrial Arts strand focuses on technical-vocational skills in
                        automotive, electrical, electronics, and metalworking. Prepares students for careers in
                        manufacturing, construction, and technical services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enrollment Steps -->
    <section
        class="py-20 bg-gradient-to-r from-blue-900 to-blue-800 text-white opacity-0 transition-opacity duration-1000 animate-on-scroll">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 animate-fade-in">Enrollment Process</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div
                        class="bg-white text-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold animate-bounce">
                        1
                    </div>
                    <h3 class="font-bold mb-4 text-xl">Submit Requirements</h3>
                    <p class="text-gray-200">Gather all necessary documents and proof of eligibility. Submit them
                        through our online portal or at the enrollment office.</p>
                </div>
                <!-- Step 2 -->
                <div class="text-center">
                    <div
                        class="bg-white text-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold animate-bounce delay-200">
                        2
                    </div>
                    <h3 class="font-bold mb-4 text-xl">Assessment</h3>
                    <p class="text-gray-200">Our team will review your submitted documents. You may be required to
                        attend an interview to finalize your application.</p>
                </div>
                <!-- Step 3 -->
                <div class="text-center">
                    <div
                        class="bg-white text-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold animate-bounce delay-400">
                        3
                    </div>
                    <h3 class="font-bold mb-4 text-xl">Confirmation</h3>
                    <p class="text-gray-200">Once your application is approved, you will receive an official
                        confirmation email. Complete the final steps for registration to secure your spot.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gray-50 opacity-0 transition-opacity duration-1000 animate-on-scroll">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-xl shadow-lg p-12">
                <h2 class="text-4xl font-bold text-center mb-12 animate-fade-in">Contact Us</h2>
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-2xl font-bold mb-6">Get in Touch</h3>
                        <p class="text-gray-600 mb-6">The only Stand-alone Public Senior High School in the Municipality
                            of Balayan, established in 2016.</p>
                        <div class="space-y-4">
                            <p><strong>Address:</strong> Caloocan, Balayan, Batangas</p>
                            <p><strong>School Type:</strong> Secondary School</p>
                            <p><strong>Email:</strong> 342209@deped.gov.ph</p>
                            <div class="mt-6">
                                <a href="https://www.facebook.com/DepEdTayoBSHS342209"
                                    class="text-blue-900 hover:text-blue-700 transition-colors" target="_blank">
                                    <svg class="w-6 h-6 inline-block" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5L14.17.5C10.24.5,9.1,3.3,9.1,5.47V7.46H5.5v3.4h3.6V21.5h5.4V10.86h3.47l.45-3.4Z" />
                                    </svg>
                                    Follow us on Facebook
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-2">Name</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-2">Message</label>
                                <textarea class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500" rows="4"></textarea>
                            </div>
                            <button
                                class="bg-blue-900 text-white px-8 py-3 rounded-lg hover:bg-blue-800 transition duration-300 transform hover:scale-105">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />

    <!-- Add this script section before closing layout tag -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const callback = function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100');
                    }
                });
            };

            const observer = new IntersectionObserver(callback, {
                threshold: 0.1
            });

            document.querySelectorAll('.animate-on-scroll').forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</x-layout>
