<?php
    session_start();
    if(isset($_SESSION["utilizador"]))
    {
        include '../basedados/basedados.h'; 

        $nome = $_GET["idMarcacao"];

        $sql = "DELETE FROM reserva WHERE nome = '$nome'";
        $res = mysqli_query($conn, $sql);
    
        echo "<script>setTimeout(function(){ window.location.href = 'atender_marcacoes.php'; }, 0)</script>";
    }
    else 
    {
        echo "<script>setTimeout(function(){ window.location.href = 'pagina_inicial.php'; }, 0)</script>";
    }
?>