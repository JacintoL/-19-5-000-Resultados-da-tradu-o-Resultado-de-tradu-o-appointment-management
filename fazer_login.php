<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="icon.jpg">
</head>
<body>
</body>
</html>  

<?php
    session_start();
    if(isset($_POST["utilizador"]) && isset($_POST["password"]))
    {
        $utilizador = $_POST["utilizador"];
        $password = $_POST["password"];
        include '../basedados/basedados.h'; 
        include './const_utilizadores.php';
        
        $sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '$utilizador' AND pass = '" .md5($password). "' AND tipoUtilizador != " . CLIENTE_APAGADO. ";";
        $retval = mysqli_query($conn, $sql) ;
        if(!$retval)
        {
            die('Could not get data: '. mysqli_error($conn));
        }
        $row = mysqli_fetch_array($retval);

        if(strcmp($row["nomeUtilizador"], $utilizador) == 0 && strcmp($row["pass"], md5($password)) == 0)
        {  
            $_SESSION["utilizador"] = $row["nomeUtilizador"];
            $_SESSION["tipo"] = $row["tipoUtilizador"];
        }
        else
        {   
            $_SESSION["utilizador"] = -1;
            $_SESSION["tipo"] = -1;
        }
        echo "<div id='loading'>Iniciando Sessão</div><script> setTimeout(function () { window.location.href = 'secreta.php'; }, 1000)</script>";	
    }
    else
    {
        session_destroy();
        header("refresh:0;url = ./pagina_inicial.php");
    }
?>