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
    <tr>
        <td>GI001</td>
        <td>Duri Kosambi</td>
        <td>Jakarta Barat</td>
        <td>Jl. Daan Mogot</td>
        <td>-6.1234567</td>
        <td>106.7654321</td>
        <td>
            <a href="/gardu-induk/1">Detail</a> |
            <a href="/gardu-induk/1/edit">Edit</a> |
            <form method="POST" action="/gardu-induk/1" style="display:inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>