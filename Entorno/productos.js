$(document).ready(function(){    

    if ($(location).attr('pathname') == "/web/Vista/Administrador/productos.php") {
        mostrar();  
        $.post('../../controlador/categorias.controlador.php', {operacion: "mostrar"}, function (respuesta) {
            //llenamos el datalist de categoria  
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
                option = document.createElement("option");
                option.value = dato.nombre;  
                option.setAttribute('data-index-number',dato.id_categoria);
                document.getElementById('categorias').append(option); 
            });
        })
    }else if ($(location).attr('pathname') == "/web/Vista/Administrador/promociones.php") {
        mostrarPromociones();
        $.post('../../controlador/productos.controlador.php', {operacion: "mostrar"}, function (respuesta) {
            
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
                option = document.createElement("option");
                option.value = dato.nombre_producto;  
                option.setAttribute('data-index-number',dato.id_producto);
                document.getElementById('promoProductos').append(option); 
            });
        })
    }
    else if ($(location).attr('pathname') == "/web/Vista/Cliente/productos.php") {
        
        $.post('../../controlador/categorias.controlador.php', {operacion: "mostrar"}, function (respuesta) {
            //llenamos la lista de categoria 
            let template='<li><a href="" id="opcionCateg"><i class="fa fa-arrow-right"></i>Todos</a></li>';
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
                template +=`<li><a href="${dato.id_categoria}" id="opcionCateg"><i class="fa fa-arrow-right"></i>${dato.nombre}</a></li>`;
            });
            $('.cate').html(template);
        })
        mostrar();
    }
    else if ($(location).attr('pathname') == "/web/Vista/Cliente/promociones.php") { 
        mostrarPromociones();
    }
    //-------------------Eventos-------------------

    $(document).on('change', '#imagen', function (e) {
        e.preventDefault();
            let inputFileImage = document.getElementById("imagen");
            let file = inputFileImage.files[0];
            let data = new FormData();
            data.append('archivo',file);
            $.ajax({
                url:"../../Controlador/imagenProducto.php",
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false
            })
            .done(function(respuesta){
                switch (respuesta) {
                    case "1":
                        alert('Error. La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo');
                        break;
                    case "3":
                        alert('Ocurrió algún error al subir el fichero. No pudo guardarse.');
                        break;   
                    default:
                        alert('Se ha subido correctamente la imagen.');
                        $('#img').html(`<img id="foto" src="../Productos/${respuesta}" width="150" height="150">`);
                        break;
                }
                    
            })
	});
    
    $('#frmProducto').submit(function (e) {
        e.preventDefault();
        let datos = {            
            nombre: $('#nombre_producto').val(),
            precio: $('#precio_producto').val(),
            imagen: $("#foto").attr('src'),
            categoria: $('#categorias [value="' + $('#categoria').val() + '"]').data('indexNumber')
        };
        if ($('#crear_producto').val() == 'Crear') {
            Object.assign(datos, {operacion: "crear"})
        }
        else if ($('#crear_producto').val() == 'Editar') {
            Object.assign(datos, {id: $('#id_producto').val(),operacion: "editar"})
        }
             $.post('../../controlador/productos.controlador.php', datos, function (respuesta) {
           alert(respuesta); 
           mostrar();
           limpiar();
           $('#crear_producto').val('Crear');
         })
     });
     
     $(document).on('click','#opcionCateg', function (e) {
         $('#titCateg').attr('data-index-number', $(this).attr('href'));
        if ($(this).attr('href') === "") {
            mostrar();
        }else{
            const datos = {
                categoria: $(this).attr('href'),
                nombre: $("#buscarProducto").val(),
                operacion: 'buscar'
            };
            search(datos);
        }
        e.preventDefault(); 
      });
    $(document).on('click','#btnMostrarEditar', function (e) {
        window.scroll(0, 0);
        let elemento = $(this).val();
        let arreglo = elemento.split('-');
            const datos = {
                idProducto: arreglo[0],
                idCategoria: arreglo[1],
                operacion: 'mostrarEditar'
            };
        $.post('../../controlador/productos.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
              $('#nombre_producto').val(dato.nombre_producto);
              $('#precio_producto').val(dato.precio);
              $('#id_producto').val(dato.id_producto);
              $('#categoria').val(dato.nombre);
              $('#categoria').attr('indexNumber', dato.id_categoria);
              $('#img').html(`<img id="foto" src="${dato.imagen}" width="150" height="150">`);
              $('#crear_producto').val('Editar');
            });
        })
         e.preventDefault(); 
      });

    $(document).on('click','#realizar_promo', function (e) {
        const datos = {
            idProducto: $('#promoProductos [value="' + $('#promoProducto').val() + '"]').data('indexNumber'),
            descuento: $('#descuento').val(),
            operacion: 'promocion'
        };
        $.post('../../controlador/productos.controlador.php', datos, function (respuesta) {
        alert(respuesta);
        mostrarPromociones();
        $('#descuento').val("");
        $('#promoProducto').val("");
        $('#promoProducto').attr('indexNumber', "");
    })
        e.preventDefault(); 
    });

    $(document).on('click','#btnQuitar', function (e) {
        const datos = {
            idProducto: $(this).val(),
            descuento: 0,
            operacion: 'promocion'
        };
        $.post('../../controlador/productos.controlador.php', datos, function (respuesta) {
            alert(respuesta);
            mostrarPromociones();
            $('#descuento').val("");
            $('#promoProducto').val("");
            $('#promoProducto').attr('indexNumber', "");
        })
        e.preventDefault(); 
    });
    
    $(document).on('click', '#btnEliminarProducto', function (e) {       
        const datos = {
            id: $(this).val(),
            operacion: 'eliminar'
        };
            if (confirm("Esta seguro de eliminar el producto los cambios")) {
                $.post('../../controlador/productos.controlador.php',datos, function (respuesta) {
                    alert(respuesta);
                    mostrar();
                    limpiar();
                })
            }
        e.preventDefault();
    });

    $(document).on('click', '#btnBuscarProducto', function (e) {         
        let condicion = ($(location).attr('pathname') == "/web/Vista/Administrador/productos.php") ? $('#categorias [value="' + $('#categoriaFiltro').val() + '"]').data('indexNumber') : $('#titCateg').data('indexNumber');      
        if (condicion == "" || condicion == undefined) {
            const datos = {
                nombre: $("#buscarProducto").val(),
                operacion: 'buscarNombreProducto'
            };
            searchName(datos);
        }else{
            const datos = {
                categoria: condicion,
                nombre: $("#buscarProducto").val(),
                operacion: 'buscar'
            };
            search(datos);
        }
        
        $("#buscarProducto").val("");
        $('#categoriaFiltro').val("");
        $('#categoriaFiltro').attr('indexNumber', "");
        e.preventDefault();
    });

    $(document).on('click', '#agregarProducto', function (e) { 
        let cant = prompt(`Cuantos desea agregar?`);
        if (!cant==null || !cant=="") {
            if (!isNaN(cant)) {
                const datos={
                    carrito: $(this).attr('data-index-number')+","+cant,
                    operacion: 'agregar'
                };
                console.log(datos);
               $.post('../../controlador/domicilios.controlador.php', datos, function (respuesta) {
                    console.log(respuesta);
                    alert(respuesta);
                })
            }else{alert("ERROR: La cantidad debe ser numerica");}         
            
        }
        
        e.preventDefault();
    });

    //----------------------Funciones.------------------------

