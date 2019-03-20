
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro</title>
        <meta charset="utf-8">
        <link href="../css/import_fonts.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="../css/style_cadastro.css">
    </head>
    <body>
        <?php
        require_once '../classes/usuarios.php';
        $u = new Usuario;
        ?>
        <div class="cada-cont">
            <a href="../home.php"><img class="icon" src="../img/home.png"></a>
            <div id="logo">
                <h1><a href="../home.php">BRAINBOX</a></h1>
                <span>Developer <a href="#" rel="nofollow"></a></span>
            </div>
            <div class="for">
                <form method="post" name="cadastro" autocomplete="on">
                    <input type="text" name="nome" placeholder="Nome" required="" maxlength="45"> <br>
                    <input type="email" name="email" placeholder="E-mail" required="" maxlength="45"><br>
                    <input type="password" name="senha" placeholder="Senha" required="" maxlength="45">  <br>
                    <input type="password" name="conf_senha" placeholder="Confirmar Senha" required="" maxlength="30"> <br>
                    <input  type="submit" name="" value="Cadastrar">

                </form>
            </div>
        </div>
        <div id="copyright" class="container">
            <p>&copy; 2019| Todos os direitos reservados.| Design by <a href="../home.php">BrainBox</a>.</p>
        </div>
        <?php
        //verificar se clicou no botao
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['conf_senha']);
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

                $u->conectar("sistema_lanchonete", "localhost", "root", "");
                if ($u->msgErro == "") {//se esta tudo ok
                    if ($senha == $confirmarSenha) {
                        if ($u->cadastrar($nome, $email, $senha)) {
                            ?>

                            <div id="msg_Sucesso">Cadastrado com sucesso! <a class="go" href="entrar.php"> Acesse para entrar</a></div>
                            <?php
                        } else {
                            ?>
                            <div id="msg_Erro"> Email já cadastrado! <a class="go" href="cadastro.php"> Tente Novamente</a></div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="msg_Erro">Senha e Confirmar senha não correspondem! <a class="go" href="cadastro.php"> Tente Novamente</a></div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="msg_Erro">
                        <?php echo "Erro" . $u->msgErro; ?>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="mgs_Erro">Preencha todos os campos!</div>
                <?php
            }
        }
        ?>
    </body>
</html>