<?php 

    /*===== VERIFICA A EXISTENCIA DA SESSION =====*/
    $nome = 'Entrar';
    $link = 'Untitled-4.php';
    $icon = 'bi bi-box-arrow-in-right';
    if (isset($_SESSION['id_usuario'])) {
        $nome = 'Perfil';
        $link = 'Untitled-7.php';
        $icon = 'bi bi-person';
    }
?>
<header>
    <div class="Items">
        <div class="Logo">
            <p><i class="fas fa-cannabis"></i></p>
        </div>
        
        <div class="Menu">
            <form class="Pesquisar">
                <button class="Pesquisar__Btn" type="submit"><i class="bi bi-search"></i></button>
                <input class="Pesquisar_Input" type="search" placeholder="Pesquisar" />
            </form>
        </div>
    </div>
    <div class="Menu__Links">
        <ul>
            <li class="Menu__Li"><a class="Menu__Produtos" href="Index.php"><i class="bi bi-bag"></i><span class="Menu__Titulos">Produtos</span></a></li>
            <li class="Menu__Li"><a class="Menu__Produtos" href="Untitled-1.php"><i class="bi bi-list"></i><span class="Menu__Titulos">Categorias</span></a></li>
            <li class="Menu__Li"><a class="Menu__Produtos" href="Untitled-2.php"><i class="bi bi-heart"></i><span class="Menu__Titulos">Favoritos</span></a></li>
            <li class="Menu__Li"><a class="Menu__Produtos" href="Untitled-3.php"><i class="bi bi-cart"></i><span class="Menu__Titulos">Carrinho</span></a></li>
            <li class="Menu__Li"><a class="Menu__Produtos" href="<?php echo $link?>"><i class="<?php echo $icon?>"></i><span class="Menu__Titulos"><?php echo $nome?></span></a></li>
            <li class="Menu__Li"><a class="Menu__Opções" href="#"><i class="bi bi-three-dots-vertical"></i></a></li>
        </ul>
    </div>
</header>
<script src="../assets/js/produto/navbar.js" defer></script>