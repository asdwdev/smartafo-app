<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
</head>

<body>
    <h1>Daftar User</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['id']; ?> - <?= $user['name']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>