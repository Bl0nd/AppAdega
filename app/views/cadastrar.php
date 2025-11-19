<?php require_once('template/head.php') ?>

<body>
    <div class="cadastrar">

        <img src="<?= URL_BASE ?>assets/img/logo.png" alt="Adega Ariel" class="logo">

        <h2 class="title">Criar Conta</h2>

        <form action="<?= URL_BASE ?>cadastrar/salvar" method="POST">
            <div class="input-box">
                <i class='bx bx-user'></i>
                <input type="text" placeholder="Nome completo" name="nome" required>
            </div>

            <div class="input-box">
                <i class='bx bx-envelope'></i>
                <input type="email" placeholder="E-mail" name="email" required>
            </div>
            
            <div class="input-box">
                <i class='bx bx-phone'></i>
                <input type="tel" placeholder="Telefone" name="telefone" id="telefone" maxlength="15" required>
            </div>

            <div class="input-box">
                <i class='bx bx-id-card'></i>
                <input type="text" placeholder="CPF (apenas números)" name="cpf" maxlength="14" id="cpf" required>
            </div>

            <div class="input-box">
                <i class='bx bx-calendar'></i>
                <input type="date" placeholder="Data de Nascimento" name="data_nascimento" required>
            </div>

            <div class="input-box">
                <i class='bx bx-home-alt-2'></i>
                <input type="text" placeholder="Endereço" name="endereco" required>
            </div>

            <div class="input-box">
                <i class='bx bx-lock'></i>
                <input type="password" placeholder="Senha" name="senha" required>
            </div>

            <button class="btn" type="submit">Cadastrar</button>
        </form>

        <div class="links">
            <a href="index.php?url=login">Já tenho conta</a>
        </div>

        <div class="bars">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
    <script src="assets/js/script.js"></script>
</body>