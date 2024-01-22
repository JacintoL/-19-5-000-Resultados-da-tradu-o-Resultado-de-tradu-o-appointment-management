<html>
<head>
    <meta charset="UTF-8">
    <title> Registo</title>
    <link rel="icon" href="icon.jpg">
</head>
<body>
</body>
</html>  

<?php
    include '../basedados/basedados.h'; 

    session_start();
    if(!(isset($_SESSION["utilizador"])))
    {
        $nomeUtilizador = $_GET["utilizador"];
        $password = $_GET["password"];
        $mail = $_GET["email"];
       
        $morada = $_GET["morada"];
        $telemovel = $_GET["telemovel"];

        if(empty($nomeUtilizador) || empty($password) || empty($mail) || empty($morada) || empty($telemovel))
        {
            echo "<div id = 'loading'>Por favor, preencha todos os campos.</div><script>setTimeout(function(){ window.location.href = 'registar.php'; }, 2000)</script>";
        }
        else
        {
            mysqli_select_db($conn, "trabalho1");
            $sql = "INSERT INTO utilizador (nomeUtilizador, email, morada, pass, telemovel, tipoUtilizador) VALUES ('$nomeUtilizador', '$mail', '$morada', '".md5($password)."', '$telemovel', '5')";
            $retval = mysqli_query($conn, $sql);
            if(mysqli_affected_rows($conn) == 1)
            {
                echo "<div id = 'loading'>Registo realizado com sucesso. <br> Por favor, aguarde.</div><script>setTimeout(function(){ window.location.href = 'pagina_inicial.php'; }, 2000)</script>";
            }
            else
            {
                echo "<div id = 'loading'>Não foi possível concluir o registo.</div><script>setTimeout(function(){ window.location.href = 'registar.php'; }, 2000)</script>";
            }
            echo "<div id='loading'>Loading...</div><script> setTimeout(function () { window.location.href = 'pagina_inicial.php'; }, 2000)</script>";	
        }
    }
    else
    {
        echo "<script>setTimeout(function(){ window.location.href = './logout.php'; }, 0)</script>";
    }
?>