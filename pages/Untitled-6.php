<?php
    include_once("..\assets\php\usuario.php");
    $usuario = new Usuario;
    $usuario->Cadastro();
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

    <link rel="stylesheet" type="text/css" href="../assets/css/entrar/style-cadastro.css"/>
    <link rel="stylesheet" type="text/css" href="../assets\css\entrar\style-cadastro-container-1.css"/>
    <link rel="stylesheet" type="text/css" href="../assets\css\entrar\style-cadastro-container-2.css"/>

    <script src="../assets\js\cadastro\valid.js" defer></script>
    <script src="../assets\js\cadastro\main.js" defer></script>
    <title>Adoleta Storage - Cadastro</title>
    
</head>
<body>


    <?php include('../partes/cadastro.php');?>
    
    <?php include('../partes/navbar.php');?>
    
    <?php include('../partes/footer.php');?>