<?php include("head.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Domiciliarios</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Domiciliarios</h2>
					<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                        <form>						
						<input type="number" id="identidad" placeholder="Numero identidad" required=" " >
						<input type="text" id="nombre" placeholder="Nombre Completo" required=" " >
						<input type="number" id="numero" placeholder="Numero Celular" required=" " ><br>
						<input type="text" id="direccion" placeholder="Direccion" required=" " ><br>
						<input type="email" id="correo" placeholder="Correo Electronico" required=" " >
						<input type="hidden" id="password" value="" >
						<input type="hidden" id="rol" value="2" >
						<input type="hidden" id="id">
                            <input type="submit" value="Registrar" id="btn_registrar">
                        </form>
                    </div><br><br>
				</div>																																												
			</div>
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="search" name="Search" id="buscaNombre" placeholder="Buscar Domiciliario..." required="">
					<button type="submit" id="btnBuscar" value="2" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>
			<div class="col-md-8 products-right">				
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="agile_top_brands_grids" id="padre">
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->
<?php include("../footer.php");?>