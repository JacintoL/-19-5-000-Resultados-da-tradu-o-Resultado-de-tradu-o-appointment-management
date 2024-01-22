<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="gestao_utilizadores.css">
    <link rel="stylesheet" href="gestao_marcacoes.css">
    <link rel="icon" href="icon.jpg">
    <title>Marcações</title>
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
                    <th>nome:</th>
                    <th>Data:</th>
                    <th>Hora:</th>
                    <th>Nlugares:</th>
                    <th>telemovel:</th>
                    <th>Alterar:</th>
                    <th>Cancelar:</th>
                </tr>";
            while($row = mysqli_fetch_array($retval))
            {
                echo "
                <tr>
                    <td>".$row["nome"]."</td>
                    <td>".$row["data"]."</td>
                    <td>".$row["hora"]."</td>
                    <td>".$row["nLugares"]."</td>  
                    <td>".$row["tel"]."</td>
                ";
    
                //ALTERAR MARCACAO
                echo "<td><a href='./alterar_marcacao.php?idMarcacao=".$row["nome"]."'  ><img src='editar.png' width=25 height=25></a></td>";  
    
                //APAGAR MARCACAO
                echo "<td><a href='./apagar_marcacao.php?idMarcacao=".$row["tel"]."'  ><img src='apaga.png' width=25 height=25></a></td>"; 
                echo"</tr>";  
            }
        }
        else
        {
            header("refresh:0;url = ./pagina_inicial.php");
        }
       
    ?>
</body>