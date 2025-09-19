<?php startBlock('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Master Kubikel</h2>
        <div class="flex items-center gap-3">
            <!-- Search -->
            <div class="relative">
                <input type="text" placeholder="Cari Kubikel..."
                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 bg-gray-50 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                           text-sm w-64">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 absolute left-3 top-2.5 text-gray-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="11" cy="11" r="8" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <!-- Tambah -->
            <a href="/kubikel/create"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow 
                       hover:bg-blue-700 transition text-sm font-medium flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah
            </a>
        </div>
    </div>

    <!-- Error Message -->
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-300 text-red-700 text-sm font-medium">
            <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Table -->
    <div class="overflow-hidden rounded-xl shadow bg-white">
        <table class="min-w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">No Seri</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Merk</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Jenis</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Fungsi</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Tegangan (kV)</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Kapasitas (A)</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Impedansi (%)</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Catatan</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($kubikels)): ?>
                    <?php foreach ($kubikels as $k): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-sm text-gray-800"><?= htmlspecialchars($k['no_seri'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-800"><?= htmlspecialchars($k['merk'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-800"><?= htmlspecialchars($k['jenis'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-800"><?= htmlspecialchars($k['fungsi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?= htmlspecialchars($k['tegangan_kv'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?= htmlspecialchars($k['kapasitas_a'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?= htmlspecialchars($k['impedansi_persen'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?= htmlspecialchars($k['catatan'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-center text-sm">
                                <a href="/kubikel/<?= $k['kubikel_id'] ?>/edit"
                                    class="text-blue-600 hover:text-blue-800 mx-2 inline-flex items-center">
                                    ✏️ Edit
                                </a>
                                <form method="POST" action="/kubikel/<?= $k['kubikel_id'] ?>" class="inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="text-red-600 hover:text-red-800 mx-2 inline-flex items-center">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="px-6 py-6 text-center text-gray-500 text-sm">
                            Belum ada data kubikel.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>