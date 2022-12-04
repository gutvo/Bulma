<?php include "tempo_limite.php";?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bulma/css/bulma.min.css">
    <title>Cadastrar Usuário</title>
</head>

<body>
    <?php include "navbar.php"?>
    <section class="section">
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-half">
                    <?php
                        $erro = filter_input(INPUT_GET,"erro",FILTER_SANITIZE_NUMBER_INT);
                        $acerto = filter_input(INPUT_GET,"acerto",FILTER_SANITIZE_NUMBER_INT);
                        if($erro==1){
                            echo "<div class='notification is-danger'><button class='delete'></button><strong>Não foi possivel fazer o cadastro</strong></div>";
                        }else if($acerto==1){
                            echo "<div class='notification is-success'><button class='delete'></button><strong>Cadastro feito com sucesso</strong></div>";
                        }
                        ?>
                    <h1 class="title has-text-centered">cadastrar</h1>
                    <form action="cadastrar.php" method="post" enctype="multipart/form-data">
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
                                <input class="input is-danger" name="senha" type="text"
                                    placeholder="Digite a senha de usuário">
                            </div>
                        </div>
                        <div class="field">
                            <div class="buttons is-centered">
                                <div class="control">
                                    <button class="button is-dark is-fullwidth">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
</body>

</html>