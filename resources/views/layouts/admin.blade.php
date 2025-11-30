<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-white flex-col hidden md:flex transition-all duration-300">
            <div class="h-16 flex items-center justify-center border-b border-slate-700">
                <h1 class="text-xl font-bold">My<span class="text-blue-500">App</span></h1>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-feather="home" class="w-5 h-5 mr-3"></i>
                    Dashboard
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-slate-500 uppercase">Manajemen</p>
                </div>

                <a href="{{ route('admin.users.index') }}"
                {{-- <a href="{{ route('admin.dashboard') }}"  --}}
                   class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-feather="users" class="w-5 h-5 mr-3"></i>
                    Users
                </a>

                <a href="{{ route('admin.programs.index') }}" 
                {{-- <a href="{{ route('admin.dashboard') }}"  --}}
                   class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.programs.*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-feather="layers" class="w-5 h-5 mr-3"></i>
                    Programs
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-slate-500 uppercase">Keuangan</p>
                </div>

                <a href="{{ route('admin.transactions.index') }}" 
                {{-- <a href="{{ route('admin.dashboard') }}"  --}}
                   class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.transactions.*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-feather="dollar-sign" class="w-5 h-5 mr-3"></i>
                    Transactions
                </a>

                
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-slate-500 uppercase">Beranda</p>
                </div>

                <a href="{{ route('donasi') }}" 
                {{-- <a href="{{ route('admin.dashboard') }}"  --}}
                   class="flex items-center px-4 py-3 rounded-md transition-colors {{ request()->routeIs('admin.transactions.*') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-feather="dollar-sign" class="w-5 h-5 mr-3"></i>
                    Kembali ke beranda
                </a>

            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-10">
                <h2 class="text-lg font-semibold text-gray-700">@yield('header_title', 'Overview')</h2>
                <div class="flex items-center space-x-3">
                    <span class="text-sm font-medium text-gray-600">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>