<main>
        <div class="fundo">
            <div class="azul">
                <div class="card__grid">

                <?php for($i = 0; $i < 5; $i++) {
                    echo "<div class='card__carrinho'>";
                        echo "<div class='carrinho__grid'>";
                            echo "<div data-position='1' class='grid__1'>";
                                echo "<img class='carrinho__img'  src='../assets/images/produtos/93f89340302c42863cd9bac520b85b7c.png' alt='produto'>";
                                echo "<div class='carrinho__body'>";
                                    echo "<a class='close__icon' href='#'><i class='bi bi-x-circle'></i></a>";
                                    echo "<p class='carrinho__titulo'>Tênis Nike Air Max Excee Masculino</p>";
                                    echo "<div class='carrinho__itens'>    ";
                                        echo "<p><span class='opção'>Tamanho:</span>42</p>";
                                        echo "<p class='preço'><span class='opção2'>Preço:</span>R$246,90</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div data-position='2' class='grid__reparticao'><div></div></div>";
                            echo "<div data-position='3' class='grid__quantidades'>";
                                echo "<div>";
                                    echo "<p>Quantidade: </p>";
                                    echo "<a href='#'><i class='bi bi-dash-circle'></i></a>";
                                        echo "<input type='text' value='123' readonly />";
                                    echo "<a href='#'><i class='bi bi-plus-circle'></i></a>";
                                echo "</div>";
                                echo "<p>R$500,00</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }?>
                
                </div>
            


            <div class='amarelo'>
                <div class="card__compras">
                    <div class="compras__subtotal">
                        <p class="subtotal__quantidade">Subtotal (4 Itens)</p>
                        <p class="subtotal__valor"> R$3200,00</p>
                    </div>

                    <?php for($i = 0; $i < 5; $i++) {

                    echo "<div class='compras__produto'>";
                        echo "<p class='produto__nome'>Tênis Nike Air Max Excee Masculino</p>";
                        echo "<p class='produto__valor'>R$500,00</p>";
                    echo "</div>";

                    }?>
                    
                    <div class="compras__btn">
                        <button>FINALIZAR COMPRA</button>
                    </div>
                </div>
            </div>


            </div>
        </div>
    </main>