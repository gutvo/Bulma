<?php
    session_start();
    if(isset($_session["ativoem"])&&(time()-$_SESSION["ativoem"]>600)){
        session_destroy();
        header("location: index.php");
        exit();
    }else{
        $_SESSION["ativoem"]=time();
    }
?>