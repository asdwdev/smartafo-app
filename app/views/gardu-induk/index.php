<?php startBlock('content') ?>
<h3>MASTER GARDU INDUK</h3>

<p><a href="/gardu-induk/create">+ Tambah Gardu Induk</a></p>

<table border="1" width="100%">
    <tr>
        <th>KODE GI</th>
        <th>NAMA GI</th>
        <th>AREA</th>
        <th>ALAMAT</th>
        <th>LAT</th>
        <th>LON</th>
        <th>AKSI</th>
    </tr>

    <?php if (!empty($garduInduks)): ?>
        <?php foreach ($garduInduks as $gi): ?>
            <tr>
                <td><?= htmlspecialchars($gi['kode_gi']) ?></td>
                <td><?= htmlspecialchars($gi['nama_gi']) ?></td>
                <td><?= htmlspecialchars($gi['area']) ?></td>
                <td><?= htmlspecialchars($gi['alamat']) ?></td>
                <td><?= htmlspecialchars($gi['lat']) ?></td>
                <td><?= htmlspecialchars($gi['lon']) ?></td>
                <td>
                    <a href="/gardu-induk/<?= $gi['gi_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/gardu-induk/<?= $gi['gi_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Belum ada gardu induk.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>