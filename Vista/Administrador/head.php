<?php
	session_start();
	if ($_SESSION['rol'] != 3) {
        header('Location: ../Cliente/index.php');
    }
?><!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../../js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../../js/move-top.js"></script>
<script type="text/javascript" src="../../js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body style="background-color: rgba(0,0,0,0.1);">
<!-- header -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left1 text-center">
				<ul class="phone_email">
					<a href="perfil.php"><h4><i class="fa fa-user" aria-hidden="true"></i> Bienvenido, <?php echo $_SESSION['nombre'];?></h4></a>
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="../../index.html"><img src="../../images/logo.png" alt=""></a></h1>
			</div>
			<div class="w3ls_logo_products_left1 text-center">
				<ul id="salir" class="phone_email">
					<a href=""><h4><i class="fa fa-power-off" aria-hidden="true"></i> Cerrar Sesion</h4></a>

				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default" >
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li><a href="domicilios.php"> Domicilios </a></li>	
									<li><a href="categorias.php"> Categorias </a></li>	
									<li><a href="productos.php"> Productos </a></li>
									<li><a href="domiciliarios.php" id="domiciliarios"> Domiciliarios </a></li>	
									<li><a href="promociones.php"> Promociones </a></li>
									<li><a href="clientes.php"> Clientes </a></li>
									<li><a href="mensajes.php"> Mensajes </a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->