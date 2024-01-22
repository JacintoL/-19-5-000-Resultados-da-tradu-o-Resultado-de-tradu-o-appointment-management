<?php
    $id_user = $_GET["IdUser"];
    include "../basedados/basedados.h";

    if($id_user == "admin")
    {
        echo "O ADMINISTRADOR NÃO PODE SER APAGADO!";
        echo "<div id='loading'>Loading...</div><script> setTimeout(function () { window.location.href = 'gestao_utilizadores.php'; }, 1000)</script>";	
    } 
    else 
    {
        $sql = "DELETE FROM utilizador WHERE nomeUtilizador = '$id_user'";
        $res = mysqli_query ($conn, $sql);
       
        echo "UTILIZADOR APAGADO COM SUCESSO";
        echo "<div id='loading'>Loading...</div><script> setTimeout(function () { window.location.href = 'gestao_utilizadores.php'; }, 1000)</script>";	
    }
   
?>