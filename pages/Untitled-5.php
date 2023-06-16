<?php
    session_start();
    include_once('..\assets\php\conexao.php');
        
    $conexao = new Conexao;
    $con = $conexao->connect;
    $id = $_GET['id'];

    $sql = "SELECT * FROM bd_adoleta_storage.tb_produtos WHERE id_produtos = '$id'";
    $sql_query = $con->prepare($sql);
    $sql_query->execute();
    
    $produto = $sql_query->fetch(PDO::FETCH_ASSOC);
   
    $nome = $produto['nome_produtos'];
    $precoAntigo = $produto['precoAntigo_produtos'];
    $preco = $produto['preco_produtos'];
    $promocao = $produto['promocao_produtos'];

    $imagem1 = $produto['img1_produtos'];
    $imagem2 = $produto['img2_produtos'];
    $imagem3 = $produto['img3_produtos'];
    $imagem4 = $produto['img4_produtos'];

    $descricao = $produto['descricao_produtos'];
    $genero = $produto['genero_produtos'];
    $marca = $produto['marca_produtos'];
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

    <link rel="stylesheet" type="text/css" href="..\assets\css\produto\style-produto.css">
    <link rel="stylesheet" type="text/css" href="..\assets\css\produto\style-produto-2.css">

    <script src="../assets/js/produto/troca.js" defer></script>

    <title>Adoleta Storage - Produto</title>
    
</head>
<body>


    <?php include('../partes/items.php');?>
    
    <?php include('../partes/navbar.php');?>
    
    <?php include('../partes/footer.php');?>