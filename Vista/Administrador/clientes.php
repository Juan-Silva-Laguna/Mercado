<?php include("head.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Clientes</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="w3l_search">
					<form action="#" method="post">
						<input type="search" name="Search" id="buscaNombre" placeholder="Buscar Cliente..." required="">
						<button type="submit" id="btnBuscar" value="1" class="btn btn-default search" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
						<div class="clearfix"></div>
					</form>
				</div>
			<div class="col-md-12 products-right">
				<div class="products-right-grid">
				</div>
				<div class="agile_top_brands_grids"  id="padre"></div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->
<?php include("../footer.php");?>