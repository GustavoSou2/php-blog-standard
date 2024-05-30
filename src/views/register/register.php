<main id="register">
    <form class="form--container" action="/register" method="POST">
        <section class="form--presentation">
            <h5>Criar conta</h5>
            <span class="form--presentation-title">Seja bem-vindo👋</span>
            <span class="form--presentation-description">Cadastre-se e fique por dentro das novidades</span>
        </section>
        <section class="form--fields">
            <input class="form--field" type="text" id="username" name="username" placeholder="Nome de Usuário" required>
            <input class="form--field" type="email" id="mail" name="mail" placeholder="Email" required>
            <input class="form--field" type="password" id="password" name="password" placeholder="Senha" required>
        </section>
        <button type="submit">Criar conta</button>
        <span class="form--link">Já possui uma conta? 💡 <a href="/login">Clique aqui</a></span>

    </form>

    <link rel="stylesheet" href="css/register.css">
</main>