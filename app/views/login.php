<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Poli_Cine</h1>
    <form action="/customer/enterLogin" method="POST">
        <span style="color: red; font-size: 1.5rem"><?= isset($errors['login']) ? 'Email no existente o contraseña incorrecta' : '' ?></span>
        <br>
        <br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= $data['email'] ?? ''?>" required>
        <span style="color: red"><?= isset($errors['email']) ? 'Error en el email' : ''?></span>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <span style="color: red"><?= isset($errors['password']) ? 'Error en la Contraseña' : ''?></span>
        <br>
        <input type="submit" name="login" id="login-btn" value="Iniciar Sesión">
    </form>
</body>
</html>