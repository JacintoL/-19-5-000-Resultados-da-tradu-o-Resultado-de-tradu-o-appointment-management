<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="nova_marcacao.css">
    <link rel="icon" href="icon.jpg">
    <title>Nova Marcação</title>
</head>
<body>
    <?php
        ob_start();
        session_start();

        if(isset($_SESSION["utilizador"]) && $_SESSION["tipo"] == 3)
        {
            echo "<div class='navegacao'>
                    <a class='logotipo' href='pagina_inicial.php'>SUD Castelo Branco</a>
                    <div class='caixa-botoes'>
                        <div id='botao'>
                            <form action='./area_utilizador.php'>
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
                echo '
                <div class="formulario">
                    <form action="criar_nova_marcacao.php" method="POST">
                        <h3>Nova Marcação</h3>
                        <div class="input-div" id="input-user">
                            Data:
                            <input type="date" name="data"/>
                        </div>
                        <div class="input-div" id="input-user">
                            Hora:
							<select name="hora">
                                <option value="11:30h-">11:30h</option>
                                <option value="12:30h-">12:30h</option>
							    <option value="13:30h-">13:30h</option>
							    <option value="14:30h-">14:30h</option>
                            </select>
                            
							
                        </div>
                        <div class="input-div" id="input-user">
                            Nome:
                            <input type="text" name="nome"/>
                        </div>
                      
                        <div class="input-div" id="input-user">
                            Número de lugares:
                            <select name="nLugares">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                            </select>
                        </div>
						
						<div class="input-div" id="input-user">
                            Telemóvel:
                            <input type="text" name="tel"/>
                        </div>
                        <input class="botao" type="submit" value ="Criar Marcação">
                    </form>
                </div>';
            }
            else
            {
                echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
            }
        ?>
    </div>
</body>
</html>