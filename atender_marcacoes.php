<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="gestao_utilizadores.css">
    <link rel="icon" href="icon.jpg">
    <title> Atender marcacoes</title>
</head>
<body>
    <?php
        session_start();

        if(isset($_SESSION["utilizador"]))
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
        <div class="tabela">
            <?php
                if(isset($_SESSION["utilizador"]))
                {
                    include '../basedados/basedados.h'; 
                    $utilizador = $_SESSION["utilizador"];

                    $sql = "SELECT * FROM reserva";
                    $retval = mysqli_query($conn, $sql);

                    if(!$retval)
                    {
                        die('Could not get data: ' . mysqli_error($conn));
                    }

                    echo "<table width='100%' id = 't01'>
                        <tr>
                            <th>Data:</th>
                            <th>Hora:</th>
                            <th>Nº lugares</th>
                            <th>Nome:</th>
							<th>Telemóvel:</th>
                            <th>Atender:</th>
                        </tr>";
                    while($row = mysqli_fetch_array($retval))
                    {
                        echo "
                        <tr>
                            <td>".$row["data"]."</td>
                            <td>".$row["hora"]."</td>
                            <td>".$row["nLugares"]."</td>
							<td>".$row["nome"]."</td>
							<td>".$row["tel"]."</td>  
                          
                        ";

                        //ATENDER MARCACAO
                        echo "<td><a href='./apagar_marcacao.php?idMarcacao=".$row["nome"]."'><img src='validar.png' width=25 height=25></a></td>"; 
                        echo"</tr>";  
                    }
                    echo"</table>";
                }
                else
                {
                    echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 2000)</script>";
                }
            ?>
        </div>
    </div>
</body>
</html>