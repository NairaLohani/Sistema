<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pedido</title>
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <?php
       session_start();
       if(!isset($_SESSION['id_cliente'])){
           header("location:entrar.php");
           exit();
       }
        ?>
    <center><h1>Bém Vindo a tela de pedido</h1></center>
    <a href="sair.php"> Sair </a> <br>
    <a href="../home.php"> Ver Cardápio </a>
    </body
</html>
