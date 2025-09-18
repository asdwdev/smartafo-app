<?php startBlock('content') ?>
<h3>Edit Kubikel Gardu</h3>

<form method="POST" action="/kubikel-gardu/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>GD ID: <input type="number" name="gd_id" value="<?= htmlspecialchars($kubikelGardu['gd_id']) ?>" required></p>
    <p>Kubikel ID: <input type="number" name="kubikel_id" value="<?= htmlspecialchars($kubikelGardu['kubikel_id']) ?>" required></p>
    <p>Tgl Pasang: <input type="date" name="tgl_pasang" value="<?= htmlspecialchars($kubikelGardu['tgl_pasang']) ?>"></p>
    <p>Tgl Operasi: <input type="date" name="tgl_operasi" value="<?= htmlspecialchars($kubikelGardu['tgl_operasi']) ?>"></p>
    <p>Status RC: <input type="text" name="status_rc" value="<?= htmlspecialchars($kubikelGardu['status_rc']) ?>"></p>
    <p>Arah Gardu: <input type="text" name="arah_gardu" value="<?= htmlspecialchars($kubikelGardu['arah_gardu']) ?>"></p>
    <p>CT Info: <input type="text" name="ct_info" value="<?= htmlspecialchars($kubikelGardu['ct_info']) ?>"></p>
    <p>VT Info: <input type="text" name="vt_info" value="<?= htmlspecialchars($kubikelGardu['vt_info']) ?>"></p>
    <p>Relay Info: <input type="text" name="relay_info" value="<?= htmlspecialchars($kubikelGardu['relay_info']) ?>"></p>
    <p>Fuse Info: <input type="text" name="fuse_info" value="<?= htmlspecialchars($kubikelGardu['fuse_info']) ?>"></p>
    <p>Keterangan: <textarea name="keterangan"><?= htmlspecialchars($kubikelGardu['keterangan']) ?></textarea></p>
    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>