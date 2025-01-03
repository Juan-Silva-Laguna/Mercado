$(document).ready(function(){  
    if ($(location).attr('pathname') == "/web/Vista/Cliente/carrito.php") {
        mostrar();  
    }else if ($(location).attr('pathname') == "/web/Vista/Domiciliario/porHacer.php") {
        mostrarPorHcer();
    }
    else if ($(location).attr('pathname') == "/web/Vista/Domiciliario/enProceso.php") {
        mostrarEnProceso();
    }
    else if ($(location).attr('pathname') == "/web/Vista/Domiciliario/realizados.php") {
        mostrarRealizados();
    }
    else if ($(location).attr('pathname') == "/web/Vista/Administrador/domicilios.php") {
        mostrarTodo(1);  
    }

    $(document).on('click', '#mod', function (e) {
       e.preventDefault();
       $('#exampleModalLong').attr('aria-hidden', false);
       $('#exampleModalLong').attr('style', 'display: block;');
       $.post('../../controlador/domicilios.controlador.php', {operacion: 'modalPorHacer', id: $(this).val()}, function (respuesta) {
        console.log(respuesta);
        let datos = JSON.parse(respuesta);
        let template='',i=0;
        datos.forEach(dato => {
            template += `
                    <h5>Peddido del cliente ${dato.nombre}<h5><br>
                    <h5>Direccion: ${dato.direccion}<h5><br>
                    <h5>Celular: ${dato.celular}<h5><br>
                    <ul class="list-group">`;
                        let datosArray = dato.carrito.split(','),tot=0;
                        for (let i=1; i < datosArray.length; i=i+5) {  
                            tot+=Number(datosArray[i+2])*Number(datosArray[i+4]);                       
                            template += `<li class="list-group-item">${datosArray[i+4]} de ${datosArray[i+1]} <span class="badge">$${Number(datosArray[i+2])*Number(datosArray[i+4])}</span></li>`;
                        }
                    template += `
                        <li class="list-group-item"> Domicilio  <span class="badge">
                        ${tot>50000 ? 'Gratis':'$4000'}
                        </span></li>
                    </ul>
                    <b>Total de $${tot>50000 ? tot: tot+4000}<b>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="realizarEncargo" value="${dato.id_domicilio}">Realizar Pedido</button>
                    </div>
                `;       
            });
            $('.modal-body').html(template);
        });
    });

    $("input[name=mostrarTodo]").click(function () {    
        mostrarTodo($('input:radio[name=mostrarTodo]:checked').val());                
    });


    //----------------------Eventos------------------
        $(document).on('click','#realizarEncargo',function (e) {
            e.preventDefault();
            const datos = {
                id: $(this).val(),
                operacion: 'realizarEncargo'
            };
            $.post('../../controlador/domicilios.controlador.php', datos, function (respuesta) {
                alert(respuesta);
                mostrarPorHcer();
            })
        });

      $('#frmContactar').submit(function (event) {
        event.preventDefault(); 
        let datos = { 
            nombre: $('#input-25').val(),
            correo: $('#input-26').val(),
            mensaje: $('#texto').val(),
            operacion: "enviar"
        };
        $.post('../../controlador/domicilis.controlador.php', datos, function (respuesta) {
            alert(respuesta);
            $('#input-25').val("");
            $('#input-26').val("");
            $('#texto').val("");
        });
      });

      $(document).on('click','.close1',function (event) {
        event.preventDefault();   
        let id=$(this).attr('id'); 
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'mostrar'}, function (respuesta) {
            let datos = JSON.parse(respuesta);
            let datosArray = datos.split(',');
            let indice = datosArray.indexOf(id); 
            datosArray.splice(indice, 5);
            let nuevo = datosArray.toString();
            actualiza(nuevo);
        });

        function actualiza(datos) {
            $.post('../../controlador/domicilios.controlador.php', {carrito: datos,operacion: "remover"}, function (respuesta) {
                alert(respuesta);
                mostrar();
            });
        }
      });

      $(document).on('click', '#resalizarPedido', function (e) {
         e.preventDefault();
         $.post('../../controlador/domicilios.controlador.php', {operacion: 'realizar'}, function (respuesta) {
            alert(respuesta);
        })
      });
      $(document).on('click', '#borrarPedido', function (e) {
          if (confirm("Seguro de elimnar todos los productos de el carrito")) {
            $.post('../../controlador/domicilios.controlador.php', {operacion: 'borrarTodo'}, function (respuesta) {
                alert(respuesta);
            });
          }
        e.preventDefault();
     });
     
     $(document).on('click','#terminarProeceso',function (e) {
        e.preventDefault();
        const datos = {
            id: $(this).val(),
            operacion: 'terminarProceso'
        };
        $.post('../../controlador/domicilios.controlador.php', datos, function (respuesta) {
            alert(respuesta);
            mostrarEnProceso();
        })
    });

    //---------------------------Funciones------------------------------
    function mostrar(){
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'mostrar'}, function (respuesta) {
            let datos = JSON.parse(respuesta);
            var datosArray = datos.split(',');
            let template = '', tot=0;
            for (let i=1; i < datosArray.length; i=i+5) { 
                template += `
                <tr class="rem1">
						<td class="invert-image"><a href="#"><img src="${datosArray[i+3]}" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
                                <div class="quantity-select">
                                    <b><div class="entry value"><span>${datosArray[i+4]}</span></div></b>
								</div>
							</div>
						</td>
						<td class="invert">${datosArray[i+1]}</td>						
						<td class="invert">$${datosArray[i+2]}</td>
						<td class="invert">
							<div class="rem">
								<div class="close1" id="${datosArray[i]}"> </div>
							</div>
						   </script>
						</td>
					</tr>
                `;
                tot+=Number(datosArray[i+2])*Number(datosArray[i+4]);
            }            
            if (tot>0) {
                $('#total').html("Total de todo $"+tot);	
            }else{
                $('#total').html("No has agregado ningun producto");	
            }
            $('#cuerpoTabla').html(template);	
        });        
        historial();
    }
    function historial() {
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'mostrarHistorial'}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let template='';
            datos.forEach(dato => {
                template += `
                <div class="checkout-left-basket">
                    <h4>Pedido de ${dato.fecha_ini}</h4>
                    <h5>${dato.proceso == 1 ? 'Aun no han visto su pedido':'Su pedido ya esta en proceso'}<h5><br>
                    <ul>`;
                        let datosArray = dato.carrito.split(','),tot=0;
                        for (let i=1; i < datosArray.length; i=i+5) {  
                            tot+=Number(datosArray[i+2])*Number(datosArray[i+4]);                       
                            template += `<li>${datosArray[i+4]} ${datosArray[i+1]} <i>-</i> <span>${Number(datosArray[i+2])*Number(datosArray[i+4])}</span></li>`;
                        }
                    template += `
                        <li> Domicilio <i>-</i> <span>
                        ${tot>50000 ? 'Gratis':'$4000'}
                        </span></li>
                    </ul>
                    <b>Total de ${tot>50000 ? tot: tot+4000}<b>
                    <br><br>
                </div>				
                <div class="clearfix"> </div>
                `;            
            });
            $('#historialPedido').html(template);
        });
    }

    function mostrarPorHcer(){
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'porHacer'}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let template='',i=0;
            datos.forEach(dato => {
                template += `
                <div class="col-md-4 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
							<b>${dato.fecha_ini}</b>
                            <div class="agile_top_brand_left_grid1 text-center">
								<h4>Hay un pedido por parte del cliente ${dato.nombre}</h4><br>
                                <div class="snipcart-item block">
									<button type="button" class="btn btn-primary" id="mod" value="${dato.id_domicilio}" data-toggle="modal" data-target="#exampleModalLong">
										Ver Pedido
									</button>
								</div>
                            </div>
                        </div>
                    </div><br>
                </div>
                `;         
            });
            $('#PedidosPorHacer').html(template);
        });
    }

    function mostrarTodo(identi){
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'mostrarTodo',id: identi}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let template='',i=0;
            datos.forEach(dato => {
                template += `
                <div class="col-md-4 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
							<b>${dato.fecha_fin=='0000-00-00'?  'Pedido hecho '+dato.fecha_ini : 'Pedido finalizado '+dato.fecha_fin}</b>
                            <div class="agile_top_brand_left_grid1 text-center">
								<h4>Pedido del cliente ${dato.nombre}</h4><br>
                            </div>
                        </div>
                    </div><br>
                </div>
                `;         
            });
            $('#padreDomicilios').html(template);
        });
    }

    function mostrarEnProceso(){
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'mostrarEnProceso'}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let template='',i=0;
            datos.forEach(dato => {
                template += `
                <div class="col-md-4 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                        <h5>Peddido del cliente ${dato.nombre}<h5><br>
                        <h5>Direccion: ${dato.direccion}<h5><br>
                        <h5>Celular: ${dato.celular}<h5><br>
                        <ul class="list-group">`;
                            let datosArray = dato.carrito.split(','),tot=0;
                            for (let i=1; i < datosArray.length; i=i+5) {  
                                tot+=Number(datosArray[i+2])*Number(datosArray[i+4]);                       
                                template += `<li class="list-group-item">${datosArray[i+4]} de ${datosArray[i+1]} <span class="badge">$${Number(datosArray[i+2])*Number(datosArray[i+4])}</span></li>`;
                            }
                        template += `
                            <li class="list-group-item"> Domicilio  <span class="badge">
                            ${tot>50000 ? 'Gratis':'$4000'}
                            </span></li>
                        </ul>
                        <b>Total de $${tot>50000 ? tot: tot+4000}<b>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="terminarProeceso" value="${dato.id_domicilio}">Acabo de entregar el pedido</button>
                        </div>
                        </div>
                    </div>
                </div>
                `;         
            });
            $('#PedidosEnProceso').html(template);
        });
    }

    function mostrarRealizados(){
        $.post('../../controlador/domicilios.controlador.php', {operacion: 'mostrarRealizados'}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            let template='',i=0;
            datos.forEach(dato => {
                template += `
                <div class="col-md-12 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                        <h5>Fecha Entrega ${dato.fecha_fin}<h5><br>
                        <h5>Peddido del cliente ${dato.nombre}<h5><br>
                        <h5>Direccion: ${dato.direccion}<h5><br>
                        <h5>Celular: ${dato.celular}<h5><br>
                        <ul class="list-group">`;
                            let datosArray = dato.carrito.split(','),tot=0;
                            for (let i=1; i < datosArray.length; i=i+5) {  
                                tot+=Number(datosArray[i+2])*Number(datosArray[i+4]);                       
                                template += `<li class="list-group-item">${datosArray[i+4]} de ${datosArray[i+1]} <span class="badge">$${Number(datosArray[i+2])*Number(datosArray[i+4])}</span></li>`;
                            }
                        template += `
                            <li class="list-group-item"> Domicilio  <span class="badge">
                            ${tot>50000 ? 'Gratis':'$4000'}
                            </span></li>
                        </ul>
                        <b>Total de $${tot>50000 ? tot: tot+4000}<b>
                        </div>
                    </div><br><br>
                </div>
                `;         
            });
            $('#PedidosRealizados').html(template);
        });
    }
});
