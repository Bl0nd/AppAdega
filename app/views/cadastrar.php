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
                <i class='bx bx-id-card'></i>
                <input type="text" placeholder="CPF (apenas números)" name="cpf" maxlength="14" id="cpf" required>
            </div>

            <div class="input-box">
                <i class='bx bx-lock'></i>
                <input type="password" placeholder="Senha" name="senha" required>
            </div>

            <button class="btn" type="submit">Cadastrar</button>
        </form>

        <div class="links">
            <a href="<?= URL_BASE ?>login">Já tenho conta</a>
        </div>

        <div class="bars">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>

    <script>
        // Máscara de CPF
        const cpfInput = document.getElementById('cpf');

        cpfInput.addEventListener('input', function(e) {
            let value = cpfInput.value.replace(/\D/g, ''); // Remove tudo que não é número
            if (value.length > 3) value = value.replace(/^(\d{3})(\d)/, '$1.$2');
            if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
            cpfInput.value = value;
        });
    </script>
</body>