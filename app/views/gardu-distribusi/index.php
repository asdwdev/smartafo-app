<?php startBlock('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Master Gardu Distribusi</h2>
        <div class="flex items-center gap-3">
            <!-- Search -->
            <form method="GET" action="/gardu-distribusi" class="relative">
                <input type="text" name="search" placeholder="Cari Gardu Distribusi..." value="<?= htmlspecialchars($search ?? '', ENT_QUOTES, 'UTF-8') ?>"
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
                <!-- Hidden inputs to preserve pagination -->
                <?php if (isset($_GET['page']) && $_GET['page'] != 1): ?>
                    <input type="hidden" name="page" value="1">
                <?php endif; ?>
            </form>

            <!-- Clear Search Button (only show when searching) -->
            <?php if (!empty($search)): ?>
                <a href="/gardu-distribusi" class="text-gray-400 hover:text-gray-600 transition-colors" title="Hapus Pencarian">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            <?php endif; ?>

            <!-- Tambah -->
            <a href="/gardu-distribusi/create"
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
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Kode Gardu</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Gardu</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Alamat</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Keterangan</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($gardus)): ?>
                    <?php foreach ($gardus as $gd): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-sm text-gray-800"><?= htmlspecialchars($gd['kode_gardu'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-800 font-medium"><?= htmlspecialchars($gd['nama_gardu'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?= htmlspecialchars($gd['alamat'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-sm text-gray-600"><?= htmlspecialchars($gd['keterangan'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="px-6 py-3 text-center text-sm">
                                <a href="/gardu-distribusi/<?= $gd['gd_id'] ?>/edit"
                                    class="text-blue-600 hover:text-blue-800 mx-2 inline-flex items-center">
                                    ✏️ Edit
                                </a>
                                <form method="POST" action="/gardu-distribusi/<?= $gd['gd_id'] ?>" class="inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus data ini?')"
                                        class="text-red-600 hover:text-red-800 mx-2 inline-flex items-center">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500 text-sm">
                            <?php if (!empty($search)): ?>
                                Tidak ada gardu distribusi yang sesuai dengan pencarian "<strong><?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?></strong>".
                                <br>
                                <a href="/gardu-distribusi" class="text-blue-600 hover:text-blue-800 underline mt-2 inline-block">
                                    Lihat semua data
                                </a>
                            <?php else: ?>
                                Belum ada gardu distribusi.
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination and Info -->
    <?php if (isset($pagination) && $pagination['total_records'] > 0): ?>
        <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <!-- Records Info -->
            <div class="text-sm text-gray-600">
                Menampilkan 
                <span class="font-medium"><?= (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 ?></span>
                sampai 
                <span class="font-medium"><?= min($pagination['current_page'] * $pagination['per_page'], $pagination['total_records']) ?></span>
                dari 
                <span class="font-medium"><?= $pagination['total_records'] ?></span>
                data
                <?php if (!empty($search)): ?>
                    untuk pencarian "<span class="font-medium"><?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?></span>"
                <?php endif; ?>
            </div>

            <!-- Pagination Controls -->
            <?php if ($pagination['total_pages'] > 1): ?>
                <div class="flex items-center gap-2">
                    <!-- Per Page Selector -->
                    <div class="flex items-center gap-2 text-sm">
                        <span class="text-gray-600">Per halaman:</span>
                        <select onchange="changePerPage(this.value)" class="border border-gray-300 rounded px-2 py-1 text-sm">
                            <option value="10" <?= $pagination['per_page'] == 10 ? 'selected' : '' ?>>10</option>
                            <option value="25" <?= $pagination['per_page'] == 25 ? 'selected' : '' ?>>25</option>
                            <option value="50" <?= $pagination['per_page'] == 50 ? 'selected' : '' ?>>50</option>
                            <option value="100" <?= $pagination['per_page'] == 100 ? 'selected' : '' ?>>100</option>
                        </select>
                    </div>

                    <!-- Page Navigation -->
                    <div class="flex items-center gap-1">
                        <!-- Previous -->
                        <?php if ($pagination['has_prev']): ?>
                            <a href="<?= buildPaginationUrl($pagination['prev_page']) ?>" 
                               class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">
                                ‹
                            </a>
                        <?php else: ?>
                            <span class="px-3 py-1 text-sm bg-gray-100 border border-gray-300 rounded text-gray-400">‹</span>
                        <?php endif; ?>

                        <!-- Page Numbers -->
                        <?php
                        $start = max(1, $pagination['current_page'] - 2);
                        $end = min($pagination['total_pages'], $pagination['current_page'] + 2);
                        
                        if ($start > 1): ?>
                            <a href="<?= buildPaginationUrl(1) ?>" class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">1</a>
                            <?php if ($start > 2): ?>
                                <span class="px-2 py-1 text-sm text-gray-500">...</span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <?php if ($i == $pagination['current_page']): ?>
                                <span class="px-3 py-1 text-sm bg-blue-600 text-white border border-blue-600 rounded"><?= $i ?></span>
                            <?php else: ?>
                                <a href="<?= buildPaginationUrl($i) ?>" class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($end < $pagination['total_pages']): ?>
                            <?php if ($end < $pagination['total_pages'] - 1): ?>
                                <span class="px-2 py-1 text-sm text-gray-500">...</span>
                            <?php endif; ?>
                            <a href="<?= buildPaginationUrl($pagination['total_pages']) ?>" class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50"><?= $pagination['total_pages'] ?></a>
                        <?php endif; ?>

                        <!-- Next -->
                        <?php if ($pagination['has_next']): ?>
                            <a href="<?= buildPaginationUrl($pagination['next_page']) ?>" 
                               class="px-3 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50">
                                ›
                            </a>
                        <?php else: ?>
                            <span class="px-3 py-1 text-sm bg-gray-100 border border-gray-300 rounded text-gray-400">›</span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<script>
function changePerPage(value) {
    const url = new URL(window.location);
    url.searchParams.set('per_page', value);
    url.searchParams.set('page', '1'); // Reset to first page
    window.location = url.toString();
}
</script>

<?php
// Helper function to build pagination URLs
function buildPaginationUrl($page) {
    $params = $_GET;
    $params['page'] = $page;
    return '/gardu-distribusi?' . http_build_query($params);
}
?>
<?php endBlock() ?>

<?php extend('layouts/app') ?>