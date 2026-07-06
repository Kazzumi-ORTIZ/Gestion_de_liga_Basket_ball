<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Liga de Básquetbol')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', system-ui, sans-serif; }
        body { background: #f0f2f5; }
        .sidebar { transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
        }
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 2px; }
        .nav-link { position: relative; overflow: hidden; }
        .nav-link::after { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: #3b82f6; border-radius: 0 3px 3px 0; transform: scaleY(0); transition: transform 0.2s ease; }
        .nav-link.active::after { transform: scaleY(1); }
        .nav-link:hover:not(.active) { background: rgba(255,255,255,0.06); }
        .card-hover { transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 12px 24px -8px rgba(0,0,0,0.1); }
        .btn { transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); }
        .btn:active { transform: scale(0.96); }
        .fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .table-row { transition: all 0.15s ease; }
        .table-row:nth-child(even) { background: rgba(59, 130, 246, 0.02); }
        .table-row:hover { background: rgba(59, 130, 246, 0.06); }
        .input-focus { transition: all 0.2s ease; }
        .input-focus:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15); }
    </style>
</head>
<body class="min-h-screen antialiased text-gray-800">

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

    @include('layouts.navigation')

    <div class="md:ml-64 min-h-screen flex flex-col">
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-200/60 sticky top-0 z-30">
            <div class="flex items-center justify-between px-4 sm:px-6 h-16">
                <button onclick="toggleSidebar()" class="md:hidden w-10 h-10 flex items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 transition">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <div class="flex items-center gap-3 ml-auto">
                    <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-gray-50 rounded-full text-sm text-gray-500">
                        <i class="far fa-user-circle"></i>
                        {{ auth()->user()->name ?? 'Usuario' }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100">
                            <i class="fas fa-sign-out-alt text-xs"></i>
                            <span class="hidden sm:inline">Salir</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        @isset($header)
            <div class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="max-w-7xl mx-auto">{{ $header }}</div>
            </div>
        @endisset

        <main class="flex-1 p-4 sm:p-6 lg:p-8 fade-in">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        <footer class="bg-white/60 border-t border-gray-200 px-6 py-4 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} Liga de Básquetbol &mdash; Panel de Administración
        </footer>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }
    </script>
</body>
</html>