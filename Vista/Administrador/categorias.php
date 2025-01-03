<?php include("head.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Categorias</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categorias</h2>
					<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                        <form>						
						<input type="text" id="nombre_categoria" placeholder="Nombre Categoria" required=" " >
						<input type="hidden" id="id_categoria">
                            <input type="submit" value="Crear" id="btn_crear_categoria">
                        </form>
                    </div><br><br>
				</div>																																												
			</div>
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="search" name="Search" id="buscaCategoria" placeholder="Buscar Domiciliario..." required="">
					<button type="submit" id="btnBuscar_categoria" class="btn btn-default search" aria-label="Left Align">
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
<script src="../../Entorno/categorias.js"></script>
<?php include("../footer.php");?>