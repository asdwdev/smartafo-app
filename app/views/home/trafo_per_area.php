<?php startBlock('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Statistik - Jumlah Trafo Terpasang per Area</h2>
        <div class="flex items-center gap-3">
            <a href="/statistik/trafo-per-area"
                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg shadow 
                      hover:bg-gray-200 transition text-sm font-medium flex items-center gap-2">
                🔄 Refresh
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
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Area</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Total Trafo Terpasang</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($data)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($data as $row): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-sm text-gray-800"><?= $no++; ?></td>
                            <td class="px-6 py-3 text-sm text-gray-800">
                                <?= htmlspecialchars($row['nama_area'], ENT_QUOTES, 'UTF-8') ?>
                            </td>
                            <td class="px-6 py-3 text-sm text-center font-semibold text-gray-800">
                                <?= htmlspecialchars($row['total_trafo'], ENT_QUOTES, 'UTF-8') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="px-6 py-6 text-center text-gray-500 text-sm">
                            Tidak ada data trafo terpasang per area.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>