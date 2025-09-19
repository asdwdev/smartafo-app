<?php startBlock('content') ?>
<h3>Tambah Kubikel Gardu</h3>

<?php if (!empty($errors)): ?>
    <div style="color:red; margin-bottom:10px;">
        <ul>
            <?php foreach ($errors as $fieldErrors): ?>
                <?php foreach ($fieldErrors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/kubikel-gardu">
    <p>
        GD ID:
        <select name="gd_id" required>
            <option value="">-- Pilih Gardu Distribusi --</option>
            <?php foreach ($garduDistribusi as $gd): ?>
                <option value="<?= $gd['gd_id'] ?>"
                    <?= (($_POST['gd_id'] ?? '') == $gd['gd_id']) ? 'selected' : '' ?>>
                    <?= $gd['gd_id'] ?> - <?= htmlspecialchars($gd['nama_gardu'] ?? '') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        Kubikel ID:
        <select name="kubikel_id" required>
            <option value="">-- Pilih Kubikel --</option>
            <?php foreach ($kubikels as $k): ?>
                <option value="<?= $k['kubikel_id'] ?>"
                    <?= (($_POST['kubikel_id'] ?? '') == $k['kubikel_id']) ? 'selected' : '' ?>>
                    <?= $k['kubikel_id'] ?> - <?= htmlspecialchars($k['no_seri'] ?? '') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Tgl Pasang: <input type="date" name="tgl_pasang" value="<?= htmlspecialchars($_POST['tgl_pasang'] ?? '') ?>"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi" value="<?= htmlspecialchars($_POST['tgl_operasi'] ?? '') ?>"></p>
    <p>Status RC: <input type="text" name="status_rc" value="<?= htmlspecialchars($_POST['status_rc'] ?? '') ?>"></p>
    <p>Arah Gardu: <input type="text" name="arah_gardu" value="<?= htmlspecialchars($_POST['arah_gardu'] ?? '') ?>"></p>
    <p>CT Info: <input type="text" name="ct_info" value="<?= htmlspecialchars($_POST['ct_info'] ?? '') ?>"></p>
    <p>VT Info: <input type="text" name="vt_info" value="<?= htmlspecialchars($_POST['vt_info'] ?? '') ?>"></p>
    <p>Relay Info: <input type="text" name="relay_info" value="<?= htmlspecialchars($_POST['relay_info'] ?? '') ?>"></p>
    <p>Fuse Info: <input type="text" name="fuse_info" value="<?= htmlspecialchars($_POST['fuse_info'] ?? '') ?>"></p>
    <p>Keterangan: <textarea name="keterangan"><?= htmlspecialchars($_POST['keterangan'] ?? '') ?></textarea></p>
    <p><button type="submit">Simpan</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>