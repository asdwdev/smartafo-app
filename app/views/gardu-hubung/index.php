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
    <tr>
        <td>GH001</td>
        <td>Gardu Hubung A</td>
        <td>Jl. Raya Cengkareng</td>
        <td>-6.1234567</td>
        <td>106.7654321</td>
        <td>
            <a href="/gardu-hubung/1">Detail</a> |
            <a href="/gardu-hubung/1/edit">Edit</a> |
            <form method="POST" action="/gardu-hubung/1" style="display:inline">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
</table>
<?php endBlock() ?>

<?php extend('layouts/app') ?>