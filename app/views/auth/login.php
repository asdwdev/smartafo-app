<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Master Jardist</title>
</head>

<body>

    <h1>LOGIN MASTER JARDIST</h1>
    <p>Gunakan Email PLN dan Password</p>

    <form method="POST" action="/login">
        <label>
            Email PLN:
            <input type="email" name="email_pln" required>
        </label>
        <br><br>
        <label>
            Password:
            <input type="password" name="password" required>
        </label>
        <br><br>
        <button type="submit">Login</button>
        <a href="/signup"><button type="button">Sign Up</button></a>
    </form>

</body>

</html>