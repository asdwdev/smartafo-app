<?php startBlock('content') ?>
<h3>MASTER KUBIKEL TEKNIS</h3>

<p><a href="/kubikel-teknis/create">+ Tambah Kubikel Teknis</a></p>

<table border="1" width="100%">
    <tr>
        <th>No Seri</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Fungsi</th>
        <th>Tegangan (kV)</th>
        <th>Kapasitas (A)</th>
        <th>Aksi</th>
    </tr>
    <tr>
        <td>KUB001</td>
        <td>ABB</td>
        <td>Load Break Switch</td>
        <td>Proteksi</td>
        <td>20.000</td>
        <td>630</td>
        <td>
            <a href="/kubikel-teknis/1">Detail</a> |
            <a href="/kubikel-teknis/1/edit">Edit</a> |
            <form method="POST" action="/kubikel-teknis/1" style="display:inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>