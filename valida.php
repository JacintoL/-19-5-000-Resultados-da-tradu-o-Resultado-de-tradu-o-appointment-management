<?php
    session_start();
    if(isset($_SESSION["utilizador"]))
    {
        $id_user = $_GET["IdUser"];
        include "../basedados/basedados.h";
    
        $sql = "UPDATE utilizador SET tipoUtilizador = '3' WHERE nomeUtilizador='$id_user'";
        $res = mysqli_query ($conn, $sql);
        header ("Location:gestao_utilizadores.php");
    }
    else
    {
        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
    }
    
?>