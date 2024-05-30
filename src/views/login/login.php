<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body id="login">
    <form class="form--container" action="/login" method="POST">
        <section class="form--presentation">
            <h5>Login</h5>
            <span class="form--presentation-title">Bem-vindo de volta 👋</span>
            <span class="form--presentation-description">Fique por dentro das novidades</span>
        </section>
        <section class="form--fields">
            <input class="form--field" type="email" id="mail" name="mail" placeholder="Email" required>
            <input class="form--field" type="password" id="password" name="password" placeholder="Senha" required>
            <label for="keep_me_logged">
                <input class="form--field" type="checkbox" id="keep_me_logged" name="keep_me_logged">
                Manter-me conectado
            </label>
        </section>

        <button type="submit">Login</button>

        <span class="form--link">Não possui uma conta? 🤔 <a href="/register">Clique aqui</a></span>
    </form>

    <link rel="stylesheet" href="css/login.css">
</body>

</html>