function search(datos) {
    $.post('../../controlador/productos.controlador.php',datos, function (respuesta) {
        
        let datos = JSON.parse(respuesta);
        let template = '';
        datos.forEach(dato => {
            template += `
            <div class="col-md-4 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos" style="background-color: #e2543b;width: 50px;">
                                ${dato.descuento == 0  ? "" : " -"+dato.descuento+"%"}
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb text-center">
                                            <a href="#"><img width="150" height="150" src="${dato.imagen}"></a>		
                                            <p>${dato.nombre_producto}</p>
                                            <h4>${dato.descuento != 0 ? '$'+(dato.precio-((Number(dato.descuento)/100)*dato.precio))+'<span>$'+dato.precio+'</span>' : '$'+dato.precio} </h4><br>                                  
                                        ${
                                            ($(location).attr('pathname') == "/web/Vista/Administrador/productos.php")  ? 
                                            ` <button class="btn btn-info" value="${dato.id_producto+"-"+dato.id_categoria}" id="btnMostrarEditar"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger" value="${dato.id_producto}" id="btnEliminarProducto"><i class="fa fa-trash-o"></i></button>` 
                                            : 
                                            `<div class="snipcart-details top_brand_home_details">
                                                    <fieldset>
                                                        <input type="submit" value="Agregar" id="agregarProducto" class="button" data-index-number=",*${dato.id_producto+","+dato.nombre_producto+","+(dato.descuento != 0 ? dato.precio-((Number(dato.descuento)/100)*dato.precio): dato.precio)+","+dato.imagen}">
                                                    </fieldset>
                                            </div>`
                                        }
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div><br>
                </div>
            `;
        })
        $('#padreProductos').html(template);
    })
}

function searchName(datos) {
    $.post('../../controlador/productos.controlador.php',datos, function (respuesta) {
        
        let datos = JSON.parse(respuesta);
        let template = '';
        datos.forEach(dato => {
            template += `
            <div class="col-md-4 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos" style="background-color: #e2543b;width: 50px;">
                                ${dato.descuento == 0  ? "" : " -"+dato.descuento+"%"}
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb text-center">
                                            <a href="#"><img width="150" height="150" src="${dato.imagen}"></a>		
                                            <p>${dato.nombre_producto}</p>
                                            <h4>${dato.descuento != 0 ? '$'+(dato.precio-((Number(dato.descuento)/100)*dato.precio))+'<span>$'+dato.precio+'</span>' : '$'+dato.precio} </h4><br> 
                                            ${
                                                ($(location).attr('pathname') == "/web/Vista/Administrador/productos.php")  ? 
                                                ` <button class="btn btn-info" value="${dato.id_producto+"-"+dato.id_categoria}" id="btnMostrarEditar"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger" value="${dato.id_producto}" id="btnEliminarProducto"><i class="fa fa-trash-o"></i></button>` 
                                                : 
                                                `<div class="snipcart-details top_brand_home_details">
                                                        <fieldset>
                                                            <input type="submit" value="Agregar" id="agregarProducto" class="button" data-index-number=",*${dato.id_producto+","+dato.nombre_producto+","+(dato.descuento != 0 ? dato.precio-((Number(dato.descuento)/100)*dato.precio): dato.precio)+","+dato.imagen}">
                                                        </fieldset>
                                                </div>`
                                            }
                                            </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div><br>
                </div>
            `;
        })
        $('#padreProductos').html(template);
    })
}


    function mostrar(){
        $.post('../../controlador/productos.controlador.php', {operacion: 'mostrar'}, function (respuesta) {
            let datos = JSON.parse(respuesta);
            let template = '';
            datos.forEach(dato => {
                template += `
                <div class="col-md-4 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos" style="background-color: #e2543b;width: 50px;">
									${dato.descuento == 0  ? "" : " -"+dato.descuento+"%"}
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb text-center">
												<a href="#"><img width="150" height="150" src="${dato.imagen}"></a>		
												<p>${dato.nombre_producto}</p>
                                                <h4>${dato.descuento != 0 ? '$'+(dato.precio-((Number(dato.descuento)/100)*dato.precio))+'<span>$'+dato.precio+'</span>' : '$'+dato.precio} </h4><br> 
                                                ${
                                                    ($(location).attr('pathname') == "/web/Vista/Administrador/productos.php")  ? 
                                                    `<button class="btn btn-info" value="${dato.id_producto+"-"+dato.id_categoria}" id="btnMostrarEditar"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-danger" value="${dato.id_producto}" id="btnEliminarProducto"><i class="fa fa-trash-o"></i></button>` 
                                                    : 
                                                    `<div class="snipcart-details top_brand_home_details">
                                                            <fieldset>
                                                                <input type="submit" value="Agregar" id="agregarProducto" class="button" data-index-number=",*${dato.id_producto+","+dato.nombre_producto+","+(dato.descuento != 0 ? dato.precio-((Number(dato.descuento)/100)*dato.precio): dato.precio)+","+dato.imagen}">
                                                            </fieldset>
                                                    </div>`
                                                }
                                            </div>
										</div>
									</figure>
								</div>
							</div>
						</div><br>
					</div>
                `;
            })
            $('#padreProductos').html(template);	
        })        
    }
    
    function mostrarPromociones(){
        $.post('../../controlador/productos.controlador.php', {operacion: 'mostrarPromociones'}, function (respuesta) {
            let datos = JSON.parse(respuesta);
            let template = '';
            datos.forEach(dato => {
                template += `
                <div class="col-md-4 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos" style="background-color: #e2543b;width: 50px;">
									${dato.descuento == 0  ? "" : " -"+dato.descuento+"%"}
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb text-center">
												<a href="#"><img width="150" height="150" src="${dato.imagen}"></a>		
												<p>${dato.nombre_producto}</p>
                                                <h4>${dato.descuento != 0 ? '$'+(dato.precio-((Number(dato.descuento)/100)*dato.precio))+'<span>$'+dato.precio+'</span>' : '$'+dato.precio} </h4><br> 
                                            ${
                                                ($(location).attr('pathname') == "/web/Vista/Administrador/promociones.php")  ? 
                                                `<button class="btn btn-danger" value="${dato.id_producto}" id="btnQuitar"><i class="fa fa-trash-o"></i> Quitar Oferta</button>` 
                                                : 
                                                `<div class="snipcart-details top_brand_home_details">
                                                        <fieldset>
                                                            <input type="submit" value="Agregar" id="agregarProducto" class="button" data-index-number=",*${dato.id_producto+","+dato.nombre_producto+","+(dato.descuento != 0 ? dato.precio-((Number(dato.descuento)/100)*dato.precio): dato.precio)+","+dato.imagen}">
                                                        </fieldset>
                                                </div>`
                                            }
                                            </div>
										</div>
									</figure>
								</div>
							</div>
						</div><br>
					</div>
                `;
            })
            $('#padreProductos').html(template);	
        })        
    }

    function limpiar() {
        $('#nombre_producto').val("");
        $('#precio_producto').val("");
        $('#id_producto').val("");
        $('#categoria').val("");
        $('#categoria').attr('indexNumber', "");
        $('#img').html("");
    }

});