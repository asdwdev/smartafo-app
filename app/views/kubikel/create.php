<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Kubikel</h3>

    <!-- Form -->
    <form method="POST" action="/kubikel" class="space-y-5">

        <!-- No Seri -->
        <div>
            <label for="no_seri" class="block text-sm font-medium text-gray-700">No Seri</label>
            <input type="text" id="no_seri" name="no_seri"
                value="<?= htmlspecialchars($old['no_seri'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['no_seri']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['no_seri'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['no_seri'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Merk -->
        <div>
            <label for="merk" class="block text-sm font-medium text-gray-700">Merk</label>
            <input type="text" id="merk" name="merk"
                value="<?= htmlspecialchars($old['merk'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['merk']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['merk'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['merk'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Jenis -->
        <div>
            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
            <input type="text" id="jenis" name="jenis"
                value="<?= htmlspecialchars($old['jenis'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['jenis']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['jenis'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['jenis'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Fungsi -->
        <div>
            <label for="fungsi" class="block text-sm font-medium text-gray-700">Fungsi</label>
            <input type="text" id="fungsi" name="fungsi"
                value="<?= htmlspecialchars($old['fungsi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['fungsi']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['fungsi'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['fungsi'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Tegangan -->
        <div>
            <label for="tegangan_kv" class="block text-sm font-medium text-gray-700">Tegangan (kV)</label>
            <input type="number" step="0.001" id="tegangan_kv" name="tegangan_kv"
                value="<?= htmlspecialchars($old['tegangan_kv'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tegangan_kv']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['tegangan_kv'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['tegangan_kv'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Kapasitas -->
        <div>
            <label for="kapasitas_a" class="block text-sm font-medium text-gray-700">Kapasitas (A)</label>
            <input type="number" step="0.01" id="kapasitas_a" name="kapasitas_a"
                value="<?= htmlspecialchars($old['kapasitas_a'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['kapasitas_a']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['kapasitas_a'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['kapasitas_a'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Impedansi -->
        <div>
            <label for="impedansi_persen" class="block text-sm font-medium text-gray-700">Impedansi (%)</label>
            <input type="number" step="0.001" id="impedansi_persen" name="impedansi_persen"
                value="<?= htmlspecialchars($old['impedansi_persen'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['impedansi_persen']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['impedansi_persen'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['impedansi_persen'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Catatan -->
        <div>
            <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
            <textarea id="catatan" name="catatan"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['catatan']) ? 'border-red-500' : 'border-gray-400' ?>
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['catatan'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($errors['catatan'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['catatan'][0], ENT_QUOTES, 'UTF-8') ?></p>
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