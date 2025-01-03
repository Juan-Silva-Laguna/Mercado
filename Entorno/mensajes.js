$(document).ready(function(){  
    let url = $(location).attr('pathname');
    if (url == "/web/Vista/Administrador/mensajes.php") {
        mostrar();  
    }
    //----------------------Eventos-----------------

      $('#frmContactar').submit(function (event) {
        event.preventDefault(); 
        let datos = { 
            nombre: $('#input-25').val(),
            correo: $('#input-26').val(),
            mensaje: $('#texto').val(),
            operacion: "enviar"
        };
        $.post('../../controlador/mensajes.controlador.php', datos, function (respuesta) {
            alert(respuesta);
            $('#input-25').val("");
            $('#input-26').val("");
            $('#texto').val("");
        })
      });

      $(document).on('click','#btnBorrarMensaje',function (event) {
        event.preventDefault(); 
        $.post('../../controlador/mensajes.controlador.php', {id: $(this).val(),operacion: "eliminar"}, function (respuesta) {
            alert(respuesta);
            mostrar();
        })
      });

    //---------------------------Funciones------------------------------
    function mostrar(){
        $.post('../../controlador/mensajes.controlador.php', {operacion: 'mostrar'}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let template = '';
            datos.forEach(dato => {
                template += `
                <div class="col-md-4 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">		
												<p><b>Nombre: </b>${dato.nombre}</p>
                                                <p><b>Correo: </b>${dato.correo}</p>
                                                <p><b>Mensaje: </b>${dato.mensaje}<p>
                                                <button class="btn btn-danger" value="${dato.id_mensaje}" id="btnBorrarMensaje"><i class="fa fa-trash-o"></i> Borrar Mensaje</button>
                                            </div>                                            
										</div>
									</figure>
								</div>
							</div>
						</div><br>
					</div>
                `;
            })
            $('#padreMensajes').html(template);	
        })        
    }
    function limpiar() {
        $('#nombre_categoria').val(""); 
        $('#id_categoria').val("");
    }

});
