<main>
    <div class="container">
        <div class="container_image">
            <button data-left class="btn left"><i class="bi bi-chevron-left"></i></button>
            <div class="container__radios">
                <input data-radio1 class="rad" type="radio" name="radio" id="imagem1" checked>
                <input data-radio2 class="rad" type="radio" name="radio" id="imagem2">
                <input data-radio3 class="rad" type="radio" name="radio" id="imagem3">
            </div>
        
            <img data-img class="carroussel__img" src="../assets/images/carousel/nike.png" alt="nike-carrossel" />
            <img data-img class="carroussel__img" src="../assets/images/carousel/adiddas.png" alt="addidas-carrossel" />
            <img data-img class="carroussel__img" src="../assets/images/carousel/puma.png" alt="puma-carrossel" />    
        
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

        <?php 
       include_once('../assets/php/conexao.php');
       $conexao = new Conexao;
        $con = $conexao->connect;

       $sql_quantidade = "SELECT * FROM bd_adoleta_storage.tb_produtos;";
       $sql_query_quantidade = $con->prepare($sql_quantidade);
       $sql_query_quantidade->execute();

       $quantidade = $sql_query_quantidade->rowCount(); 
       $paginas = $quantidade / 15;
       $Inteiro = floor($paginas);
       $flutuante = fmod($paginas, 1.0);

       if($flutuante > 0)
       {
           $Inteiro += 1; // quantidade de paginas final 
          
       }
       echo "<script> const limite = $Inteiro; </script>";


        if (isset($_GET['pagina'])) {
            $pag = $_GET['pagina'];
        } else {
            $pag = 0;
        }
        
        $offset = $pag * 15;

        $limite = 15;
       
        $sql = "SELECT * FROM bd_adoleta_storage.tb_produtos LIMIT $limite OFFSET $offset;";
        $sql_query = $con->prepare($sql);
        $sql_query->execute();
        
        /*===== SELECIONA LINHAS E DADOS DO BANCO =====*/
    while($produto = $sql_query->fetch(PDO::FETCH_ASSOC)){
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
                    data-imagem12='../assets/images/produtos/$imagem1' data-imagem22='../assets/images/produtos/$imagem2'>";
            echo "</a>";
                    echo "<form data-favoritarForm>";
                        echo "<input data-id type='hidden' name='id' value='$id'>";
                        echo "<button data-link class='icon__fav' name='favorito'><i class='bi bi-heart'></i></button>";
                    echo "</form>";

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
?>
        </div>  
    </div>
    <div class="paginacao">
        <div>
            <ul>
        
              <li><a class='ponta esquerda'><i class='bi bi-arrow-left'></i></a></li>
                <?php
                

                for($i = 0; $i < $Inteiro; $i++){
                    $numeração = $i + 1;
                   
                        echo "<li>";
                            echo "<a href='Index.php?pagina=$i'>$numeração</a>";
                        echo "</li>";
                }?>
                <li><a class='ponta direita' ><i class='bi bi-arrow-right'></i></a></li>
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
            <p>
                <i class="fas fa-cannabis"></i>
                © 2021 Copyright: AdoletaStorage.com
                <i class="fas fa-cannabis"></i>
            </p>
        </div>
    </div>
</main>
