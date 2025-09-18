<?php startBlock('content') ?>
<h3>EDIT USER ACCOUNT</h3>

<form method="POST" action="/user-account/<?= $user['user_id'] ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>NIP:
        <input type="text" name="nip" value="<?= htmlspecialchars($user['nip']) ?>">
    </label><br><br>

    <label>Nama Lengkap:
        <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>">
    </label><br><br>

    <label>Email PLN:
        <input type="email" name="email_pln" value="<?= htmlspecialchars($user['email_pln']) ?>">
    </label><br><br>

    <label>Area:
        <input type="text" name="area" value="<?= htmlspecialchars($user['area']) ?>">
    </label><br><br>

    <label>Level User:
        <select name="level_user">
            <option value="Admin" <?= $user['level_user'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
            <option value="Supervisor" <?= $user['level_user'] == 'Supervisor' ? 'selected' : '' ?>>Supervisor</option>
            <option value="Staff" <?= $user['level_user'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
        </select>
    </label><br><br>

    <label>Status:
        <select name="is_approved">
            <option value="TRUE" <?= $user['is_approved'] == 'TRUE' ? 'selected' : '' ?>>Approved</option>
            <option value="FALSE" <?= $user['is_approved'] == 'FALSE' ? 'selected' : '' ?>>Not Approved</option>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>