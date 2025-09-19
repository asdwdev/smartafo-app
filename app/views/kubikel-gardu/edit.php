<?php startBlock('content') ?>
<h3>Edit Kubikel Gardu</h3>

<form method="POST" action="/kubikel-gardu/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>
        GD ID:
        <select name="gd_id" required>
            <option value="">-- Pilih Gardu Distribusi --</option>
            <?php foreach ($garduDistribusi as $gd): ?>
                <option value="<?= $gd['gd_id'] ?>"
                    <?= (($_POST['gd_id'] ?? $kubikelGardu['gd_id']) == $gd['gd_id']) ? 'selected' : '' ?>>
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
                    <?= (($_POST['kubikel_id'] ?? $kubikelGardu['kubikel_id']) == $k['kubikel_id']) ? 'selected' : '' ?>>
                    <?= $k['kubikel_id'] ?> - <?= htmlspecialchars($k['no_seri'] ?? '') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>Tgl Pasang: <input type="date" name="tgl_pasang" value="<?= htmlspecialchars($_POST['tgl_pasang'] ?? $kubikelGardu['tgl_pasang']) ?>"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi" value="<?= htmlspecialchars($_POST['tgl_operasi'] ?? $kubikelGardu['tgl_operasi']) ?>"></p>
    <p>Status RC: <input type="text" name="status_rc" value="<?= htmlspecialchars($_POST['status_rc'] ?? $kubikelGardu['status_rc']) ?>"></p>
    <p>Arah Gardu: <input type="text" name="arah_gardu" value="<?= htmlspecialchars($_POST['arah_gardu'] ?? $kubikelGardu['arah_gardu']) ?>"></p>
    <p>CT Info: <input type="text" name="ct_info" value="<?= htmlspecialchars($_POST['ct_info'] ?? $kubikelGardu['ct_info']) ?>"></p>
    <p>VT Info: <input type="text" name="vt_info" value="<?= htmlspecialchars($_POST['vt_info'] ?? $kubikelGardu['vt_info']) ?>"></p>
    <p>Relay Info: <input type="text" name="relay_info" value="<?= htmlspecialchars($_POST['relay_info'] ?? $kubikelGardu['relay_info']) ?>"></p>
    <p>Fuse Info: <input type="text" name="fuse_info" value="<?= htmlspecialchars($_POST['fuse_info'] ?? $kubikelGardu['fuse_info']) ?>"></p>
    <p>Keterangan: <textarea name="keterangan"><?= htmlspecialchars($_POST['keterangan'] ?? $kubikelGardu['keterangan']) ?></textarea></p>
    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>