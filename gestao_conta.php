<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="gestao_conta.css">
    <link rel="icon" href="icon.jpg">
    <title>Gerir Conta</title>
</head>
<body>
    <?php
        ob_start();
        session_start();

        if(isset($_SESSION["utilizador"]))
        {
            echo '
            <div class="navegacao">
                <a class="logotipo" href="pagina_inicial.php">SUD Castelo Branco</a>
                <div class="caixa-botoes">
                    <div id="botao">
                        <form action="./area_utilizador.php">
                            <input type="submit" value="Voltar">
                        </form>
                    </div>
                </div>
            </div>';
            echo '
            <div class="seccao">
                <h1>Gerir Dados Pessoais</h1>
                <h2>Altere aqui os seus dados pessoais</h2>
        
                <div class="formulario">
                    <form action="alterar_dados_conta.php" method="GET">
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
                        <input class="botao" type="submit" value ="Guardar Alterações">
                    </form>
                </div>
            </div>
            ';
        }
        else
        {
            echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
        }  
    ?>
</body>
</html>