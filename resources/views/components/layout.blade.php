<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <a href="{{ route('home.index') }}" class="font-bold text-xl">Balayan Senior High School</a>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-blue-200">Home</a>
                    <a href="#" class="hover:text-blue-200">Programs</a>
                    <a href="#" class="hover:text-blue-200">Admission</a>
                    <a href="#" class="hover:text-blue-200">About Us</a>
                    <a href="#" class="hover:text-blue-200">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    {{ $slot }}
</body>

</html>
