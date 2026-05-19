<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-900 text-white flex-shrink-0">
        <div class="p-6 border-b border-blue-700">
            <p class="font-bold text-lg">⚙️ Apex Flow</p>
            <p class="text-blue-300 text-xs">Admin Panel</p>
        </div>
        <nav class="p-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
               📊 Dashboard
            </a>
            <a href="{{ route('admin.leads.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.leads*') ? 'bg-blue-700' : '' }}">
               📋 Customer Leads
            </a>
            <a href="{{ route('admin.employees.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.employees*') ? 'bg-blue-700' : '' }}">
               👷 Employees
            </a>
            <a href="{{ route('admin.attendance.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.attendance*') ? 'bg-blue-700' : '' }}">
               📅 Attendance
            </a>
            <a href="{{ route('admin.payments.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.payments*') ? 'bg-blue-700' : '' }}">
               💰 Payments
            </a>
            <a href="{{ route('admin.services.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.services*') ? 'bg-blue-700' : '' }}">
               🔧 Services
            </a>
            <a href="{{ route('admin.settings') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700 {{ request()->routeIs('admin.settings*') ? 'bg-blue-700' : '' }}">
               ⚙️ Site Settings
            </a>
            <hr class="border-blue-700 my-2">
            <a href="{{ route('home') }}" target="_blank"
               class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-700">
               🌐 View Website
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-700 w-full text-left">
                    🚪 Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- MAIN AREA -->
    <div class="flex-1 flex flex-col">
        <header class="bg-white shadow px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">@yield('title')</h1>
            <span class="text-sm text-gray-500">👤 {{ auth()->user()->name }}</span>
        </header>
        <main class="flex-1 p-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 font-semibold">
                    ✅ {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>