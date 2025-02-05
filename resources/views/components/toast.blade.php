<div id="toast-container" class="fixed top-4 right-4 z-50">
    <!-- Toasts will be dynamically inserted here -->
</div>

<script>
    function showToast(message, type = 'error') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');

        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';

        toast.className = `${bgColor} text-white px-6 py-4 rounded-lg shadow-lg mb-3 transition-all duration-500 transform translate-x-full opacity-0`;
        toast.innerHTML = `
            <div class="flex items-center">
                <span class="mr-2">${message}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-white hover:text-gray-200">
                    ×
                </button>
            </div>
        `;

        container.appendChild(toast);

        // Trigger animation
        setTimeout(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
        }, 10);

        // Auto remove after 5 seconds
        setTimeout(() => {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => {
                toast.remove();
            }, 500);
        }, 5000);
    }
</script>
