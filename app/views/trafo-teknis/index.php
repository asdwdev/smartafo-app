<?php startBlock('content') ?>
<h3>MASTER TRAFO TEKNIS</h3>

<p><a href="/trafo-teknis/create">+ Tambah Trafo Teknis</a></p>

<table border="1" width="100%">
    <tr>
        <th>No Seri</th>
        <th>Merk</th>
        <th>Kapasitas (kVA)</th>
        <th>Tegangan Primer (kV)</th>
        <th>Tegangan Sekunder (V)</th>
        <th>Pemilik</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($trafos)): ?>
        <?php foreach ($trafos as $trafo): ?>
            <tr>
                <td><?= $trafo['no_seri'] ?></td>
                <td><?= $trafo['merk'] ?></td>
                <td><?= $trafo['kapasitas_kva'] ?></td>
                <td><?= $trafo['tegangan_primer_kv'] ?></td>
                <td><?= $trafo['tegangan_sekunder_v'] ?></td>
                <td><?= $trafo['pemilik'] ?></td>
                <td>
                    <a href="/trafo-teknis/<?= $trafo['trafo_teknis_id'] ?>/edit">Edit</a> |
                    <form method="POST" action="/trafo-teknis/<?= $trafo['trafo_teknis_id'] ?>" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Belum ada trafo teknis.</td>
        </tr>
    <?php endif ?>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>