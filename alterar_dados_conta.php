<html>
<head>
    <meta charset="UTF-8">
    <title>Alterar Dados Conta</title>
    <link rel="icon" href="icon.jpg">
</head>
<body>
</body>
</html>  
<?php
    session_start();
    if(isset($_SESSION["utilizador"]))
    {
        $password = $_GET["password"];
        $password_enc = md5($password);
        $email = $_GET["email"];
        $morada = $_GET["morada"];
        $telemovel = $_GET["telemovel"];
        $utilizador = $_SESSION["utilizador"];

        include '../basedados/basedados.h'; 
        mysqli_select_db($conn, "trabalho1");

        if(empty($password) && empty($email) && empty($morada) && empty($telemovel))
        {
            echo "<div id = 'loading'>Preencha pelo menos um campo.</div><script>setTimeout(function(){ window.location.href = 'gestao_conta.php'; }, 2000)</script>"; 
        }
        else
        {
            if(!(empty($password)))
            {
                $sql = "UPDATE utilizador SET pass = '$password_enc' WHERE nomeUtilizador = '$utilizador';";
                $retval = mysqli_query($conn, $sql) ;
            }
            if(!(empty($email)))
            {
                $sql = "UPDATE utilizador SET email = '$email' WHERE nomeUtilizador = '$utilizador';";
                $retval = mysqli_query($conn, $sql) ;
            }
            
            if(!(empty($morada)))
            {
                $sql = "UPDATE utilizador SET morada = '$morada' WHERE nomeUtilizador = '$utilizador';";
                $retval = mysqli_query($conn, $sql) ;
            }
            if(!(empty($telemovel)))
            {
                $sql = "UPDATE utilizador SET telemovel = '$telemovel' WHERE nomeUtilizador = '$utilizador';";
                $retval = mysqli_query($conn, $sql) ;
            }
            echo "<div id='loading'>Dados alterados com sucesso.</div><script> setTimeout(function () { window.location.href = 'area_utilizador.php'; }, 2000)</script>";
        }
    }
    else
    {
        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
    }
?>