<?php 
    //conectando ao bd
    require_once "db_connect.php";
    //verificando se a sessao esta aberta, caso não redireciona-se para a pagina inicial
    
    

    //conectando-se a sessao
    session_start();
    
    if(!isset($_SESSION['logado'])):
        
        header('Location: index.php');
    endif;
 //abaixo um exercicio criado por mim mesmo para gravar alguns dados no BD
 /*
    if(isset($_POST['btn-gravar-bd'])):
        $erros = array();
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $nomeUsuario = mysqli_escape_string($connect, $_POST['nome-usuario']);
        if(empty($nome) or empty($nomeUsuario)):
            //se caso o usuario clicar no submit estando os campos vazios, o php ira jogar a seguinte string para dentro do array $erros
            $erros[] = "<li>O campo nome/nome de usuario precisa ser preenchido</li>";
        
    else:
        //fazendo uma query teste como exercicio para salvar no BD
        $gravarSQL = "INSERT INTO `usuarios`(`Nome`, `login`)
         VALUES('$nome', '$nomeUsuario');";
         mysqli_query($connect, $gravarSQL);
    
    endif;
endif;
   */ 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina restrita</title>
</head>
<body>
<?php
//aqui esta as condicionais as quais varerrao o array de erros conforme a linha 14 e exibir na tela caso haja algum erro
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
    endif;
?>
<h1>You've been re-directed</h1>
<h1>Olá <?php echo $_SESSION['nome-usuario'];?>!</h1>
<h1>Seu id na base de dados é <?php echo $_SESSION['id_usuario'];?>!</h1>
<!-- O link abaixo faz o logout -->
<a href="logout.php">Sair</a>
<!-- abaixo o formulario teste do codigo que grava dados no BD
<h1><?php echo $_SESSION['todos-dados'][2];?></h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        nome:<input type="text" name="nome" placeholder="digite nome"><br>
        nome de usuario:<input type="text" name="nome-usuario" placeholder="nome de usuario"><br>
        <button type="submit" name="btn-gravar-bd">enviar</button>
    </form>
-->
</body>
</html>