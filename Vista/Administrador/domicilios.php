<?php include("head.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Domicilios</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-12 products-right">
				<div class="products-right-grid">
					<b>
					<input type="radio" name="mostrarTodo" value="1" id="porhacer" style="margin-left: 120px;" checked>
					Domicilios Por Hacer
					<input type="radio" name="mostrarTodo" value="2" id="enproceso" style="margin-left: 130px;">
					Domicilios En Proceso
					<input type="radio" name="mostrarTodo" value="3" id="realizados" style="margin-left: 140px;">
					Domicilios Realizados
					</b>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-12 products-right">				
					<div class="products-right-grid">
						<div class="products-right-grids">
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="agile_top_brands_grids" id="padreDomicilios">
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->
<script src="../../Entorno/domicilios.js"></script>
<?php include("../footer.php");?>