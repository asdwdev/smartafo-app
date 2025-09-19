<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah Trafo</h3>

    <!-- Form -->
    <form method="POST" action="/trafo" class="space-y-5">

        <!-- No Seri -->
        <div>
            <label for="no_seri" class="block text-sm font-medium text-gray-700">No Seri</label>
            <input type="text" id="no_seri" name="no_seri"
                value="<?= htmlspecialchars($_POST['no_seri'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['no_seri']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['no_seri'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['no_seri'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Merk -->
        <div>
            <label for="merk" class="block text-sm font-medium text-gray-700">Merk</label>
            <input type="text" id="merk" name="merk"
                value="<?= htmlspecialchars($_POST['merk'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['merk']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['merk'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['merk'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Kapasitas -->
        <div>
            <label for="kapasitas_kva" class="block text-sm font-medium text-gray-700">Kapasitas (kVA)</label>
            <input type="number" step="0.01" id="kapasitas_kva" name="kapasitas_kva"
                value="<?= htmlspecialchars($_POST['kapasitas_kva'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['kapasitas_kva']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['kapasitas_kva'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['kapasitas_kva'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Impedansi -->
        <div>
            <label for="impedansi_persen" class="block text-sm font-medium text-gray-700">Impedansi (%)</label>
            <input type="number" step="0.001" id="impedansi_persen" name="impedansi_persen"
                value="<?= htmlspecialchars($_POST['impedansi_persen'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['impedansi_persen']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['impedansi_persen'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['impedansi_persen'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Pemilik -->
        <div>
            <label for="pemilik" class="block text-sm font-medium text-gray-700">Pemilik</label>
            <input type="text" id="pemilik" name="pemilik"
                value="<?= htmlspecialchars($_POST['pemilik'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['pemilik']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['pemilik'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['pemilik'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Jenis Minyak -->
        <div>
            <label for="jenis_minyak" class="block text-sm font-medium text-gray-700">Jenis Minyak</label>
            <input type="text" id="jenis_minyak" name="jenis_minyak"
                value="<?= htmlspecialchars($_POST['jenis_minyak'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['jenis_minyak']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['jenis_minyak'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['jenis_minyak'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Tegangan Primer -->
        <div>
            <label for="tegangan_primer_kv" class="block text-sm font-medium text-gray-700">Tegangan Primer (kV)</label>
            <input type="number" step="0.001" id="tegangan_primer_kv" name="tegangan_primer_kv"
                value="<?= htmlspecialchars($_POST['tegangan_primer_kv'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tegangan_primer_kv']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['tegangan_primer_kv'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['tegangan_primer_kv'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Tegangan Sekunder -->
        <div>
            <label for="tegangan_sekunder_v" class="block text-sm font-medium text-gray-700">Tegangan Sekunder (V)</label>
            <input type="number" step="0.01" id="tegangan_sekunder_v" name="tegangan_sekunder_v"
                value="<?= htmlspecialchars($_POST['tegangan_sekunder_v'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tegangan_sekunder_v']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['tegangan_sekunder_v'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['tegangan_sekunder_v'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Kelas Isolasi -->
        <div>
            <label for="kelas_isolasi" class="block text-sm font-medium text-gray-700">Kelas Isolasi</label>
            <input type="text" id="kelas_isolasi" name="kelas_isolasi"
                value="<?= htmlspecialchars($_POST['kelas_isolasi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['kelas_isolasi']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['kelas_isolasi'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['kelas_isolasi'][0], ENT_QUOTES, 'UTF-8') ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Catatan -->
        <div>
            <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
            <textarea id="catatan" name="catatan"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['catatan']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 
                       focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($_POST['catatan'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($errors['catatan'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['catatan'][0], ENT_QUOTES, 'UTF-8') ?>
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