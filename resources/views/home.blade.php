<!DOCTYPE html>
<html>
<head>
    <title>AgroSense</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-50">

    <div class="min-h-screen flex flex-col justify-center items-center">

        <h1 class="text-5xl font-bold text-green-700 mb-4">
            AgroSense
        </h1>

        <p class="text-gray-700 text-lg mb-6">
            Smart Crop Progression Monitoring System
        </p>

        <div class="space-x-4">
            <a href="/login"
               class="bg-green-600 text-white px-6 py-3 rounded-lg">
               Login
            </a>

            <a href="/register"
               class="bg-blue-600 text-white px-6 py-3 rounded-lg">
               Register
            </a>
        </div>

    </div>

</body>
</html>