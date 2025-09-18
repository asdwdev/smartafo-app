<?php startBlock('content') ?>
<h3>MASTER PENYULANG</h3>

<p><a href="/penyulang/create">+ Tambah Penyulang</a></p>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red; font-weight:bold; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

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
                <td><?= htmlspecialchars($p['kode_penyulang'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($p['nama_penyulang'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($p['tegangan_kv'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($p['gi_id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/penyulang/<?= $p['penyulang_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/penyulang/<?= $p['penyulang_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
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