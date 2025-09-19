<?php startBlock('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Master Kubikel Gardu</h2>
        <div class="flex items-center gap-3">
            <!-- Search -->
            <div class="relative">
                <input type="text" placeholder="Cari Kubikel Gardu..."
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
            <a href="/kubikel-gardu/create"
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
    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-x-auto border rounded-xl shadow bg-white">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">GD ID</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Kubikel ID</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Tgl Pasang</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Tgl Operasi</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Status RC</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Arah Gardu</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">CT Info</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">VT Info</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Relay Info</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Fuse Info</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Keterangan</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if (!empty($kubikelGardu)): ?>
                            <?php foreach ($kubikelGardu as $kg): ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['gd_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['kubikel_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['tgl_pasang'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['tgl_operasi'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['status_rc'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['arah_gardu'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['ct_info'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['vt_info'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['relay_info'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['fuse_info'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3"><?= htmlspecialchars($kg['keterangan'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td class="px-6 py-3 text-center whitespace-nowrap">
                                        <a href="/kubikel-gardu/<?= $kg['kubikel_gardu_id'] ?>/edit"
                                            class="text-blue-600 hover:text-blue-800 mx-2">✏️ Edit</a>
                                        <form method="POST" action="/kubikel-gardu/<?= $kg['kubikel_gardu_id'] ?>" class="inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="text-red-600 hover:text-red-800 mx-2">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="12" class="px-6 py-6 text-center text-gray-500">
                                    Belum ada data kubikel gardu.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>