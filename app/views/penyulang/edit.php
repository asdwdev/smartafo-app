<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Data Penyulang</h3>

    <!-- Form -->
    <form method="POST" action="/penyulang/<?= $id ?>" class="space-y-5">
        <input type="hidden" name="_method" value="PUT">

        <!-- Kode Penyulang -->
        <div>
            <label for="kode_penyulang" class="block text-sm font-medium text-gray-700">Kode Penyulang</label>
            <input type="text" id="kode_penyulang" name="kode_penyulang"
                value="<?= htmlspecialchars($old['kode_penyulang'] ?? $penyulang['kode_penyulang'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['kode_penyulang']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['kode_penyulang'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['kode_penyulang'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Nama Penyulang -->
        <div>
            <label for="nama_penyulang" class="block text-sm font-medium text-gray-700">Nama Penyulang</label>
            <input type="text" id="nama_penyulang" name="nama_penyulang"
                value="<?= htmlspecialchars($old['nama_penyulang'] ?? $penyulang['nama_penyulang'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                required
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['nama_penyulang']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['nama_penyulang'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['nama_penyulang'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Tegangan (kV) -->
        <div>
            <label for="tegangan_kv" class="block text-sm font-medium text-gray-700">Tegangan (kV)</label>
            <input type="number" id="tegangan_kv" name="tegangan_kv"
                value="<?= htmlspecialchars((string)($old['tegangan_kv'] ?? $penyulang['tegangan_kv'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['tegangan_kv']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">

            <?php if (!empty($errors['tegangan_kv'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['tegangan_kv'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Gardu Induk -->
        <div>
            <label for="gi_id" class="block text-sm font-medium text-gray-700">Gardu Induk</label>
            <select id="gi_id" name="gi_id" required
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['gi_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Gardu Induk --</option>
                <?php foreach ($garduInduk as $gi): ?>
                    <option value="<?= $gi['gi_id'] ?>"
                        <?= ($old['gi_id'] ?? $penyulang['gi_id'] ?? null) == $gi['gi_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($gi['nama_gi'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php if (!empty($errors['gi_id'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['gi_id'][0], ENT_QUOTES, 'UTF-8') ?>
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
                Update
            </button>
        </div>
    </form>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>