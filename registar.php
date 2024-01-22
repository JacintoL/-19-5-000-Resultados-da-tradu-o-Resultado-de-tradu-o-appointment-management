<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="registar.css">
    <link rel="icon" href="icon.jpg">
    <title> Registar</title>
</head>
<body>
    <div class="navegacao">
    <a class="logotipo" href="pagina_inicial.php">SUD Castelo Branco</a>
        <div class="caixa-botoes">
            <div id='botao'>
                <form action='login.php'>
                    <input type='submit' value='Login'>
                </form>
            </div>
            <div id='botao'>
                <form action='registar.php'>
                    <input type='submit' value='Registar'>
                </form>
            </div>
        </div>
    </div>
    <div class="formulario">
        <form action="fazer_registo.php" method="GET">
        <h3>Criar Novo Registo</h3>
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
        <br>
        <a href="login.php">Já estou registado</a>
        </form>
    </div>
    <footer>
        <div class="footer-esquerda">
            <h3>SUD Castelo Branco<x/h3>
            <p class="footer-links">
                <a href="pagina_inicial.php">Página Inicial</a>
                <a href="registar.php">Registar</a>
                <a href="login.php">Login</a>
            </p>
        </div>
        <div class="footer-direita">
            <h2 class="footer-titulo">Localização</h2>
            <p class="footer-texto">
                 Impasse Pedro Alvito, Castelo Branco
                <br>
					6000-028
            </p>
            <h2 class="footer-titulo">Contacto </h2>
            <p class="footer-texto">
                 211 592 700
                <br>
                
            </p>
			<h2 class="footer-titulo">Website </h2>
            <p class="footer-texto">
                 SUDCasteloBranco.com
                <br>
                
            </p>
			
        </div>
    </footer>
</body>
</html>