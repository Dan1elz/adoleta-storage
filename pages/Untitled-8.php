<?php
    include_once("..\assets\php\postagem.php");
    $dados = new Postagem;
    $dados->Cadastro();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/index/style-navbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/index/style-nabnar-2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../assets/css/postagem/style-form.css"/>
    <title>Adoleta Storage - Produto</title>
    
</head>
<body>
    <main>
        <div class="fundo">
            <form  method="POST" enctype="multipart/form-data">
            <div class="container__formulario">
                <div class="form-user">
                
                    <div class="input__box">
                        <input data-nome class="form-control" type="text" name="nome" placeholder="Nome do Produto" required />
                    </div>
                    <div class="input__box">
                        <input data-cod class="form-control" type="text" name="codigo" placeholder="Código do Produto" required />
                    </div>



                    <div class="input__box2">
                        <input data-precoAntigo class="form-control" type="text" name="precoAntigo" placeholder="Preço Antigo" required />
                    </div>
                    <div class="input__box2">
                        <input data-preco class="form-control" type="text" name="preco" placeholder="Preço Atual" required />
                    </div>
                    <div class="input__box2">
                        <input data-promocao class="form-control" type="text" name="promocao" placeholder="Promoção" required />
                    </div>



                    <div class="input__box3">
                        <input data-img1 class="form-control" type="file" name="imagem1" required/>
                    </div>
                    <div class="input__box3">
                        <input data-img2 class="form-control" type="file" name="imagem2" required />
                    </div>
                    <div class="input__box3">
                        <input data-img3 class="form-control" type="file" name="imagem3" required />
                    </div>
                    <div class="input__box3">
                        <input data-img4 class="form-control" type="file" name="imagem4" required />
                    </div>



                    <div class="input__box4">
                        <textarea data-descricao class="form-control" name="descricao" cols="30" rows="10" maxlength="270" placeholder="Descrição" required></textarea>
                    </div>


                    <div class="input__box">
                        <select data-genero class="form-control" name="genero" required>
                        <option value="" selected disabled>Genero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Unissex">Unissex</option>
                        </select>
                    </div>
                    <div class="input__box">
                        <select data-marca class="form-control" name="marca" required>
                        <option value="" selected disabled>Marca</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Asics">Asics</option>
                        <option value="Mizuno">Mizuno</option>
                        <option value="Nike">Nike</option>
                        <option value="Puma">Puma</option>
                        <option value="Olympikus">Olympikus</option>
                        </select>
                    </div>

                    <div class="input__box4">
                    
                        <input type="checkbox" name="Corrida" id="Corrida">
                        <label for="Corrida">Corrida</label>
                    
                        <input type="checkbox" name="Caminhada" id="Caminhada">
                        <label for="Caminhada">Caminhada</label>
                        
                        <input type="checkbox" name="Basquete" id="Basquete">
                        <label for="Basquete">Basquete</label>
                        
                        <input type="checkbox" name="Futebol" id="Futebol">
                        <label for="Futebol">Futebol</label>

                        <input type="checkbox" name="Quadra" id="Quadra">
                        <label for="Quadra">Esportes de Quadra</label>

                        <input type="checkbox" name="Automobilismo" id="Automobilismo">
                        <label for="Automobilismo">Automobilismo</label>
                    
                    </div>
                    <div class="input__box6">
                        <input data-36  class="form-control" type="text" name="tamanho36" placeholder="Tamanho 36">
                    </div>
                    <div class="input__box6">  
                        <input data-37  class="form-control" type="text" name="tamanho37" placeholder="Tamanho 37">
                    </div>
                    <div class="input__box6">
                        <input data-38  class="form-control" type="text" name="tamanho38" placeholder="Tamanho 38">
                    </div>
                    <div class="input__box6">
                        <input data-39  class="form-control" type="text" name="39" placeholder="Tamanho 39">
                    </div>
                    <div class="input__box6"> 
                        <input data-40  class="form-control" type="text" name="tamanho40" placeholder="Tamanho 40">
                    </div>
                    <div class="input__box6">
                        <input data-41  class="form-control" type="text" name="tamanho41" placeholder="Tamanho 41">
                    </div>
                    <div class="input__box6">
                        <input data-42  class="form-control" type="text" name="tamanho42" placeholder="Tamanho 42">
                    </div>
                    <div class="input__box6">
                        <input data-43  class="form-control" type="text" name="tamanho43" placeholder="Tamanho 43">
                    </div>
                    <div class="input__box6">
                        <input data-44  class="form-control" type="text" name="tamanho44" placeholder="Tamanho 44">
                    </div>
                    <div class="input__box6">
                        <input data-45  class="form-control" type="text" name="tamanho45" placeholder="Tamanho 45">
                    </div>
                    <div class="input__box6">
                        <input data-46  class="form-control" type="text" name="tamanho46" placeholder="Tamanho 46">
                    </div>
                    <div class="input__box6">
                        <input data-47  class="form-control" type="text" name="tamanho47" placeholder="Tamanho 47">
                    </div>

                    <div class="input__box7">
                        <button type="submit" name="submit">Enviar</button>
                    </div>
                </div>
            </div>    
        </form>
    </main>
  </body>