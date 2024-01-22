<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="registar.css">
    <link rel="icon" href="icon.jpg">
    <title>Novo Utilizador</title>
</head>
<body>
    <?php
        ob_start();
        session_start();

        if(isset($_SESSION["utilizador"]))
        {
            echo "<div class='navegacao'>
                    <a class='logotipo' href='pagina_inicial.php'>SUD Castelo Branco</a>
                    <div class='caixa-botoes'>
                        <div id='botao'>
                            <form action='./gestao_utilizadores.php'>
                                <input type='submit' value='Voltar'>
                            </form>
                        </div>
                    </div>
                </div>";
        }
        else
        {
            echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 2000)</script>";
        }
    ?>
    <div class="seccao">
        <?php
            if(isset($_SESSION["utilizador"]))
            {
                include '../basedados/basedados.h'; 
                include './const_utilizadores.php';

                $sql = "SELECT tipoUtilizador FROM utilizador WHERE nomeUtilizador = '".$_SESSION["utilizador"]."'";
                $retval = mysqli_query($conn, $sql);
                if(!$retval)
                {
                    die('Could not get data: ' . mysqli_error($conn));
                }
                $row = mysqli_fetch_array($retval);
                $tipoUtilizador = $row["tipoUtilizador"];
                $admin = true;
                if($tipoUtilizador!=ADMINISTRADOR)
                {
                    $admin = false;
                    echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 000)</script>";
                }
                if($admin)
                {
                    echo '
                    <div class="formulario">
                        <form action="criar_novo_utilizador.php" method="POST">
                            <h3>Novo Utilizador</h3>
                            <div class="input-div" id="input-user">
                                Nome de Utilizador:
                                <input type="text" name="utilizador"/>
                            </div>
                            <div class="input-div" id="input-user">
                                Password:
                                <input type="password" name="password"/>
                            </div> 
                            <div class="input-div" id="input-user">
                                Email:
                                <input type="text" name="email"/>
                            </div>
                            
                            <div class="input-div" id="input-user">
                                Morada:
                                <input type="text" name="morada"/>
                            </div>
                            <div class="input-div" id="input-user">
                                Telemóvel:
                                <input type="text" name="telemovel"/>
                            </div>
                            <input class="botao" type="submit" value ="Registar">
                        </form>
                    </div>';
                }
            }
            else
            {
                echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
            }
        ?>
    </div>
</body>
</html>