<?php require_once('template/head.php') ?>

<body>
    <div class="login">

        <img src="<?= URL_BASE ?>assets/img/logo.png" alt="Adega Ariel" class="logo">

        <form action="<?= URL_BASE ?>login/logar" method="POST">
            <div class="input-box">
                <i class='bx bx-envelope'></i>
                <input type="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="input-box">
                <i class='bx bx-lock'></i>
                <input type="password" name="senha" placeholder="Senha" required>
            </div>

            <button class="btn" type="submit">Entrar</button>
        </form>

        <div class="links">
            <a href="index.php?url=cadastrar">Criar conta</a>
            <a href="#">Esqueci minha senha</a>
        </div>

        <div class="bars">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
</body>