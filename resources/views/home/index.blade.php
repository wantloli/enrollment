<x-layout>
    <!-- Hero Section -->
    <div class="relative bg-blue-900 text-white py-24">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold mb-4">Welcome to Balayan Senior High School</h1>
                <p class="text-xl mb-8">The only Stand-alone Public Senior High School in the Municipality
                    of
                    Balayan established in 2016.</p>
                <a href="{{ route('form.create') }}"
                    class="bg-yellow-500 text-blue-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition duration-300">Enroll
                    Now</a>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Academic Strands Offered</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald tracking-widest text-center text-blue-900">STEM</h3>
                    <p class="text-gray-600">Science, Technology, Engineering, and Mathematics (STEM) strand prepares
                        students for careers in science, technology, engineering, mathematics, and medical fields
                        through advanced subjects in calculus, biology, physics, and research.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald tracking-widest text-center text-blue-900">ABM</h3>
                    <p class="text-gray-600">Accountancy, Business, and Management (ABM) strand focuses on
                        business-related subjects like accounting, economics, business math, and management to prepare
                        students for careers in corporate and entrepreneurial fields.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald tracking-widest text-center text-blue-900">HUMSS</h3>
                    <p class="text-gray-600">Humanities and Social Sciences (HUMSS) strand develops students' skills in
                        communication, social sciences, and liberal arts. Perfect for future educators, lawyers,
                        writers, and social workers.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald tracking-widest text-center text-blue-900">ICT</h3>
                    <p class="text-gray-600">Information and Communications Technology (ICT) strand provides training in
                        computer programming, web design, digital animation, and other tech-related skills to prepare
                        students for careers in the IT industry.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald  text-center text-blue-900">Home
                        Economics</h3>
                    <p class="text-gray-600">Home Economics (HE) strand focuses on hospitality management, tourism,
                        culinary arts, and fashion design. Students learn practical skills for careers in the service
                        and hospitality industries.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald text-center text-blue-900">
                        Agri-Fishery Arts</h3>
                    <p class="text-gray-600">Agri-Fishery Arts strand provides training in agriculture, aquaculture, and
                        food processing. Students learn modern farming techniques, sustainable practices, and
                        agribusiness management.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-3xl font-bold mb-4 font-oswald text-center text-blue-900">Industrial
                        Arts</h3>
                    <p class="text-gray-600">Industrial Arts strand focuses on technical-vocational skills in
                        automotive, electrical, electronics, and metalworking. Prepares students for careers in
                        manufacturing, construction, and technical services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enrollment Steps -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Enrollment Process</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        1
                    </div>
                    <h3 class="font-bold mb-2">Submit Requirements</h3>
                    <p class="text-gray-600">Gather all necessary documents, and proof
                        of eligibility. Submit them through our online portal or at the enrollment office.</p>
                </div>
                <!-- Step 2 -->
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        2
                    </div>
                    <h3 class="font-bold mb-2">Assessment</h3>
                    <p class="text-gray-600">Our team will review your submitted documents. You may be required to
                        attend an interview to finalize your application.</p>
                </div>
                <!-- Step 3 -->
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        3
                    </div>
                    <h3 class="font-bold mb-2">Confirmation</h3>
                    <p class="text-gray-600">Once your application is approved, you will receive an official
                        confirmation email. Complete the final steps for registration to secure
                        your spot.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Get in Touch</h3>
                        <p class="text-gray-600 mb-4">The only Stand-alone Public Senior High School in the Municipality
                            of
                            Balayan established in 2016.</p>
                        <div class="space-y-2">
                            <p><strong>Address:</strong> Caloocan, Balayan, Batangas</p>
                            <p><strong>School Type:</strong> Secondary School</p>
                            <p><strong>Email:</strong> 342209@deped.gov.ph</p>
                            <div class="mt-4">
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
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Name</label>
                                <input type="text"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Message</label>
                                <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" rows="4"></textarea>
                            </div>
                            <button
                                class="bg-blue-800 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Send
                                Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-layout>
