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
    <tr>
        <td>PNY001</td>
        <td>ABAD</td>
        <td>20.000</td>
        <td>Duri Kosambi</td>
        <td>
            <a href="/penyulang/1">Detail</a> |
            <a href="/penyulang/1/edit">Edit</a> |
            <form method="POST" action="/penyulang/1" style="display:inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>