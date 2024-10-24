<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">Dashboard</a>
            <a href="{{ route('po.index') }}" class="ml-4">PO List</a>
        </div>
    </nav>
    
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>
</body>
</html>
