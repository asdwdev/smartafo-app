<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Master Jaringan Distribusi' ?></title>
</head>

<body>

    <h2>Administrator - Master Jaringan Distribusi</h2>
    <p>Welcome TAJIRSSA WILAYA | <a href="/logout">LOGOUT</a></p>

    <table border="1" width="100%">
        <tr>
            <!-- Sidebar -->
            <td width="20%" valign="top">
                <h3>HOME</h3>

                <h3>MASTER DATA</h3>
                <ul>
                    <li><a href="/gardu-induk">Gardu Induk</a></li>
                    <li><a href="/penyulang">Penyulang</a></li>
                    <li><a href="/gardu-hubung">Gardu Hubung</a></li>
                    <li><a href="/gardu-distribusi">Gardu Distribusi</a></li>
                    <li><a href="#">Trafo Gardu Induk</a></li>
                    <li><a href="#">Trafo Gardu Distribusi</a></li>
                    <li><a href="#">Jaringan</a></li>
                    <li><a href="#">Turbin</a></li>
                    <li><a href="#">Kubikel</a></li>
                </ul>

                <h3>REKAP DATA</h3>
                <ul>
                    <li><a href="#">Jml Penyulang per GI</a></li>
                    <li><a href="#">Jml Gardu per Penyulang</a></li>
                    <li><a href="#">Jml Gardu per Area</a></li>
                    <li><a href="#">Jml Trafo per Area</a></li>
                    <li><a href="#">Jml Gardu per Area</a></li>
                    <li><a href="#">Jml Trafo Terpasang per Area</a></li>
                    <li><a href="#">Jml Jaringan per Area</a></li>
                    <li><a href="#">Jml Kubikel Gardu Distribusi per Area</a></li>
                    <li><a href="#">User</a></li>
                </ul>
            </td>

            <!-- Konten Utama -->
            <td width="80%" valign="top">
                <?= $content ?? '' ?>
            </td>
        </tr>
    </table>

</body>

</html>