<?php
    session_start();
    if(isset($_SESSION["utilizador"]))
    {
        include '../basedados/basedados.h'; 

        $nomeUtilizador = $_POST["utilizador"];
        $password = $_POST["password"];
        $mail = $_POST["email"];
        $morada = $_POST["morada"];
        $telemovel = $_POST["telemovel"];

        $sql = "INSERT INTO utilizador (nomeUtilizador, email, morada, pass, telemovel, tipoUtilizador) VALUES ('$nomeUtilizador', '$mail', '$morada', '".md5($password)."', '$telemovel', '5')";

        $res = mysqli_query($conn, $sql);

        header("refresh:0;url = ./gestao_utilizadores.php");
    }
    else
    {
        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
    }
?>