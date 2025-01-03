<?php include("validacion.php");?>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contactenos</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- contact -->
	<div class="about">
		<div class="w3_agileits_contact_grids">
			<div class="col-md-6 w3_agileits_contact_grid_left">
				<div class="agile_map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d637.3248764514893!2d-75.5677380406493!3d2.7415263731200916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b19983b1ef1a1%3A0xc549d009bad5949d!2sSuper%20Tienda%20Merkacentro!5e0!3m2!1ses-419!2sin!4v1598631921029!5m2!1ses-419!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="agileits_w3layouts_map_pos">
					<div class="agileits_w3layouts_map_pos1">
						<h3>Informacion De Contacto</h3>
						<p>Crr: 3 # 6- 41, Barrio la Candelaria.</p>
						<ul class="wthree_contact_info_address">
							<li><i class="fa fa-phone" aria-hidden="true"></i>310 799 8368</li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>314 475 4205</li>
						</ul>
						<div class="w3_agile_social_icons w3_agile_social_icons_contact">
							<ul>
								<li><a href="https://www.facebook.com/Super-tienda-merkacentro-teruel-105193504456623/" class="icon icon-cube agile_facebook"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 w3_agileits_contact_grid_right">
				<h2 class="w3_agile_header">Enviar Un<span> Mensaje</span></h2>

				<form id="frmContactar">
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="text" id="input-25" name="Name" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-25">
							<span class="input__label-content input__label-content--ichiro">Ingrese Su Nombre</span>
						</label>
					</span>
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="email" id="input-26" name="Email" placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-26">
							<span class="input__label-content input__label-content--ichiro">Ingrese Su Correo</span>
						</label>
					</span>
					<textarea name="Message" id="texto" placeholder="Por favor escriba aqui su mensaje..." required=""></textarea>
					<input type="submit" value="Enviar">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- contact --> 
<script src="../../Entorno/mensajes.js"></script>
<?php include("../footer.php");?>