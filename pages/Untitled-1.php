<?php
    session_start();
    include_once('../assets/php/utilidades.php');
    $categoria = new Utilidades();
   
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

    <link rel="stylesheet" type="text/css" href="../assets/css/categorias/style-categorias.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/categorias/style-produto.css"/>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/index/style-paginacao.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/index/style-footer.css"/>
    
    <script src="../assets/js/produto/produtos.js" defer></script>
    <title>Adoleta Storage - Categorias</title>
    
</head>
<body>

    <?php include('../partes/categoria.php');?>
    
    <?php #include('../partes/navbar.php');?>
    
    <?php include('../partes/footer.php');?>



   



