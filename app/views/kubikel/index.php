<?php startBlock('content') ?>
<h3>MASTER KUBIKEL</h3>

<?php if (!empty($_SESSION['error'])): ?>
    <div style="color:red; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<p><a href="/kubikel/create">+ Tambah Kubikel</a></p>

<table border="1" width="100%">
    <tr>
        <th>No Seri</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Fungsi</th>
        <th>Tegangan (kV)</th>
        <th>Kapasitas (A)</th>
        <th>Impedansi (%)</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($kubikels)): ?>
        <?php foreach ($kubikels as $k): ?>
            <tr>
                <td><?= htmlspecialchars($k['no_seri'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['merk'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['jenis'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['fungsi'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['tegangan_kv'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['kapasitas_a'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['impedansi_persen'] ?? '') ?></td>
                <td><?= htmlspecialchars($k['catatan'] ?? '') ?></td>
                <td>
                    <a href="/kubikel/<?= $k['kubikel_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/kubikel/<?= $k['kubikel_id'] ?>" style="display:inline" onsubmit="return confirm('Yakin hapus data?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9">Belum ada data kubikel.</td>
        </tr>
    <?php endif; ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>