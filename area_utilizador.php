<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="area_utilizador.css">
    <link rel="icon" href="icon.jpg">
    <title>SUD Castelo Branco</title>
</head>
<body>
    <div class="navegacao">
    <a class="logotipo" href="pagina_inicial.php">SUD  Castelo Branco</a>
        <div class="caixa-botoes">
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
        </div>
    </div> 

    <div class="seccao">
    <?php
        session_start();

        if(isset($_SESSION["utilizador"]))
        {
            $utilizador = $_SESSION["utilizador"];
            unset($_SESSION);
            $_SESSION["utilizador"] = $utilizador;

            include '../basedados/basedados.h'; 
            include './const_utilizadores.php';

            $sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '".$_SESSION["utilizador"]."'";
            $retval = mysqli_query($conn, $sql);
            if(!$retval)
            {
                die('Could not get data: '. mysqli_error($conn));
            }
            $row = mysqli_fetch_array($retval);

            if($row["tipoUtilizador"]!=CLIENTE_NAO_VALIDO && $row["tipoUtilizador"]!=CLIENTE_APAGADO)
            {
                switch($row["tipoUtilizador"])
                {
                    case ADMINISTRADOR:
                        printGestaoUtilizadores();
                        printGestaoMarcacoes();
                        printGestaoConta();
                    break;

                    case CLIENTE:
                        printGestaoReservas();
                        printGestaoConta();
                    break;

                    case CHEFE_MESA:
                        printAtenderMarcacoes();
                        printGestaoConta();
                    break;
                }
            }
            else
            {
                echo "<script>setTimeout(function(){ window.location.href = './logout.php'; }, 0)</script>";
            }
        }
        else
        {
            echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
        }

        function printGestaoReservas()
        {
            echo
            "<div class='botao'>
                <form action='./reserva.php'>
                    <input type='submit' value='Gerir Reserva'>
                </form>
			</div>
            ";
        }

        function printGestaoConta()
        {
            echo
            "<div class='botao'>
                <form action='./gestao_conta.php'>
                    <input type='submit' value='Gerir Minha Conta'>
                </form>
			</div>
            ";
        }

        function printGestaoUtilizadores()
        {
            echo
            "<div class='botao'>
                <form action='./gestao_utilizadores.php'>
                    <input type='submit' value='Gerir Utilizadores'>
                </form>
			</div>
            ";
        }

        function printGestaoMarcacoes()
        {
            echo
            "<div class='botao'>
                <form action='./gestao_marcacoes.php'>
                    <input type='submit' value='Gerir Marcações'>
                </form>
			</div>
            ";
        }

        function printAtenderMarcacoes()
        {
            echo
            "<div class='botao'>
                <form action='./atender_marcacoes.php'>
                    <input type='submit' value='Atender Marcações'>
                </form>
			</div>
            ";
        }
    ?>
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
			
			
        </div>
    </footer>
</body>
</html>