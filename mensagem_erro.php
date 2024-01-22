<html>
<head>
<body>
<?php
    session_start();

    $msg = "Algo não correu bem. Dirija-se para a página de Login ou de Registo";
	$btn = "Página Login";
	$dir = "login.php";

    if(isset($_SESSION["erro"]))
		$msg = $_SESSION["erro"];
	if(isset($_SESSION["bt"]))
		$btn = $_SESSION["bt"];
	if(isset($_SESSION["dir"]))
		$dir = $_SESSION["dir"];

    echo "
	<div id='erro-box'>
		<div id='erro-cabecalho'>Lamentamos...</div>
 
		<div class='input-div' id='input-user'>
		    $msg
		</div> 
    <!--=====================Login=====================-->
		<form action='".$dir."'>
			<div id='acoes'>
				<input type='submit' value ='".$btn."'>
				<div id = 'registo'><a href='./registar.php'>Registe-se...</a></div>
			</div>
		</form>
    </div>";
    session_destroy();
?>
</body>	
</html>
