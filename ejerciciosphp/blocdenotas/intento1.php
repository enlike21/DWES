<?php session_start(); 
	if (!isset($_SESSION["valor"])){
		$_SESSION["valor"]=0;
	}
	else if($_SESSION["valor"]<0){
		echo "El valor no puede ser menor que 0";
		$_SESSION["valor"]=0;
	}
?>
<html>
<header>
<title>Intento1</title>
</header>
<body>
	<form method="post" action="intento2.php">
		<fieldset>
			<input name="botones" type="submit" value="subir"></input>
			<?php echo $_SESSION["valor"]?>
			<input name="botones" type="submit" value="bajar"></input>
			<input name="botones" type="submit" value="poneracero"></input>
		</fieldset>
	</form>
</body>
</html>
