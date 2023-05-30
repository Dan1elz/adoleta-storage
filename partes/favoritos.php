<main>
    <div class="fundo">
        <div class=".">
            <div class="card__grid">

            <?php for($i = 0; $i < 5; $i++) {

                echo "<div class='card__favitos'>";
                    echo "<img class='favitos__img'  src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTP7w8hN5dIcThOy4OT6KrZ_lr4gnrGd6I_HQ&usqp=CAU' alt='produto'>";
                    echo "<a class='icon__close' href='#'><i class='bi bi-x-circle'></i></a>";
                        echo "<div class='favitos__body'>";
                            echo "<p class='favitos__titulo'>Tênis Nike Air Max Excee Masculino</p>";
                            echo "<div class='itens'>";
                                echo "<P class='favitos__preço_antigo'>R$ 399,99</P>";
                                echo "<p class='favitos_preço'>R$ 299,99</p>";
                                echo "<p class='favitos__promoção'>ou 3x de R$ 99,99</p>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='bnt__div'>";
                            echo "<button class='btn__comprar'>ADICIONAR AO CARRINHO</button>";
                        echo "</div>";
                echo "</div>";
            }?>
            </div>
        </div>
    </div>
</main>