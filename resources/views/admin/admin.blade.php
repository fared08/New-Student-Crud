<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <form method="POST" action="{{ route('admin.login.submit') }}" class="bg-white p-8 shadow rounded w-96">
        @csrf
        <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>

        @if ($errors->any())
            <div class="text-red-500 mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded mb-4" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded mb-4" required>
        <button class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Login</button>
    </form>
</body>
</html>
