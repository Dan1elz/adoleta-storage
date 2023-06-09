<?php
    session_start();

    include_once("..\assets\php\session.php");
    $dados = new Session();
    $dados->sair();

    include_once("..\assets\php\usuario.php");
    $usuario = new Usuario;
    $usuario->Alterar();

 /*===== VERIFICA A EXISTENCIA DA SESSION =====*/
if((!isset($_SESSION['id_usuario'])) == true and (!isset($_SESSION['email_usuario']) == true)){
    /*===== CASO NAO EXISTIR, DESTRUIR SESSION =====*/
    session_destroy();
    header('Location: untitled-4.php?error==notSession');
}
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

    <link rel="stylesheet" type="text/css" href="../assets/css/usuario/style-usuario.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/usuario/style-modal.css"/>
    <script src="../assets/js/usuario/modal.js" defer></script>

    <title>Adoleta Storage - Perfil</title>
    
</head>
<body>


    <?php include('../partes/usuario.php');?>
    
    <?php include('../partes/navbar.php');?>
    
    <?php include('../partes/footer.php');?>