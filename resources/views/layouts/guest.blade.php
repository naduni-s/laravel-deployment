<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styling for static background and effects -->
    <style>
        /* Keyframes for fade-in animation */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        /* Static dark background gradient */
        .gradient-bg {
            background: linear-gradient(45deg, #1a1a1a, #2c3e50); /* Black to dark blue-gray gradient */
            background-size: cover;
        }

        /* Glassmorphism background with dark theme */
        .glass-effect {
            backdrop-filter: blur(12px);
            background-color: rgba(20, 20, 20, 0.7);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Hover effect for buttons */
        .btn:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }

        /* Focus effect for input fields */
        input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(50, 150, 255, 0.8);
        }
    </style>
</head>
<body class="font-sans text-white antialiased gradient-bg">

    <div class="min-h-screen flex items-center justify-center px-6 py-12 fade-in">
        <div class="w-full sm:max-w-md glass-effect">
            <div class="flex justify-center mb-6">
                <a href="/">
                    <img src="{{ asset('scLogo.jpeg') }}" alt="Your Logo" class="h-16 w-auto">
                </a>
            </div>

            <h2 class="text-center text-3xl font-bold mb-6">Welcome Back</h2>

            <!-- Login Form -->
            <div>
                {{ $slot }}
            </div>
            
        </div>
    </div>

</body>
</html>
