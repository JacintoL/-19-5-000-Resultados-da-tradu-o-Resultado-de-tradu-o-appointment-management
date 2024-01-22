<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="pagina_inicial.css">
    <link rel="icon" href="icon.jpg">
    <title>SUD Castelo Branco</title>
</head>
<body>
    <div class="navegacao">
        <a class="logotipo" href="pagina_inicial.php">SUD Castelo Branco</a>
        <div class="caixa-botoes">
            <?php
            ob_start();
            session_start();
            if(isset($_SESSION["utilizador"]))
            {
                $user = $_SESSION["utilizador"];
                unset($_SESSION);
                $_SESSION["utilizador"] = $user;
                
                echo "
                <div id='botao'>
                    <form action='./logout.php'>
                        <input type='submit' value='Terminar Sessão'>
                    </form>
                </div>
                <div id='botao'>
                    <form action='./area_utilizador.php'>
                        <input type='submit' value='A Minha Conta'>
                    </form>
                </div>
                ";
            }
            else{
                echo "
                <div id='botao'>
                    <form action='./login.php'>
                        <input type='submit' value='Login'>
                    </form>
                </div>
                <div id='botao'>
                    <form action='./registar.php'>
                        <input type='submit' value='Registar'>
                    </form>
                </div>
                ";
            }
            ?>
        </div>
    </div>
    <div class="seccao">
        <h1>Bem Vindo Ao Nosso Restaurante Reservas Online</h1>
        <h2>Para efetuar a reserva, registe-se no nosso website</h2>
        <h3>O Nosso Menu</h3>
		 
				
        <p>
				<b>Lombo de Novilho Corado-	</b>	 				 48,00 €<br />
				<br>
				<b>Supremo de Pintada Com Cognac- </b>				 34,00 €<br />
				<br>
				<b>Coxa de Cabrito, Cremoso Trufado de Batata-</b>	 42,00 €<br />
				<br>
				<b>Peixe Galo Meuniere-		</b>				 	 39,00 €<br />
          
        </p>
		
        <h3>Um conceito único SUD Castelo Branco e infinitas formas de vivenciar </br>
		<center>	experiências luxury .</center>
		
			</h3>
        <p>
              
        </p>
        <h3>Horário de funcionamento</h3>
        <p>
			<b>Segunda-feira</b>	11:30h - 15:30h<br /> 
			<br>
			<b>	Terça-feira	</b>	11:30h - 15:30h<br /> 
			<br>
			<b>Quarta-feira </b>	11:30h - 15:30h<br />
<br>			
			<b>Quinta-feira </b>	11:30h - 15:30h<br /> 
			<br>
			<b>	Sexta-feira	</b>	11:30h - 15:30h<br /> 
			<br>
			<b>	Sábado		</b>	11:30h - 15:30h<br /> 
			<br>
			<b>	Domingo	    </b>	11:30h - 15:30h<br />
            <br>
           
        </p>
    </div>
    <footer>
        <div class="footer-esquerda">
            <h3>Reservas Online<x/h3>
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
            <h2 class="footer-titulo">Contacto</h2>
            <p class="footer-texto">
                211 592 700
                <br>
              
			  <h2 class="footer-titulo">Website</h2>
			    <p class="footer-texto">
				SUDCasteloBranco.com
            </p>
        </div>
    </footer>
</body>
</html>