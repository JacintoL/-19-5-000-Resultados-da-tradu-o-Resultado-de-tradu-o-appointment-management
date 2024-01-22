<html>
<head>
</head>
<body> 
    <?php
        session_start();

        if(!isset($_SESSION["utilizador"]) || !isset($_SESSION["tipo"]))
        {
            $_SESSION["bt"] = "Página Login";
            $_SESSION["erro"] = "Algo correu mal. Dirija-se para a Página de Login ou Registe-se";
            $_SESSION["dir"] = "./login.php";
            echo "<script>  setTimeout(function () { window.location.href = './mensagem_erro.php'; }, 0000)</script>";	
        }
        else
        {
            include "./const_utilizadores.php";
            if($_SESSION["tipo"] == CLIENTE_NAO_VALIDO)
            {
                $_SESSION["bt"] = "Voltar";
                $_SESSION["erro"] = "Conta Ainda Não Validada.<br>Por favor, tente mais tarde.";
                $_SESSION["dir"] = "./login.php";
                echo "<script>  setTimeout(function () { window.location.href = './mensagem_erro.php'; }, 0000)</script>";	
            }
            else if($_SESSION["utilizador"]== -1 || $_SESSION["tipo"] == -1)
            {
                $_SESSION["bt"] = "Voltar";
                $_SESSION["erro"] = "Combinação inválida.<br>Por favor, preencha todos os campos corretamente.";
                $_SESSION["dir"] = "./login.php";
                echo "<script>  setTimeout(function () { window.location.href = './mensagem_erro.php'; }, 0000)</script>";	
            }
            else
            {
                echo " <script> alert ('Login Com Sucesso') </script>";
                echo "<script>  setTimeout(function () { window.location.href = './area_utilizador.php'; }, 0000)</script>";	
            }
        }
    ?>
</body>
</html>