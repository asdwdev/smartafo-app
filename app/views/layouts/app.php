<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Master Jaringan Distribusi' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>

<body class="h-screen flex bg-gray-50 text-gray-900">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-sm flex flex-col">
        <!-- Logo & Title -->
        <div class="p-6 flex items-center space-x-3 border-b">
            <div class="h-10 w-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                JD
            </div>
            <div>
                <h1 class="text-lg font-semibold text-gray-800">Jardist Admin</h1>
                <p class="text-xs text-gray-500">Distribusi PLN</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 overflow-y-auto">
            <div class="mb-6">
                <h3 class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Home</h3>
                <a href="/dashboard"
                    class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-blue-50 hover:text-blue-600 transition">
                    <span class="material-icons text-base mr-2">dashboard</span>
                    Dashboard
                </a>
            </div>

            <div class="mb-6">
                <h3 class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Master Data</h3>
                <ul class="space-y-1">
                    <li><a href="/gardu-induk" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Gardu Induk</a></li>
                    <li><a href="/penyulang" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Penyulang</a></li>
                    <li><a href="/gardu-hubung" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Gardu Hubung</a></li>
                    <li><a href="/gardu-distribusi" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Gardu Distribusi</a></li>
                    <li><a href="/trafo-gi" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Trafo GI</a></li>
                    <li><a href="/trafo-gardu" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Trafo Gardu Distribusi</a></li>
                    <li><a href="/kubikel-gardu" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Kubikel Gardu Distribusi</a></li>
                    <li><a href="/jurusan" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Jurusan</a></li>
                    <li><a href="/trafo" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Trafo</a></li>
                    <li><a href="/kubikel" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Kubikel</a></li>
                </ul>
            </div>

            <div class="mb-6">
                <h3 class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Rekap Data</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Penyulang per GI</a></li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Gardu per Penyulang</a></li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Gardu per Area</a></li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">Trafo per Area</a></li>
                    <li><a href="/user-account" class="block px-3 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">User</a></li>
                </ul>
            </div>
        </nav>

        <!-- Footer Sidebar -->
        <div class="p-4 border-t bg-gray-50">
            <p class="text-sm">
                <span class="font-medium"><?= $_SESSION['user']['full_name'] ?? 'Guest' ?></span>
                | <a href="/logout" class="text-red-600 hover:underline">Logout</a>
            </p>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="h-16 bg-white shadow flex items-center justify-between px-6">
            <h2 class="text-lg font-semibold"><?= $title ?? 'Dashboard' ?></h2>

            <!-- User Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center space-x-2 focus:outline-none">
                    <div class="h-8 w-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">
                        <?= strtoupper(substr($_SESSION['user']['full_name'] ?? 'G', 0, 1)) ?>
                    </div>
                    <span class="hidden sm:block text-sm font-medium text-gray-700">
                        <?= $_SESSION['user']['full_name'] ?? 'Guest' ?>
                    </span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border py-2 z-50">
                    <a href="/logout"
                        class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <section class="flex-1 p-6 overflow-y-auto">
            <?= $content ?? '' ?>
        </section>
    </main>
</body>

</html>