<?php require_once('template/head.php') ?>

<body>
    <div class="login">

        <img src="<?= URL_BASE ?>assets/img/logo.png" alt="Adega Ariel" class="logo">

        <div class="input-box">
            <i class='bx bx-envelope-open'></i>
            <input type="email" placeholder="E-mail">
        </div>

        <div class="input-box">
            <i class='bx bx-lock'></i>
            <input type="password" placeholder="Senha">
        </div>

        <button class="btn">Entrar</button>

        <div class="links">
            <a href="<?= URL_BASE ?>cadastrar">Criar conta</a>
            <a href="#">Esqueci minha senha</a>
        </div>

        <div class="bars">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
</body>