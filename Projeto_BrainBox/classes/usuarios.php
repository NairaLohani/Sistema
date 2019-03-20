<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        Class Usuario{
            private $pdo;
            public $msgErro="";// tudo ok
            public function conectar($nome, $host, $usuario, $senha){
                global $pdo;
                try {
                    $pdo=new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
                } catch (PDOException $e) {
                    $msgErro=$e->getMessage();
                }
            }
            
            public function cadastrar($nome, $email, $senha){
                 global $pdo;
                 //verificar se ja esxiste o email cadastrado
                 $sql=$pdo->prepare("SELECT id_cliente FROM cliente WHERE email_cliente=:e");
                 $sql->bindValue(":e",$email);
                 $sql->execute();
                 if($sql->rowCount()>0){
                     return FALSE;//Ja esta cadastrada
                 }
                 else{
                 //caso nao, Cadastrar
                    $sql=$pdo->prepare("INSERT INTO cliente(nome_cliente, email_cliente, senha_cliente) VALUES(:n, :e, :s)");
                        $sql->bindValue(":n",$nome);
                        $sql->bindValue(":e",$email);
                        $sql->bindValue(":s", md5($senha));
                        $sql->execute();
                        return TRUE;//tudo ok
                           
                 }
        
            }
            public function logar($email, $senha){
                 global $pdo;
                 //verifcar se o emial e senha estao cadastrados,se sim
                 $sql=$pdo->prepare("SELECT id_cliente FROM cliente WHERE email_cliente=:e AND senha_cliente=:s");
                 $sql->bindValue(":e",$email);
                 $sql->bindValue(":s", md5($senha));
                 $sql->execute();
                 if($sql->rowCount()> 0){
                     //entrar no sistema(sessao)
                     $dado=$sql->fetch();
                     session_start();
                     $_SESSION['id_cliente']=$dado['id_cliente'];
                     return TRUE;//logado com sucesso
                 }
                 else{
                     return FALSE;//nao foi possivel logar
                 }
                 
        }
        }
        ?>
    </body>
</html>
