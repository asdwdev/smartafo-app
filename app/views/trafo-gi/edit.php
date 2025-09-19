<?php startBlock('content') ?>
<h3>Edit Trafo GI</h3>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color: red; margin-bottom: 10px;">
        <?= htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form method="POST" action="/trafo-gi/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>
        <label>Gardu Induk:</label>
        <select name="gi_id" required>
            <?php foreach ($garduInduks as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>"
                    <?= (string)($trafoGi['gi_id'] ?? '') === (string)$gi['gi_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($gi['nama_gi']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Trafo:</label>
        <select name="trafo_id" required>
            <?php foreach ($trafos as $t): ?>
                <option value="<?= $t['trafo_id'] ?>"
                    <?= (string)($trafoGi['trafo_id'] ?? '') === (string)$t['trafo_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['no_seri']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p><label>Tgl Pasang:</label>
        <input type="date" name="tgl_pasang"
            value="<?= htmlspecialchars($trafoGi['tgl_pasang'] ?? '') ?>">
    </p>

    <p><label>Tgl Operasi:</label>
        <input type="date" name="tgl_operasi"
            value="<?= htmlspecialchars($trafoGi['tgl_operasi'] ?? '') ?>">
    </p>

    <p><label>Status Operasi:</label>
        <input type="text" name="status_operasi"
            value="<?= htmlspecialchars($trafoGi['status_operasi'] ?? '') ?>">
    </p>

    <p><label>Kondisi Fisik:</label>
        <input type="text" name="kondisi_fisik"
            value="<?= htmlspecialchars($trafoGi['kondisi_fisik'] ?? '') ?>">
    </p>

    <p><label>Posisi Arde:</label>
        <input type="text" name="posisi_arde"
            value="<?= htmlspecialchars($trafoGi['posisi_arde'] ?? '') ?>">
    </p>

    <p><label>Arah Fasa:</label>
        <input type="text" name="arah_fasa"
            value="<?= htmlspecialchars($trafoGi['arah_fasa'] ?? '') ?>">
    </p>

    <p><label>Keterangan:</label>
        <textarea name="keterangan"><?= htmlspecialchars($trafoGi['keterangan'] ?? '') ?></textarea>
    </p>

    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>