<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <script src="https://unpkg.com/heroicons@2.0.18/24/outline/index.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-gray-100 flex">

    <div id="time-container"
        class="fixed top-3 right-5 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-lg font-sans text-sm text-gray-700 z-50 flex items-center space-x-2">
        <i class="fas fa-clock text-blue-600"></i>
        <span id="time-text"></span>
    </div>

    <div id="time-container" class="time-container"></div>
    <nav class="bg-blue-800 text-white shadow-lg w-64 min-h-screen flex flex-col justify-between fixed left-0 top-0">
        <div class="px-6 py-3">
            <a href="" class="font-bold text-xl block py-2">Balayan Senior High School</a>
            <div class="mt-6">
                <a href="{{ route('admin.index') }}" class="block py-2 hover:text-blue-200 flex items-center">
                    <i class="fas fa-home w-5 h-5 mr-2"></i>
                    Dashboard
                </a>
                <a href="{{ route('enrollments.index') }}" class="block py-2 hover:text-blue-200 flex items-center">
                    <i class="fas fa-list w-5 h-5 mr-2"></i>
                    Enrollment List
                </a>
                @if (Auth::user()->role == 'admin')
                    <div class="relative">
                        <button id="userDropdownButton"
                            class="block py-2 hover:text-blue-200 w-full text-left flex items-center justify-between transition-colors duration-200">
                            <span class="flex items-center">
                                <i class="fas fa-users w-5 h-5 mr-2"></i>
                                Users
                            </span>
                            <i id="dropdownIcon"
                                class="fas fa-chevron-down w-4 h-4 transition-transform duration-200"></i>
                        </button>
                        <div id="userDropdown"
                            class="pl-4 hidden transition-all duration-200 ease-in-out opacity-0 transform -translate-y-1">
                            <a href="{{ route('teachers.index') }}"
                                class="block py-2 hover:text-blue-200 flex items-center">
                                <i class="fas fa-chalkboard-teacher w-5 h-5 mr-2"></i>
                                Teachers
                            </a>
                            <a href="#" class="block py-2 hover:text-blue-200 flex items-center">
                                <i class="fas fa-user-graduate w-5 h-5 mr-2"></i>
                                Sessions
                            </a>
                        </div>
                    </div>
                @endif
                <a href="{{ route('settings.index') }}" class="block py-2 hover:text-blue-200 flex items-center">
                    <i class="fas fa-cog w-5 h-5 mr-2"></i>
                    Settings
                </a>
            </div>
        </div>
        <div class="px-6 py-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left block py-2 hover:text-blue-200 flex items-center">
                    <i class="fas fa-sign-out-alt w-5 h-5 mr-2"></i>
                    Logout
                </button>
            </form>
            <div class="text-center text-sm text-blue-200 mt-4">
                All Rights Reserved BSHS © 2025
            </div>
        </div>
    </nav>
    <div class="flex-1 px-6 py-10 ml-64">
        {{ $slot }}
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const timeText = document.getElementById('time-text');

        function updateTime() {
            const now = new Date();
            const formattedTime = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });
            const formattedDate = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            timeText.textContent = `${formattedDate} ${formattedTime}`;
        }

        setInterval(updateTime, 1000);
        updateTime();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setupDropdown(buttonId, dropdownId, iconId, storageKey) {
            const dropdown = document.getElementById(dropdownId);
            const button = document.getElementById(buttonId);
            const icon = document.getElementById(iconId);

            if (localStorage.getItem(storageKey) === 'open') {
                dropdown.classList.remove('hidden');
                dropdown.classList.add('opacity-100', 'translate-y-0');
                icon.classList.add('rotate-180');
            }

            button.addEventListener('click', function() {
                const isHidden = dropdown.classList.contains('hidden');

                dropdown.classList.toggle('hidden');
                dropdown.classList.toggle('opacity-0', !isHidden);
                dropdown.classList.toggle('-translate-y-1', !isHidden);
                dropdown.classList.toggle('opacity-100', isHidden);
                dropdown.classList.toggle('translate-y-0', isHidden);
                icon.classList.toggle('rotate-180', isHidden);

                localStorage.setItem(storageKey, isHidden ? 'open' : 'closed');
            });
        }

        setupDropdown('userDropdownButton', 'userDropdown', 'dropdownIcon', 'dropdownState');
        setupDropdown('enrollmentDropdownButton', 'enrollmentDropdown', 'enrollmentDropdownIcon',
            'enrollmentDropdownState');
    });
</script>

</html>
