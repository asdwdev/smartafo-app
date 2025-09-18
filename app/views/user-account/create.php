<?php startBlock('content') ?>
<h3>TAMBAH USER ACCOUNT</h3>

<form method="POST" action="/user-account">
    <label>NIP: <input type="text" name="nip"></label><br><br>
    <label>Nama Lengkap: <input type="text" name="full_name"></label><br><br>
    <label>Email PLN: <input type="email" name="email_pln"></label><br><br>
    <label>Area: <input type="text" name="area"></label><br><br>
    <label>Level User:
        <select name="level_user">
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="Staff">Staff</option>
        </select>
    </label><br><br>
    <label>Password: <input type="password" name="password"></label><br><br>
    <label>Status Approval:
        <select name="is_approved">
            <option value="FALSE">Belum Approved</option>
            <option value="TRUE">Approved</option>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Submit</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>