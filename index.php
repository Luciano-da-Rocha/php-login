<?php 
    //conectando
    require_once "db_connect.php";

    //sessao
    session_start();
    
    //verificando se os campos foram preenchidos
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);
        if(empty($login) or empty($senha)):
            //se caso o usuario clicar no submit estando os campos vazios, o php ira jogar a seguinte string para dentro do array $erros
            $erros[] = "<li>O campo login/senha precisa ser preenchido</li>";
        else:
            // query verificando se o usuario existe na base de dados
            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql);
            
            
            
            // verificando se o login e senha estão contidos no banco de dados
            
            if(mysqli_num_rows($resultado) > 0):
                //criptografando a senha obtida com MD5 a mesma do banco de dados
                $senha = md5($senha);
                // a query abaixo verifica se o login e senha DIGITADOS estão contidos no BD
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);
                // Se true/1, significa que estão corretos, abaixo o codigo que redireciona para a pagina home.php

                if(mysqli_num_rows($resultado) > 0):
                    $dados = mysqli_fetch_array($resultado);
                    //importantissimo
                    $_SESSION['logado'] =  true; 
                    $_SESSION['id_usuario'] = $dados['id'];
                    $_SESSION['nome-usuario'] = $dados['Nome'];
                    $_SESSION['todos-dados'] = $dados;
                    header('Location: home.php');
                else:
                    $erros[] = "<li> Usuário e senha não conferem</li>";
                endif;
                   
            else:
                $erros[] = "<li> Usuario inexistente </li>";
                
                    
                
            
            endif;
            
        endif;
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<?php
//aqui esta as condicionais as quais varerrao o array de erros conforme a linha 14 e exibir na tela caso haja algum erro
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
    endif;
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Login:<input type="text" name="login"><br>
    Senha:<input type="password" name="senha"><br>
    <button type="submit" name="btn-entrar">Entrar</button>

</form>
   
</body>
</html>