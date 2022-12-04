<?php

include "db.php";

$usuario=$_POST["user"];
$senha=md5($_POST["senha"]);

$query="insert into ftpd values('$usuario','1','$senha','2001','2001','/var/www/html/$usuario',0,0,'','*',0,0)";

if ($conexao->query($query) === TRUE) {
    $query="insert into usuario values(0,'$usuario','$senha')";
    if ($conexao->query($query) === TRUE) {
        header("location: formulario_cadastro.php?acerto=1");
    }else {
        header("location: formulario_cadastro.php?erro=1");
    }
} else {
    header("location: formulario_cadastro.php?erro=1");
}
mysqli_close($conexao);
?>