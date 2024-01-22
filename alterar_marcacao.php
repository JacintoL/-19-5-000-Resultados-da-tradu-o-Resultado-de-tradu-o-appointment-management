<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="gestao_conta.css">
    <link rel="stylesheet" href="alterar_marcacao.css">
    <link rel="icon" href="icon.jpg">
    <title>Alterar reserva</title>
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
                <h1>Gerir Esta Marcação</h1>
                <h2>Mude o horário, data ou nº de pessoas</h2>
				
                <div class="formulario">
                    <form action="alterar_dados_marcacao.php" method="POST">
					
					<div class="input-div" id="input-user">
                            Nome:
                            <input type="text" name="nome"/>
                        </div>
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
                            Número de lugares:
                            <select name="nLugares">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                            </select>
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