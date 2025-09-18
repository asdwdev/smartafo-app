<?php startBlock('content') ?>
<h3>Edit Jurusan</h3>

<form method="POST" action="/jurusan/<?= $id ?>">
    <input type="hidden" name="_method" value="PUT">

    <p>GD ID: <input type="number" name="gd_id" value="<?= htmlspecialchars($jurusan['gd_id']) ?>" required></p>
    <p>Trafo Gardu ID: <input type="number" name="trafo_gardu_id" value="<?= htmlspecialchars($jurusan['trafo_gardu_id']) ?>"></p>
    <p>Nama Jurusan: <input type="text" name="nama_jurusan" value="<?= htmlspecialchars($jurusan['nama_jurusan']) ?>" required></p>
    <p>Keterangan: <textarea name="keterangan"><?= htmlspecialchars($jurusan['keterangan']) ?></textarea></p>
    <p><button type="submit">Update</button></p>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>