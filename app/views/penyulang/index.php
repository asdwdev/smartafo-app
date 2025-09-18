<?php startBlock('content') ?>
<h3>MASTER PENYULANG</h3>

<p><a href="/penyulang/create">+ Tambah Penyulang</a></p>

<table border="1" width="100%">
    <tr>
        <th>KODE PENYULANG</th>
        <th>NAMA PENYULANG</th>
        <th>TEGANGAN (kV)</th>
        <th>GARDU INDUK</th>
        <th>AKSI</th>
    </tr>

    <?php if (!empty($penyulangs)): ?>
        <?php foreach ($penyulangs as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['kode_penyulang']) ?></td>
                <td><?= htmlspecialchars($p['nama_penyulang']) ?></td>
                <td><?= htmlspecialchars($p['tegangan']) ?></td>
                <td><?= htmlspecialchars($p['gi_id']) ?></td>
                <td>
                    <a href="/penyulang/<?= $p['penyulang_id'] ?>">Detail</a> |
                    <a href="/penyulang/<?= $p['penyulang_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/penyulang/<?= $p['penyulang_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Belum ada penyulang.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>