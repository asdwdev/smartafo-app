<?php startBlock('content') ?>
<h3>Tambah Trafo Gardu</h3>

<?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $field => $fieldErrors): ?>
                <?php foreach ((array)$fieldErrors as $err): ?>
                    <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/trafo-gardu">
    <p>Gardu Distribusi:
        <select name="gd_id" required>
            <option value="">-- Pilih GD --</option>
            <?php foreach ($garduDistribusis as $gd): ?>
                <option value="<?= $gd['gd_id'] ?>"><?= htmlspecialchars($gd['nama_gardu']) ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Trafo:
        <select name="trafo_id" required>
            <option value="">-- Pilih Trafo --</option>
            <?php foreach ($trafos as $t): ?>
                <option value="<?= $t['trafo_id'] ?>"><?= htmlspecialchars($t['no_seri']) ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Tgl Pasang: <input type="date" name="tgl_pasang"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi"></p>
    <p>Status Operasi: <input type="text" name="status_operasi"></p>
    <p>Kondisi Fisik: <input type="text" name="kondisi_fisik"></p>
    <p>Posisi Arde: <input type="text" name="posisi_arde"></p>
    <p>Arah Fasa: <input type="text" name="arah_fasa"></p>
    <p>Keterangan: <textarea name="keterangan"></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>