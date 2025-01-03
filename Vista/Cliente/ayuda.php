<?php include("validacion.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Ayuda</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- help-page -->
	<div class="faq-w3agile">
		<div class="container"> 
			<h2 class="w3_agile_header">Nos encanta aclarle las dudas a nuestros clientes</h2> 
			<ul class="faq">
				<li class="item1"><a href="#" title="click here">Al Agregar un producto me aparece "Por favor inicie sesion para realizar sus compras", que hago?</a>
					<ul>
						<li class="subitem1"><p> Cuando aparece este tipo de mensaje el cliente debe ir a sesion <a href="ingresar.php">Ingresar</a> y digitar su correspontiente correo, contraseña, y su roll Cliente.</p></li>										
					</ul>
				</li>
				<li class="item2"><a href="#" title="click here">Que hago si olvide la contraseña o mi correo?</a>
					<ul>
						<li class="subitem1"><p>Envia un mensaje en la sesion de <a href="contactenos.php">Contactenos</a> y espere una respuesta para volver a crear una cuenta con el mismo correo que tenia o cualquier otro.</p></li>										
					</ul>
				</li>
				<li class="item3"><a href="#" title="click here">Como puedo cambiar mis datos como direccion, correo, contraseña, etc?</a>
					<ul>
						<li class="subitem1"><p>Una vez hayas ingresado tendras que dar click donde dice "Bienvenido, (tu nombre)" y alli podras modificar tus datos.</p></li>										
					</ul>
				</li>
				<li class="item4"><a href="#" title="click here">Agrego los productos pero no se como realizar el pedido?</a>
					<ul>
						<li class="subitem1"><p>Una vez hayas agregado todos los productos que quiees, puedes ir a la seseion "Mis producto" y ahi podras ver todos los productos que has agregado, y en la parte inferior veras un boton que dice realizar pedido, al dar click alli tu pedido sera enviado.</p></li>										
					</ul>
				</li> 
				<li class="item5"><a href="#" title="click here">Que hago si mi pedido tarda mucho en llegar?</a>
					<ul>
						<li class="subitem1"><p>Envie un mensaje presentando la queja en la sesion <a href="contactenos.php">Contactenos</a> o llamenos.</p></li>										
					</ul>
				</li>
				<li class="item6"><a href="#" title="click here">Como puedo eliminar un producto que ya agregue ?</a>
					<ul>
						<li class="subitem1"><p>En la sesion "Mis productos" encontraras todos los productos que has agregado y en la parte derecha de cada producto donde esta la ( X ) podras quitarlo.</p></li>										
					</ul>
				</li>
				<li class="item7"><a href="#" title="click here">Como hago para cambiar la cantidad de un producto que ya agregue ?</a>
					<ul>
						<li class="subitem1"><p>Para cambiar la cantidad tendras que ir a "Mis Prductos" y darle en la ( x ) ubicada en la parte derecha de el producto al que vas a cambiar la cantidad, luego se quitara el producto, y tendras que ir a "Productos" buscar el producto, agregarlo y volver a poner la cantidad que deseas.</p></li>										
					</ul>
				</li>
				<li class="item8"><a href="#" title="click here">Como hago para saber donde esta ubicado el supermercado ?</a>
					<ul>
						<li class="subitem1"><p>En la sesion "Contactenos" podras encontrar un mapa con las indicaciones suficiente para que puedas visitar el supermercado..</p></li>										
					</ul>
				</li>
			</ul> 
			<!-- script for tabs -->
			<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.faq > li > ul'),
						   menu_a  = $('.faq > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>
			<!-- script for tabs -->   
		</div>
	</div>
<?php include("../footer.php");?>