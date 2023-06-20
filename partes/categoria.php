<main>
    <div class="fundo">
        <div class="categoria">


            <form method="POST">            
                <div class="category">
                    <button type="button" data-title class="category__button">
                        <span class="button__title">Gênero</span>
                        <span class="button__icon"><i class="bi bi-plus"></i></span>
                    </button>
                    <ul data-item="1" class="category__item">
                        <li><span class="category__Produtos"><input name="genero[]" value="Masculino" class="category__checkbox" type="checkbox" id="Opção1__1"><label for="Opção1__1">Masculino</label></span></li>
                        <li><span class="category__Produtos"><input name="genero[]" value="Feminino" class="category__checkbox" type="checkbox" id="Opção1__2"><label for="Opção1__2">Feminino</label></span></li>
                        <li><span class="category__Produtos"><input name="genero[]" value="Unissex" class="category__checkbox" type="checkbox" id="Opção1__3"><label for="Opção1__3">Unissex</label></span></li>
                    </ul>
                </div>
                
                <div class="category">
                    <button type="button" data-title class="category__button">
                        <span class="button__title">Tamanho</span>
                        <span class="button__icon"><i class="bi bi-plus"></i></span>
                    </button>
                    <ul data-item="1" class="category__item2">
                        <div class="tamanho__grid">
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="36" class="category__checkbox2" type="checkbox" id="Opção4__1"><label for="Opção4__1">36</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="37" class="category__checkbox2" type="checkbox" id="Opção4__2"><label for="Opção4__2">37</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="38" class="category__checkbox2" type="checkbox" id="Opção4__3"><label for="Opção4__3">38</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="39" class="category__checkbox2" type="checkbox" id="Opção4__4"><label for="Opção4__4">39</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="40" class="category__checkbox2" type="checkbox" id="Opção4__5"><label for="Opção4__5">40</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="41" class="category__checkbox2" type="checkbox" id="Opção4__6"><label for="Opção4__6">41</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="42" class="category__checkbox2" type="checkbox" id="Opção4__7"><label for="Opção4__7">42</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="43" class="category__checkbox2" type="checkbox" id="Opção4__8"><label for="Opção4__8">43</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="44" class="category__checkbox2" type="checkbox" id="Opção4__9"><label for="Opção4__9">44</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="45" class="category__checkbox2" type="checkbox" id="Opção4__10"><label for="Opção4__10">45</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="46" class="category__checkbox2" type="checkbox" id="Opção4__11"><label for="Opção4__11">46</label></span></li>
                            <li><span class="category__Produtos2"><input name="tamanhos[]" value="47" class="category__checkbox2" type="checkbox" id="Opção4__12"><label for="Opção4__12">47</label></span></li>        
                        </div>
                    </ul>
                </div>

                <div class="category">
                    <button type="button" data-title class="category__button">
                        <span class="button__title">Departamento</span>
                        <span class="button__icon"><i class="bi bi-plus"></i></span>
                    </button>
                    <ul data-item="1" class="category__item">
                        <li><span class="category__Produtos"><input name="departamento[]" value="Corrida" class="category__checkbox" type="checkbox" id="Opção2__1"><label for="Opção2__1">Corrida</label></span></li>
                        <li><span class="category__Produtos"><input name="departamento[]" value="Caminhada" class="category__checkbox" type="checkbox" id="Opção2__2"><label for="Opção2__2">Caminhada</label></span></li>
                        <li><span class="category__Produtos"><input name="departamento[]" value="Basquete" class="category__checkbox" type="checkbox" id="Opção2__3"><label for="Opção2__3">Basquete</label></span></li>
                        <li><span class="category__Produtos"><input name="departamento[]" value="Futebol" class="category__checkbox" type="checkbox" id="Opção2__4"><label for="Opção2__4">Futebol</label></span></li>
                        <li><span class="category__Produtos"><input name="departamento[]" value="Esportes" class="category__checkbox" type="checkbox" id="Opção2__5"><label for="Opção2__5">Esportes de Quadra</label></span></li>
                        <li><span class="category__Produtos"><input name="departamento[]" value="Automobilismo" class="category__checkbox" type="checkbox" id="Opção2__6"><label for="Opção2__6">Automobilismo</label></span></li>
                        <li><span class="category__Produtos"><input name="departamento[]" value="Moda" class="category__checkbox" type="checkbox" id="Opção2__7"><label for="Opção2__7">Moda</label></span></li>
                    </ul>
                </div>

                <div class="category">
                    <button type="button" data-title class="category__button">
                        <span class="button__title">Marcas</span>
                        <span class="button__icon"><i class="bi bi-plus"></i></span>
                    </button>
                    <ul data-item="1" class="category__item">
                        <li><span class="category__Produtos"><input name="marcas[]" value="Adidas" class="category__checkbox" type="checkbox" id="Opção3__1"><label for="Opção3__1">Adidas</label></span></li>
                        <li><span class="category__Produtos"><input name="marcas[]" value="Asics" class="category__checkbox" type="checkbox" id="Opção3__2"><label for="Opção3__2">Asics</label></span></li>
                        <li><span class="category__Produtos"><input name="marcas[]" value="Mizuno" class="category__checkbox" type="checkbox" id="Opção3__3"><label for="Opção3__3">Mizuno</label></span></li>
                        <li><span class="category__Produtos"><input name="marcas[]" value="Nike" class="category__checkbox" type="checkbox" id="Opção3__4"><label for="Opção3__4">Nike</label></span></li>
                        <li><span class="category__Produtos"><input name="marcas[]" value="Puma" class="category__checkbox" type="checkbox" id="Opção3__5"><label for="Opção3__5">Puma</label></span></li>
                        <li><span class="category__Produtos"><input name="marcas[]" value="Olympikus" class="category__checkbox" type="checkbox" id="Opção3__6"><label for="Opção3__6">Olympikus</label></span></li>
                    </ul>
                </div>          

                
                <div class="filtro">
                    <div class="filtro_1">
                        <button type="submit" name="submit" class="filtro__btn" >FILTRAR</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="fundo2">
            <div class='card__grid'>

            <?php
           
            $sql = $categoria->sql;
            
            if (!empty($sql)) {
                // Executar a consulta SQL fora do método Categoria()
                $sql_query = $categoria->con->prepare($sql);
                $sql_query->execute();

                $quantidade = $sql_query->rowCount();
            
                /*===== SELECIONA LINHAS E DADOS DO BANCO =====*/
                while (($produto = $sql_query->fetch(PDO::FETCH_ASSOC))) {
                    $id = $produto['id_produtos']; 
                    $nome = $produto['nome_produtos'];
                    $precoAntigo = $produto['precoAntigo_produtos'];
                    $preco = $produto['preco_produtos'];
                    $promocao = $produto['promocao_produtos'];
                    $imagem1 = $produto['img1_produtos'];
                    $imagem2 = $produto['img2_produtos'];
                    
                    echo "<div class='card'>";
                        echo "<a class='link__produtos' href='Untitled-5.php?id=$id'>";
                            echo "<img class='card__img' src='../assets/images/produtos/$imagem1' alt='produto' 
                                data-imagem1='../assets/images/produtos/$imagem1' data-imagem2='../assets/images/produtos/$imagem2'>";
                            echo "<a data-link class='icon__fav'><i class='bi bi-heart'></i></a>";
                            echo "<a class='link__produtos' href='Untitled-5.php?id=$id'>";
                                echo "<div class='card__body'>";
                                    echo "<p class='card__titulo'>$nome</p>";
                                    echo "<div class='itens'>";
                                        echo "<p class='card__preço_antigo'>R$ $precoAntigo</p>";
                                        echo "<p class='card_preço'>R$ $preco</p>";
                                    echo "</div>";
                                    echo "<p class='promoção'>ou R$ $promocao sem juros</p>";
                                    echo "<a class='icon__cart' href='Untitled-5.php?id=$id'><i class='bi bi-cart2'></i></a>";
                                echo "</div>";
                        echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "Erro: a consulta SQL não foi definida corretamente.";
            }
    ?>

        </div>
    </div>
    </div>
    <div class="paginacao" style="padding-top: 2rem;">
        <div>
            <ul>
                <li><a class="ponta esquerda desativado"><i class="bi bi-arrow-left"></i></a></li>
                <li><a>1</a></li>
                <li><a>2</a></li>
                <!-- <li><a>3</a></li> -->
                <li><a class="ponta direita" ><i class="bi bi-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <div class="redes">
            <div>
                <ul>
                    <li><span><a href=""><i class="bi bi-twitter"></i></a></span></li>
                    <li><span><a href=""><i class="bi bi-instagram"></i></a></span></li>
                    <li><span><a href=""><i class="bi bi-facebook"></i></a></span></li>
                </ul>
            </div>
        </div>
        <div class="barra1">
            <div></div>
        </div>
        <div class="copi">
            <p><i class="fas fa-cannabis"></i>© 2022 Company, Inc</p>
        </div>
    </div>
</main>