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
                    <h1 class="title has-text-centered">Sites</h1>
                    <table class="table is-bordered is-striped is-fullwidth is-centered">
                        <thead>
                            <th class="has-text-centered">Nome de diretório</th>
                        </thead>
                        <tbody>
                            <?php
                            $path="imagens/";
                            $diretorio=dir($path);
                            while($arquivo=$diretorio->read()){
                                if($arquivo=="."||$arquivo==".."){
                                }else{
                                    echo"<tr class='has-text-centered'><td>".$arquivo."</td>";
                                }
                            }
                        ?>
                        </tbody>
                        
                    </table>
                    <a class="button is-dark is-fullwidth" href="enviar.php">Adicionar site</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>