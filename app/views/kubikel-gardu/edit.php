<?php startBlock('content') ?>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Kubikel Gardu</h3>

    <!-- Form -->
    <form method="POST" action="/kubikel-gardu/<?= $id ?>" class="space-y-5">
        <input type="hidden" name="_method" value="PUT">

        <!-- Gardu Distribusi -->
        <div>
            <label for="gd_id" class="block text-sm font-medium text-gray-700">Gardu Distribusi</label>
            <select id="gd_id" name="gd_id"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['gd_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Gardu Distribusi --</option>
                <?php foreach ($garduDistribusi as $gd): ?>
                    <option value="<?= $gd['gd_id'] ?>"
                        <?= ($old['gd_id'] ?? $kubikelGardu['gd_id']) == $gd['gd_id'] ? 'selected' : '' ?>>
                        <?= $gd['gd_id'] ?> - <?= htmlspecialchars($gd['nama_gardu'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['gd_id'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['gd_id'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Kubikel -->
        <div>
            <label for="kubikel_id" class="block text-sm font-medium text-gray-700">Kubikel</label>
            <select id="kubikel_id" name="kubikel_id"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['kubikel_id']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm 
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
                <option value="">-- Pilih Kubikel --</option>
                <?php foreach ($kubikels as $k): ?>
                    <option value="<?= $k['kubikel_id'] ?>"
                        <?= ($old['kubikel_id'] ?? $kubikelGardu['kubikel_id']) == $k['kubikel_id'] ? 'selected' : '' ?>>
                        <?= $k['kubikel_id'] ?> - <?= htmlspecialchars($k['no_seri'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['kubikel_id'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['kubikel_id'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Tanggal Pasang -->
        <div>
            <label for="tgl_pasang" class="block text-sm font-medium text-gray-700">Tgl Pasang</label>
            <input type="date" id="tgl_pasang" name="tgl_pasang"
                value="<?= htmlspecialchars($old['tgl_pasang'] ?? $kubikelGardu['tgl_pasang'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tgl_pasang']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['tgl_pasang'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['tgl_pasang'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Tanggal Operasi -->
        <div>
            <label for="tgl_operasi" class="block text-sm font-medium text-gray-700">Tgl Operasi</label>
            <input type="date" id="tgl_operasi" name="tgl_operasi"
                value="<?= htmlspecialchars($old['tgl_operasi'] ?? $kubikelGardu['tgl_operasi'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['tgl_operasi']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['tgl_operasi'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['tgl_operasi'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Status RC -->
        <div>
            <label for="status_rc" class="block text-sm font-medium text-gray-700">Status RC</label>
            <input type="text" id="status_rc" name="status_rc"
                value="<?= htmlspecialchars($old['status_rc'] ?? $kubikelGardu['status_rc'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['status_rc']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['status_rc'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['status_rc'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Arah Gardu -->
        <div>
            <label for="arah_gardu" class="block text-sm font-medium text-gray-700">Arah Gardu</label>
            <input type="text" id="arah_gardu" name="arah_gardu"
                value="<?= htmlspecialchars($old['arah_gardu'] ?? $kubikelGardu['arah_gardu'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['arah_gardu']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['arah_gardu'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['arah_gardu'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- CT Info -->
        <div>
            <label for="ct_info" class="block text-sm font-medium text-gray-700">CT Info</label>
            <input type="text" id="ct_info" name="ct_info"
                value="<?= htmlspecialchars($old['ct_info'] ?? $kubikelGardu['ct_info'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['ct_info']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['ct_info'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['ct_info'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- VT Info -->
        <div>
            <label for="vt_info" class="block text-sm font-medium text-gray-700">VT Info</label>
            <input type="text" id="vt_info" name="vt_info"
                value="<?= htmlspecialchars($old['vt_info'] ?? $kubikelGardu['vt_info'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['vt_info']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['vt_info'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['vt_info'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Relay Info -->
        <div>
            <label for="relay_info" class="block text-sm font-medium text-gray-700">Relay Info</label>
            <input type="text" id="relay_info" name="relay_info"
                value="<?= htmlspecialchars($old['relay_info'] ?? $kubikelGardu['relay_info'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['relay_info']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['relay_info'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['relay_info'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Fuse Info -->
        <div>
            <label for="fuse_info" class="block text-sm font-medium text-gray-700">Fuse Info</label>
            <input type="text" id="fuse_info" name="fuse_info"
                value="<?= htmlspecialchars($old['fuse_info'] ?? $kubikelGardu['fuse_info'], ENT_QUOTES, 'UTF-8') ?>"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['fuse_info']) ? 'border-red-500' : 'border-gray-400' ?> 
                       bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2">
            <?php if (!empty($errors['fuse_info'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['fuse_info'][0], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        </div>

        <!-- Keterangan -->
        <div>
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <textarea id="keterangan" name="keterangan"
                class="mt-1 block w-full rounded-lg border <?= !empty($errors['keterangan']) ? 'border-red-500' : 'border-gray-400' ?> 
               bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 text-sm px-3 py-2"><?= htmlspecialchars($old['keterangan'] ?? $kubikelGardu['keterangan'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (!empty($errors['keterangan'])): ?>
                <p class="mt-1 text-sm text-red-600">
                    <?= htmlspecialchars($errors['keterangan'][0] ?? '', ENT_QUOTES, 'UTF-8') ?>
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