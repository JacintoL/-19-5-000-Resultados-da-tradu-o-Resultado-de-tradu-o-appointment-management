<?php
    session_start();
    if(isset($_SESSION["utilizador"]))
    {
        include '../basedados/basedados.h'; 

        $nome = $_POST["nome"];
        $data = $_POST["data"];
        $hora = $_POST["hora"];
		$nLugares = $_POST["nLugares"];

        $sql = "UPDATE reserva SET data = '$data' WHERE nome = '$nome'";
        $retval = mysqli_query($conn, $sql) ;
        $sql = "UPDATE reserva SET hora = '$hora' WHERE nome = '$nome'";
        $retval = mysqli_query($conn, $sql) ;
		$sql = "UPDATE reserva SET nLugares = '$nLugares' WHERE nome = '$nome'";
		$retval = mysqli_query($conn, $sql) ;
		
        echo "<script>setTimeout(function(){ window.location.href = 'reserva.php'; }, 0)</script>";
    }
    else
    {
        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
    }
?>