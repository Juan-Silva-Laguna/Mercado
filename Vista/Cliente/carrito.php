<?php include("validacion.php");?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Mis Productos</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Por compras mayores a <span> $50.000 </span> tendras gratis el domicilio</h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>	
							<th>Productos</th>
							<th>Cantidad</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Quitar</th>
						</tr>
					</thead>
					<tbody id="cuerpoTabla">
					</tbody>
				</table>
				<div class="text-center"><br>
				<h1 id="total"></h1>
				</div>
				
			</div>
			<div class="checkout-left">					
				<div class="checkout-right-basket" id="resalizarPedido">
					<a href="#"><i class="fa fa-trophy"></i> Realizar Pedido</a>
				</div>
				<div class="checkout-right-basket" id="borrarPedido">
					<a href="#"></span><i class="fa fa-trash-o"></i> Borrar Todo</a>
				</div>
				<div class="checkout-right-basket" id>
					<a href="productos.php"><i class="fa fa-shopping-cart"></i> Continuar Comprando</a>
				</div>
			</div>
			<div class="checkout-left" id="historialPedido">	
				
			</div>
		</div>
	</div>
<!-- //checkout -->
<script src="../../Entorno/domicilios.js"></script>
<?php include('../footer.php');?>