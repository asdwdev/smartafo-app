<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
</head>

<body>

    <h1>ADD USER</h1>
    <form method="POST" action="/signup">
        <label>NIP:
            <input type="text" name="nip" required>
        </label><br><br>

        <label>Nama:
            <input type="text" name="full_name" required>
        </label><br><br>

        <label>Email PLN:
            <input type="email" name="email_pln" required>
        </label><br><br>

        <label>Area:
            <input type="text" name="area" required>
        </label><br><br>

        <label>Level User:
            <select name="level_user" required>
                <option value="ADMIN AREA">ADMIN AREA</option>
                <option value="PETUGAS">PETUGAS</option>
                <option value="VIEWER">VIEWER</option>
            </select>
        </label><br><br>

        <label>Password:
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Submit</button>
    </form>


</body>

</html>