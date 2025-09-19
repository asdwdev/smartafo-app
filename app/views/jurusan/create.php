<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Jurusan</h3>

    <!-- Form -->
    <form method="POST" action="/jurusan" class="space-y-5">

        <!-- Gardu Distribusi -->
        <div>
            <label for="gd_id" class="block text-sm font-medium text-gray-700">Gardu Distribusi</label>
            <select id="gd_id" name="gd_id"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['gd_id']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Gardu Distribusi --</option>
                <?php foreach ($garduDistribusi as $gd): ?>
                    <option value="<?= $gd['gd_id'] ?>" <?= ($old['gd_id'] ?? '') == $gd['gd_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($gd['nama_gardu'] ?? 'GD ' . $gd['gd_id'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['gd_id'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['gd_id'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Trafo Gardu (opsional) -->
        <div>
            <label for="trafo_gardu_id" class="block text-sm font-medium text-gray-700">Trafo Gardu (Opsional)</label>
            <select id="trafo_gardu_id" name="trafo_gardu_id"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['trafo_gardu_id']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Trafo Gardu (opsional) --</option>
                <?php foreach ($trafoGardu as $tg): ?>
                    <option value="<?= $tg['trafo_gardu_id'] ?>" <?= ($old['trafo_gardu_id'] ?? '') == $tg['trafo_gardu_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($tg['nama_trafo'] ?? 'Trafo ' . $tg['trafo_gardu_id'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['trafo_gardu_id'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['trafo_gardu_id'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Nama Jurusan -->
        <div>
            <label for="nama_jurusan" class="block text-sm font-medium text-gray-700">Nama Jurusan</label>
            <input type="text" id="nama_jurusan" name="nama_jurusan"
                value="<?= htmlspecialchars($old['nama_jurusan'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['nama_jurusan']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['nama_jurusan'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['nama_jurusan'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Keterangan -->
        <div>
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <textarea id="keterangan" name="keterangan"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['keterangan']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['keterangan'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($errors['keterangan'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['keterangan'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between pt-4">
            <button type="button" onclick="window.history.back()"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                Back
            </button>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>

    </form>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>