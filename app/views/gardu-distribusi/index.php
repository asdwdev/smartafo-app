<?php startBlock('content') ?>
<h3>MASTER GARDU DISTRIBUSI</h3>

<p><a href="/gardu-distribusi/create">+ Tambah Gardu Distribusi</a></p>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>KODE GARDU</th>
            <th>NAMA GARDU</th>
            <th>ALAMAT</th>
            <th>KETERANGAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($gardus)): ?>
            <?php foreach ($gardus as $gardu): ?>
                <tr>
                    <td><?= $gardu['kode_gardu'] ?></td>
                    <td><?= $gardu['nama_gardu'] ?></td>
                    <td><?= $gardu['alamat'] ?></td>
                    <td><?= $gardu['keterangan'] ?></td>
                    <td>
                        <a href="/gardu-distribusi/<?= $gardu['gd_id'] ?>/edit">Edit</a> |
                        <form method="POST" action="/gardu-distribusi/<?= $gardu['gd_id'] ?>" style="display:inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Belum ada gardu distribusi.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>