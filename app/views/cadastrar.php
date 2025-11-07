<?php require_once('template/head.php') ?>

<body>
    <div class="cadastrar">

        <img src="<?= URL_BASE ?>assets/img/logo.png" alt="Adega Ariel" class="logo">

        <h2 class="title">Criar Conta</h2>

        <div class="input-box">
            <i class="icon">👤</i>
            <input type="text" placeholder="Nome completo" name="nome">
        </div>

        <div class="input-box">
            <i class="icon">📧</i>
            <input type="email" placeholder="E-mail" name="email">
        </div>

        <div class="input-box">
            <i class="icon">🆔</i>
            <input type="text" placeholder="CPF (apenas números)" name="cpf" maxlength="14" inputmode="numeric" pattern="\d*">
        </div>

        <div class="input-box">
            <i class="icon">🔒</i>
            <input type="password" placeholder="Senha" name="senha">
        </div>

        <button class="btn">Cadastrar</button>

        <div class="links">
            <a href="<?= URL_BASE ?>login.php">Já tenho conta</a>
        </div>

        <div class="footer-bars">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
</body>
