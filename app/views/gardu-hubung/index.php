<?php startBlock('content') ?>
<h3>MASTER GARDU HUBUNG</h3>

<p><a href="/gardu-hubung/create">+ Tambah Gardu Hubung</a></p>

<table border="1" width="100%">
    <tr>
        <th>KODE GH</th>
        <th>NAMA GH</th>
        <th>ALAMAT</th>
        <th>LAT</th>
        <th>LON</th>
        <th>AKSI</th>
    </tr>
    <?php if (!empty($garduHubungs)): ?>
        <?php foreach ($garduHubungs as $gh): ?>
            <tr>
                <td><?= $gh['kode_gh'] ?></td>
                <td><?= $gh['nama_gh'] ?></td>
                <td><?= $gh['alamat'] ?></td>
                <td><?= $gh['lat'] ?></td>
                <td><?= $gh['lon'] ?></td>
                <td>
                    <a href="/gardu-hubung/<?= $gh['gh_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/gardu-hubung/<?= $gh['gh_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada gardu hubung.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>