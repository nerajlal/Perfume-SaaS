<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurah Perfumes Admin - @yield('title', 'Dashboard')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Inter for Shopify-like look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f1f2f3; }
        .shopify-green { color: #008060; }
        .bg-shopify-green { background-color: #008060; }
        .bg-shopify-green:hover { background-color: #006e52; }
        .sidebar-item:hover { background-color: #f6f6f7; color: #202223; }
        .sidebar-item.active { background-color: #edeeef; color: #008060; font-weight: 600; border-left: 3px solid #008060; }
        .card { box-shadow: 0 0 5px rgba(0,0,0,0.05), 0 1px 2px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="text-gray-800 h-screen flex overflow-hidden">

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full min-w-0">
        <!-- Top Bar -->
        @include('admin.partials.header')

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-8">
            <div class="max-w-5xl mx-auto space-y-6">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
