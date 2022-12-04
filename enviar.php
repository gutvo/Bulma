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
    <style>
    .table {
        margin-left: auto;
        margin-right: auto;
    }
    </style>
    <?php include "navbar.php"?>
    <section class="section">
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-half">
                    <h1 class="title has-text-centered">Adicionar Site</h1>
                    <form action="enviar_arquivo.php" method="post" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Arquivos</label>
                            <div class="control">
                                <input class="input is-success" name="arquivo" accept=".zip" type="file"
                                    placeholder="Digite o nome de usuário">
                            </div>
                        </div>
                        <div class="field">
                            <div class="buttons is-centered">
                                <div class="control">
                                    <button type="submit" class="button is-dark is-fullwidth">enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>