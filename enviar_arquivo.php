<?php
    $arquivo = $_FILES["arquivo"];
    if($arquivo != NULL) {
        $arquivo_nome = "Site_teste.zip";
        $dir = 'sites/teste';
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$arquivo_nome)){
            echo"deu bom";
        }
    }else{
        echo "erro";
    }
?>