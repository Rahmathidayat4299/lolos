<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="process_register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="role">Role:</label>
        <select name="role">
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
        </select><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
