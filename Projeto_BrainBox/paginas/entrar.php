<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<meta charset="utf-8">
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/style_entrar.css">
</head>
<body>
    <?php
   require_once '../classes/usuarios.php';
    $u=new Usuario;
    ?>
	<div class="cada-cont">
            <a href="../home.php"><img class="icon" src="../img/home.png"></a>
		<div id="logo">
                    <h1><a href="../home.php">BRAINBOX</a></h1>
			<span>Developer <a href="#" rel="nofollow"></a></span>
		</div>
		<div class="for">
                    <form method="post" name="entrar" action="" autocomplete="on">
                            <input class="campo1" type="email" name="email" placeholder="E-mail" required="" maxlength="45"> <br>
				<input class="campo" type="password" name="senha" placeholder="Senha" required="" maxlength="30">  <br>
                                <input class="button" type="submit" name="entrar" value="Entrar">
                                 <p class="question">Ainda não é inscrito? <a href="cadastro.php"> Cadastre-se </a></p>
			</form>
                   
		</div>
	</div>
	<div id="copyright" class="container">
            <p>&copy; 2019| Todos os direitos reservados.| Design by <a href="../home.php">BrainBox</a>.</p>
	</div>
    <?php
     if (isset($_POST['email'])) {
        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        if(!empty($email) && !empty($senha))
        {
             $u->conectar("sistema_lanchonete", "localhost", "root", "");
             if($u->msgErro=="")
        {
            if($u->logar($email, $senha))
            {
                header('location: pedido.php');
            }
        else{ 
            ?>
    <div id="msg_Erro"> Email e/ou senha estão incorretos! <a class="ir" href="entrar.php"> Tente Novamente</a></div>
    <?php
            }
        }
 else {
     echo "Erro:".$u->msgErro;
 
      }
     } else
            {
         ?>
    <div id="msg_Erro"> Preencha todos os campos!</div>
    <?php
            
            }
      }
    ?>
</body>
</html>