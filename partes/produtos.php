<main>
    <div class="container">
        <div class="container_image">
            <button data-left class="btn left"><i class="bi bi-chevron-left"></i></button>
            <div class="container__radios">
                <input data-radio1 class="rad" type="radio" name="radio" id="imagem1" checked>
                <input data-radio2 class="rad" type="radio" name="radio" id="imagem2">
                <input data-radio3 class="rad" type="radio" name="radio" id="imagem3">
            </div>
        
            <img data-img class="carroussel__img" src="../assets/images/nike.png" alt="nike-carrossel" />
            <img data-img class="carroussel__img" src="../assets/images/adiddas.png" alt="addidas-carrossel" />
            <img data-img class="carroussel__img" src="../assets/images/puma.png" alt="puma-carrossel" />    
        
            <div class="navegacao">
                <label data-label1 class="barra on" for="imagem1"></label>
                <label data-label2 class="barra" for="imagem2"></label>
                <label data-label3 class="barra" for="imagem3"></label>
            </div>
            <button data-right class="btn right"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
    <div class='fundo'>
        <div class='card__grid'>

        <?php for($i = 0; $i < 21; $i++)
        {
            echo "<div class='card'>";
            echo "<a class='link__produtos' href='Untitled-5.php'>";
                echo "<img class='card__img'  src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTP7w8hN5dIcThOy4OT6KrZ_lr4gnrGd6I_HQ&usqp=CAU' alt='produto'>";
                echo "<a data-link class='icon__fav'><i class='bi bi-heart'></i></a>";
                echo "<a class='link__produtos' href='Untitled-5.php'>";
                    echo "<div class='card__body'>";
                        echo "<p class='card__titulo'>Tênis Nike Air Max Excee Masculino</p>";
                        echo "<div class='itens'>";
                            echo "<P class='card__preço_antigo'>R$ 399,99</P>";
                            echo "<p class='card_preço'>R$ 299,99</p>";
                        echo "</div>";
                        echo "<p class='promoção'>ou 3x de R$ 99,99</p>";
                        echo "<a class='icon__cart' href='Untitled-5.php'><i class='bi bi-cart2'></i></a>";
                    echo "</div>";
                echo "</a>";
            echo "</div>";
        }?>

        </div>
    </div>
</main>
