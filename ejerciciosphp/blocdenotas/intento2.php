<?php
session_start();
$valorsesion=$_SESSION["valor"];
$action=$_POST["botones"];
	if (isset($_POST["botones"])){
		if($action=="subir"){
			$valorsesion+=1;
		}
		else if ($action=="bajar"){
				$valorsesion-=1;
		}
		elseif ($action=="poneracero"){
			if($valorsesion==0){
				echo "El valor ya es 0";
			}
			else{
				$valorsesion=0;
			}
		}
	}

	$_SESSION["valor"]=$valorsesion;
	header("location:intento1.php");
	exit();
?>