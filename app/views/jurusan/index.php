<?php startBlock('content') ?>
<h3>MASTER JURUSAN</h3>

<p><a href="/jurusan/create">+ Tambah Jurusan</a></p>

<table border="1" width="100%">
    <tr>
        <th>GD ID</th>
        <th>Trafo Gardu ID</th>
        <th>Nama Jurusan</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($jurusans)): ?>
        <?php foreach ($jurusans as $j): ?>
            <tr>
                <td><?= htmlspecialchars($j['gd_id']) ?></td>
                <td><?= htmlspecialchars($j['trafo_gardu_id']) ?></td>
                <td><?= htmlspecialchars($j['nama_jurusan']) ?></td>
                <td><?= htmlspecialchars($j['keterangan']) ?></td>
                <td>
                    <a href="/jurusan/<?= $j['jurusan_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/jurusan/<?= $j['jurusan_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Belum ada jurusan.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>