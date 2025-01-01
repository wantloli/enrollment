<x-layout>

    <!-- Hero Section -->
    <div class="relative bg-blue-900 text-white py-24">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold mb-4">Welcome to Balayan Senior High School</h1>
                <p class="text-xl mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
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
                    <h3 class="text-xl font-bold mb-4">STEM</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad
                        minim veniam, quis nostrud exercitation.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4">ABM</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad
                        minim veniam, quis nostrud exercitation.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4">HUMSS</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad
                        minim veniam, quis nostrud exercitation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enrollment Steps -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Enrollment Process</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        1</div>
                    <h3 class="font-bold mb-2">Submit Requirements</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        2</div>
                    <h3 class="font-bold mb-2">Assessment</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        3</div>
                    <h3 class="font-bold mb-2">Pay Fees</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="text-center">
                    <div
                        class="bg-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        4</div>
                    <h3 class="font-bold mb-2">Confirmation</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="space-y-2">
                            <p><strong>Address:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                            <p><strong>Phone:</strong> (123) 456-7890</p>
                            <p><strong>Email:</strong> info@balayanshs.edu.ph</p>
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

</x-layout>
