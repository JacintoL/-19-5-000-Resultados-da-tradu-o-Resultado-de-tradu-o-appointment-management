<?php
    session_start();
    if(isset($_SESSION["utilizador"]))
    {
        include '../basedados/basedados.h'; 

        $data = $_POST["data"];
        $hora = $_POST["hora"];
	    $nLugares = $_POST["nLugares"];
		$nome = $_POST["nome"];
		$tel = $_POST["tel"];
		
        
        
        
    
        $sql = "INSERT INTO reserva (data, hora, nLugares, nome, tel) VALUES ('$data', '$hora','$nLugares','$nome', '$tel')";
    
		$retval = mysqli_query($conn, $sql);
    
        header("refresh:0;url = ./reserva.php");
    }
    else
    {
        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
    }    
?>