<?php startBlock('content') ?>
<h3>EDIT USER ACCOUNT</h3>

<form method="POST" action="/user-account/<?php echo $id; ?>">
    <input type="hidden" name="_method" value="PUT">

    <label>NIP: <input type="text" name="nip" value="123456"></label><br><br>
    <label>Nama Lengkap: <input type="text" name="full_name" value="Budi Santoso"></label><br><br>
    <label>Email PLN: <input type="email" name="email_pln" value="budi@pln.co.id"></label><br><br>
    <label>Area: <input type="text" name="area" value="Jakarta"></label><br><br>
    <label>Level User:
        <select name="level_user">
            <option value="Admin" selected>Admin</option>
            <option value="Manager">Manager</option>
            <option value="Staff">Staff</option>
        </select>
    </label><br><br>
    <label>Status Approval:
        <select name="is_approved">
            <option value="FALSE">Belum Approved</option>
            <option value="TRUE" selected>Approved</option>
        </select>
    </label><br><br>

    <button type="button" onclick="window.history.back()">Back</button>
    <button type="submit">Update</button>
</form>
<?php endBlock() ?>

<?php extend('layouts/app') ?>