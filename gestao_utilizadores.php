<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="gestao_utilizadores.css">
    <link rel="icon" href="icon.jpg">
    <title>Gerir Utilizadores</title>
</head>
<body>
    <?php
        ob_start();
        session_start();

        if(isset($_SESSION["utilizador"]))
        {
            echo "<div class='navegacao'>
                    <a class='logotipo' href='pagina_inicial.php'>SUD Castelo branco</a>
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
            echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
        }
    ?>  
    <div class="seccao">
        <form action="./novo_utilizador.php">
		    <input type='submit' value='Novo Utilizador'>
	    </form>
        <div class="tabela">
            <?php
                if(isset($_SESSION["utilizador"]))
                {
                    include '../basedados/basedados.h'; 
                    include './const_utilizadores.php';

                    $sql = "SELECT tipoUtilizador FROM utilizador WHERE nomeUtilizador= '".$_SESSION["utilizador"]."'";
                    $retval = mysqli_query($conn, $sql);
                    if(!$retval)
                    {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    $row = mysqli_fetch_array($retval);
                    $tipoUtilizador = $row["tipoUtilizador"];

                    $pode = true;

                    if($tipoUtilizador != ADMINISTRADOR)
                    {
                        $pode = false;
                        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 000)</script>";
                    }
                    if($pode)
                    {
                        $sql = "SELECT * FROM utilizador";
                        $retval = mysqli_query($conn, $sql);
                        if(!$retval)
                        {
                            die('Could not get data: ' . mysqli_error($conn));
                        }

                        echo "<table width='100%' id = 't01'>
					    <tr>
                            <th>Nome Utilizador:</th>
                            <th>Tipo:</th>
                            <th>Telemóvel:</th>
                            <th>Validar:</th>
                            <th>Apagar:</th>
                        </tr>";
                        while($row = mysqli_fetch_array($retval))
                        {
                            echo"
                            <tr>
                                <td>".$row["nomeUtilizador"]."</td>
							    <td>".getDescricaoUtilizador($row["tipoUtilizador"])."</td>
							    <td>".$row["telemovel"]  ."</td>";  
                            
                            //VALIDAR
                            if($row["tipoUtilizador"] == CLIENTE_NAO_VALIDO)  
                                echo "<td><a href='./valida.php?IdUser=".$row["nomeUtilizador"]."' ><img src='./validar.png' width=25 height=25></a></td>";   
                            else
                                echo"<td></td>";

                            //APAGAR
                            if($row["tipoUtilizador"] != CLIENTE_APAGADO)  
                                echo "<td><a href='./apaga_utilizador.php?IdUser=".$row["nomeUtilizador"]."' ><img src='apaga.png' width=25 height=25></a></td>";   
                            else
                                echo"<td></td>";
                            
                            echo "</tr>";	
                        }
                        echo"</table>";
                    }
                }
                else
                {
                    echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
                }
                function getDescricaoUtilizador($tipoNumerico)
                {				
                    switch($tipoNumerico)
                    {
                        case ADMINISTRADOR:
                            return "Administrador";
                        break;
                        case CLIENTE:
                            return "Cliente validado";
                        break;
                        case CHEFE_MESA:
                            return "chefe_mesa";
                        break;
                        case CLIENTE_APAGADO:
                            return "Utilizador apagado";
                        break;
                        case CLIENTE_NAO_VALIDO:
                            return "Cliente não validado";
                        break;
                        default:
                            return "Desconhecido";
                        break;
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>