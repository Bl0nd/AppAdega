<?php require_once('template/head.php') ?>

<body>
    <div class="menu">

        <div class="banner">
            Promoção especial: 10% de desconto nos vinhos tintos!
        </div>

        <section class="categories">
            <?php
            foreach ($produtos as $produto) : ?>
                <div class="category-card">
                    <img src="<?= FOTO_BASE . 'produtos/' . $produto['foto_produto'] ?>" alt="<?= $produto['nome_produto'] ?>">
                    <span><?= $produto['nome_produto'] ?></span>
                </div>
            <?php endforeach; ?>
        </section>

        <nav class="bottom-nav">
            <button class="active"><i class="fa-solid fa-house"></i><span>Home</span></button>
            <button><i class="fa-solid fa-wine-glass"></i><span>Categorias</span></button>
            <button><i class="fa-solid fa-cart-shopping"></i><span>Carrinho</span></button>
            <button><i class="fa-regular fa-user"></i><span>Perfil</span></button>
        </nav>
    </div>

    <?php require_once('template/footer.php') ?>
</body>

</html>