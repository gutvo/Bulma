<?php include "tempo_limite.php";?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bulma/css/bulma.min.css">
    <title>Login</title>
</head>

<body>
    <?php include "navbar.php"?>
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-half">
                    <?php
                        $erro = filter_input(INPUT_GET,"erro",FILTER_SANITIZE_NUMBER_INT);
                        if($erro==1){
                            echo "<div class='notification is-danger'><button class='delete'></button><strong>Não foi possivel fazer o login</strong></div>";
                        }
                        ?>
                    <h1 class="title has-text-centered">Login</h1>
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Nome de usuário</label>
                            <div class="control">
                                <input class="input is-success" name="user" type="text"
                                    placeholder="Digite o nome de usuário">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Senha de usuário</label>
                            <div class="control">
                                <input class="input is-danger" name="senha" type="password"
                                    placeholder="Digite a senha de usuário" id="senha">
                                    <label class="checkbox">
                                        <input type="checkbox" onclick="myFunction()">Mostrar Senha
                                    </label>
                            </div>
                        </div>
                        <div class="field">
                        <div class="field">
                            <div class="buttons is-centered">
                                <div class="control">
                                    <button class="button is-fullwidth is-dark">Logar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</body>
<?php
if(isset($_POST['user']) && isset($_POST['senha'])){
    include "db.php";
    $usuario=$_POST["user"];
    $senha=md5($_POST["senha"]);
    $query="SELECT*FROM usuario WHERE usuarioNome='$usuario' AND usuarioSenha='$senha' ";
    $consulta=mysqli_query($conexao,$query) or die("Erro no banco de dados!");//a função executa uma consulta no banco, e para fazer isso precisada conexão e a consulta que quer executar
    
    if(mysqli_num_rows($consulta)==1){//função que retorna o numero de linhas
        $row = mysqli_fetch_array($consulta);//traz um array de valores da consulta
        $_SESSION["nomeusuario"]=$row["usuarioNome"];//pega o nome do usuario esta sendo salva em uma variavel de sessão
        $_SESSION["ID"]=$row["usuarioID"];
        header("location: home.php");
        exit;
    }else{
        header("location: login.php?erro=1");
    }
    mysqli_close($conexao);
}
?>
<script src="js/main.js"></script>
</html>