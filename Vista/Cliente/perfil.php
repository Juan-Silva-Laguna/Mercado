<?php include("validacion.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Perfil</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
<div class="register">
		<div class="container">
			<h2>Actualizar mis datos personales</h2>
			<div class="login-form-grids">
				<h5>Datos Basicos</h5>
				<form action="#" method="post">
					<input type="text" id="nombre" placeholder="Nombre Completo" required=" " >
					<input type="number" id="numero" placeholder="Numero Celular" required=" " ><br>
					<input type="text" id="direccion" placeholder="Direccion" required=" " >				
					<h6>Datos de ingreso</h6>
					<input type="email" id="correo" placeholder="Correo Electronico" required=" " >
					<input type="password" id="password" placeholder="Contraseña.." required=" " >
					<input type="submit" id="actualizar" value="Actualizar">
				</form>
			</div>
		</div>
	</div>
<!-- //register -->
<?php include("../footer.php");?>