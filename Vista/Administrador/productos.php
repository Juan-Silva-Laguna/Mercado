<?php include("head.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Productos</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Productos</h2>
					<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                        <form id="frmProducto">
							<input type="hidden" id="id_producto">
							<div id="img"></div>
							<label for="imagen" style="background-color: rgba(0,0,0,0.1);cursor: pointer;padding: 5px 10px !important;text-align: center;">Elegir Imagen <i class="fa fa-hand-o-up"></i></label>
							<input type="file" name="archivoImage" id="imagen" max="1" accept=".jpg,.jpeg,.png" style="opacity: 0;position: absolute;"><br><br>
							<input type="text" id="nombre_producto" placeholder="Nombre de Producto" required=" " ><br>
							<input type="text" id="precio_producto" placeholder="Precio de Producto" required=" " ><br>
							<input type="text" id="categoria" placeholder="Escoga Categoria" required=" " list="categorias">
							<datalist id="categorias">
							</datalist>
                            <input type="submit" id="crear_producto" value="Crear">
                        </form>
                    </div><br><br>
				</div>																																												
			</div>
			<h2 id="titCateg" data-index-number=""></h2>
			<div class="text-right">
				<input type="search" id="categoriaFiltro" placeholder="Filtrar por Categoria" required=" " list="categorias" style="height: 40px;margin-bottom: 10px;">
				<datalist id="categorias">
				</datalist>
				<input type="search" id="buscarProducto" placeholder="Buscar Producto..." required="" style="height: 40px;">
				<button type="submit" id="btnBuscarProducto" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
			</div>
			<div class="col-md-8 products-right">				
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="agile_top_brands_grids" id="padreProductos">
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->
<script src="../../Entorno/productos.js"></script>
<?php include("../footer.php");?>