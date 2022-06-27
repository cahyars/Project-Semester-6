<!DOCTYPE html>
<html>

<head>
    <title>Login SIPERA</title>
</head>

<body>
    <h1>Login Form</h1>
    <form action="<?= base_url('index.php/login/proses_login') ?>" method="POST">
        <input type="text" name="username" id="username" placeholder="Username">
        <br>
        <input type="password" name="password" id="username" placeholder="Password">
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>