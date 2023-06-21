<main>
        <div class="fundo">
            <div class='card'>
                <div class="card__grid">
                    <div data-grid="1">
                        <div class="img__lateral">
                            <a class="img__link" tabindex="0" autofocus><img class='lateral__img' src='../assets/images/produtos/<?php echo $imagem1?>' alt='produto'></a>
                            <a class="img__link" tabindex="0"><img class='lateral__img' src='../assets/images/produtos/<?php echo $imagem2?>' alt='produto'></a>
                            <a class="img__link" tabindex="0"><img class='lateral__img' src='../assets/images/produtos/<?php echo $imagem3?>' alt='produto'></a>
                            <a class="img__link" tabindex="0"><img class='lateral__img' src='../assets/images/produtos/<?php echo $imagem4?>' alt='produto'></a>
                        </div>
                            <img class='card__img'  src='../assets/images/produtos/<?php echo $imagem1?>' alt='produto'
                            data-imagem1='../assets/images/produtos/<?php echo $imagem1?>'
                            data-imagem2='../assets/images/produtos/<?php echo $imagem2?>'
                            data-imagem3='../assets/images/produtos/<?php echo $imagem3?>'
                            data-imagem4='../assets/images/produtos/<?php echo $imagem4?>'>
                    </div>
                    <div data-grid="2">
                        <p class='card__titulo'><?php echo $nome?></p>
                        <div class="itens">
                            <p class="valor__antigo"><?php echo 'R$'.$precoAntigo?></p>
                            <p class="valor"><?php echo 'R$'.$preco?></p>
                            <p class="promoção"><?php echo 'ou R$ '.$promocao.' sem juros'?></p>
                        </div>
                        <div class="itens_2">
                            <div class="tamanho">
                                <ul  data-item="1" class="category__item">
                                    <li class="category__title">Tamanhos:</li>
                                    <div class="tamanho__grid">
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__1" disabled><label for="Opção1__1">36</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__2"><label for="Opção1__2">37</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__3"><label for="Opção1__3">38</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__4"><label for="Opção1__4">39</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__5"><label for="Opção1__5">40</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__6"><label for="Opção1__6">41</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__7"><label for="Opção1__7">42</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__8"><label for="Opção1__8">43</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__9"><label for="Opção1__9">44</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__10"><label for="Opção1__10">45</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__11"><label for="Opção1__11">46</label></span></li>
                                        <li><span class="category__Produtos"><input class="category__checkbox" type="checkbox" id="Opção1__12"><label for="Opção1__12">47</label></span></li>        
                                     </div>
                                </ul>
                            </div>
                            
                        </div>
                        <button class="btn__comprar">ADICIONAR AO CARRINHO</button>
                    </div>
                    <div data-grid="3">
                        <div class="descrição">
                            <p class="descrição__descrição"><span>Descrição:</span><?php echo $descricao ?></p>
                            <p class="descrição__genero"><span>Genero:</span><?php echo $genero ?></p>
                            <p class="descrição__departamento"><span>Departamento:</span>Moda</p>
                            <p class="descrição__marca"><span>Marca:</span><?php echo $marca ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>