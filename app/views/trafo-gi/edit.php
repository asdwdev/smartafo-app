<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Trafo GI</h3>

    <!-- Form -->
    <form method="POST" action="/trafo-gi/<?= $id ?>" class="space-y-5">
        <input type="hidden" name="_method" value="PUT">

        <!-- Gardu Induk -->
        <div>
            <label for="gi_id" class="block text-sm font-medium text-gray-700">Gardu Induk</label>
            <select id="gi_id" name="gi_id"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['gi_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Gardu Induk --</option>
                <?php foreach ($garduInduks as $gi): ?>
                    <option value="<?= $gi['gi_id'] ?>"
                        <?= ($old['gi_id'] ?? $trafoGi['gi_id']) == $gi['gi_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($gi['nama_gi'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['gi_id'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['gi_id'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Trafo -->
        <div>
            <label for="trafo_id" class="block text-sm font-medium text-gray-700">Trafo</label>
            <select id="trafo_id" name="trafo_id"
                class="mt-1 block w-full rounded-lg border 
                    <?= !empty($errors['trafo_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                    bg-white text-gray-900 shadow-sm 
                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Trafo --</option>
                <?php foreach ($trafos as $t): ?>
                    <option value="<?= $t['trafo_id'] ?>"
                        <?= ($old['trafo_id'] ?? $trafoGi['trafo_id']) == $t['trafo_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($t['no_seri'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['trafo_id'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['trafo_id'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Tanggal Pasang -->
        <div>
            <label for="tgl_pasang" class="block text-sm font-medium text-gray-700">Tgl Pasang</label>
            <input type="date" id="tgl_pasang" name="tgl_pasang"
                value="<?= htmlspecialchars($old['tgl_pasang'] ?? $trafoGi['tgl_pasang'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tgl_pasang']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2" required>
            <?php if (!empty($errors['tgl_pasang'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['tgl_pasang'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Tanggal Operasi -->
        <div>
            <label for="tgl_operasi" class="block text-sm font-medium text-gray-700">Tgl Operasi</label>
            <input type="date" id="tgl_operasi" name="tgl_operasi"
                value="<?= htmlspecialchars($old['tgl_operasi'] ?? $trafoGi['tgl_operasi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tgl_operasi']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2" required>
            <?php if (!empty($errors['tgl_operasi'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['tgl_operasi'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Status Operasi -->
        <div>
            <label for="status_operasi" class="block text-sm font-medium text-gray-700">Status Operasi</label>
            <input type="text" id="status_operasi" name="status_operasi"
                value="<?= htmlspecialchars($old['status_operasi'] ?? $trafoGi['status_operasi'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['status_operasi']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['status_operasi'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['status_operasi'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Kondisi Fisik -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi Fisik</label>
            <div class="flex gap-6">
                <?php
                $options = ['Baik', 'Rusak', 'Perlu Perbaikan'];
                foreach ($options as $option):
                    $checked = ($old['kondisi_fisik'] ?? $trafoGi['kondisi_fisik']) === $option ? 'checked' : '';
                ?>
                    <label class="inline-flex items-center gap-2 text-sm text-gray-800">
                        <input type="radio" name="kondisi_fisik" value="<?= $option ?>" <?= $checked ?>
                            class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <?= $option ?>
                    </label>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($errors['kondisi_fisik'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['kondisi_fisik'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Posisi Arde -->
        <div>
            <label for="posisi_arde" class="block text-sm font-medium text-gray-700">Posisi Arde</label>
            <input type="text" id="posisi_arde" name="posisi_arde"
                value="<?= htmlspecialchars($old['posisi_arde'] ?? $trafoGi['posisi_arde'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['posisi_arde']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['posisi_arde'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['posisi_arde'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Arah Fasa -->
        <div>
            <label for="arah_fasa" class="block text-sm font-medium text-gray-700">Arah Fasa</label>
            <input type="text" id="arah_fasa" name="arah_fasa"
                value="<?= htmlspecialchars($old['arah_fasa'] ?? $trafoGi['arah_fasa'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['arah_fasa']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['arah_fasa'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['arah_fasa'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Keterangan -->
        <div>
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <textarea id="keterangan" name="keterangan"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['keterangan']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['keterangan'] ?? $trafoGi['keterangan'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($errors['keterangan'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['keterangan'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between pt-4">
            <button type="button" onclick="window.history.back()"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Back</button>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">Update</button>
        </div>
    </form>
</div>
<?php endBlock() ?>

<?php extend('layouts/app') ?>