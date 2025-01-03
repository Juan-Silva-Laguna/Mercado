<?php
	error_reporting(0);
	session_start();
	switch ($_SESSION['rol']) {
		case 1:
			include('headLogeado.php');
			break;
		case 2:
			header('Location: ../Domiciliario/porHacer.php');
			break;
		case 3:
			header('Location: ../Administrador/domicilios.php');
			break;		
		default:
			include('head.php');
			break;
	}
?>