<?php startBlock('content') ?>
<div class="p-8">
    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800">Selamat Datang di Dashboard Admin</h1>
        <p class="text-gray-600 mt-2">Kelola data trafo, gardu, dan jaringan distribusi dengan mudah melalui panel ini.</p>
    </div>

    <!-- Grid Cards -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Gardu Induk -->
        <a href="/gardu-induk" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-red-100 text-red-600 rounded-lg">🏭</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Gardu Induk</h3>
                    <p class="text-sm text-gray-600">Manajemen gardu induk</p>
                </div>
            </div>
        </a>

        <!-- Penyulang -->
        <a href="/penyulang" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-yellow-100 text-yellow-600 rounded-lg">🔌</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Penyulang</h3>
                    <p class="text-sm text-gray-600">Kelola data penyulang</p>
                </div>
            </div>
        </a>

        <!-- Gardu Hubung -->
        <a href="/gardu-hubung" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-pink-100 text-pink-600 rounded-lg">🔄</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Gardu Hubung</h3>
                    <p class="text-sm text-gray-600">Manajemen gardu hubung</p>
                </div>
            </div>
        </a>

        <!-- Gardu Distribusi -->
        <a href="/gardu-distribusi" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-green-100 text-green-600 rounded-lg">🏠</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Gardu Distribusi</h3>
                    <p class="text-sm text-gray-600">Kelola data gardu distribusi</p>
                </div>
            </div>
        </a>

        <!-- Trafo GI -->
        <a href="/trafo-gi" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-indigo-100 text-indigo-600 rounded-lg">⚙️</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Trafo GI</h3>
                    <p class="text-sm text-gray-600">Kelola data trafo GI</p>
                </div>
            </div>
        </a>

        <!-- Trafo Gardu -->
        <a href="/trafo-gardu" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-green-100 text-green-600 rounded-lg">⚡</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Trafo Gardu</h3>
                    <p class="text-sm text-gray-600">Manajemen trafo gardu</p>
                </div>
            </div>
        </a>

        <!-- Kubikel Gardu -->
        <a href="/kubikel-gardu" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">📦</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Kubikel Gardu</h3>
                    <p class="text-sm text-gray-600">Kelola kubikel gardu distribusi</p>
                </div>
            </div>
        </a>

        <!-- Jurusan -->
        <a href="/jurusan" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-teal-100 text-teal-600 rounded-lg">🛣️</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Jurusan</h3>
                    <p class="text-sm text-gray-600">Kelola data jurusan</p>
                </div>
            </div>
        </a>

        <!-- Trafo -->
        <a href="/trafo" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-purple-100 text-purple-600 rounded-lg">🔋</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Master Trafo</h3>
                    <p class="text-sm text-gray-600">Kelola data trafo</p>
                </div>
            </div>
        </a>

        <!-- Kubikel -->
        <a href="/kubikel" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-lg">📘</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Kubikel</h3>
                    <p class="text-sm text-gray-600">Kelola data kubikel</p>
                </div>
            </div>
        </a>

        <!-- Users -->
        <a href="/users" class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-gray-100 text-gray-600 rounded-lg">👤</div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">User Management</h3>
                    <p class="text-sm text-gray-600">Kelola pengguna sistem</p>
                </div>
            </div>
        </a>
    </div>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>