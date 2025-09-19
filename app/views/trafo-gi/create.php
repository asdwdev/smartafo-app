<?php startBlock('content') ?>
<h3>Tambah Trafo GI</h3>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color: red; margin-bottom: 10px;">
        <?= htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form method="POST" action="/trafo-gi">
    <p>
        <label>Gardu Induk:</label>
        <select name="gi_id" required>
            <option value="">-- Pilih GI --</option>
            <?php foreach ($garduInduks as $gi): ?>
                <option value="<?= $gi['gi_id'] ?>"><?= htmlspecialchars($gi['nama_gi']) ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Trafo:</label>
        <select name="trafo_id" required>
            <option value="">-- Pilih Trafo --</option>
            <?php foreach ($trafos as $t): ?>
                <option value="<?= $t['trafo_id'] ?>"><?= htmlspecialchars($t['no_seri']) ?></option>
            <?php endforeach; ?>
        </select>
    </p>

    <p><label>Tgl Pasang:</label> <input type="date" name="tgl_pasang"></p>
    <p><label>Tgl Operasi:</label> <input type="date" name="tgl_operasi"></p>
    <p><label>Status Operasi:</label> <input type="text" name="status_operasi"></p>
    <p><label>Kondisi Fisik:</label> <input type="text" name="kondisi_fisik"></p>
    <p><label>Posisi Arde:</label> <input type="text" name="posisi_arde"></p>
    <p><label>Arah Fasa:</label> <input type="text" name="arah_fasa"></p>
    <p><label>Keterangan:</label> <textarea name="keterangan"></textarea></p>

    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>