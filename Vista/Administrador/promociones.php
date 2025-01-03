<?php include("head.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">¨Promociones</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>¨Promociones</h2>
					<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                        <form id="frmProducto">
							<input type="hidden" id="id_producto">
							<div id="img"></div>
							<input type="text" id="promoProducto" placeholder="Busque El producto" required=" " list="promoProductos">
							<datalist id="promoProductos">
							</datalist><br>
							<input type="number" id="descuento" placeholder="% a descontar?" required=" ">
                            <input type="submit" id="realizar_promo" value="Realizar">
                        </form>
                    </div><br><br>
				</div>																																												
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