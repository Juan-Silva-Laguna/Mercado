$(document).ready(function(){ 
    mostrar();  
    //----------------------Eventos-----------------
    $(document).on('click', '#btn_crear_categoria', function () {
        event.preventDefault();
        let datos = { nombre: $('#nombre_categoria').val()};
        if ($('#btn_crear_categoria').val() == 'Crear') {
            Object.assign(datos, {operacion: 'crear'});
        }
        else if ($('#btn_crear_categoria').val() == 'Editar') {
            Object.assign(datos, {id: $('#id_categoria').val(),operacion: 'editar'});
        }
        $.post('../../Controlador/categorias.controlador.php', datos, function (respuesta) {
            //let datos = JSON.parse(respuesta);
            alert(respuesta);    
            limpiar();
            $('#btn_crear_categoria').val('Crear');
            mostrar();
        })        
        
    });

    $(document).on('click', '#btnEliminar_categoria', function (event) {
        event.preventDefault();
        const datos = {
            id: $(this).val(),
            operacion: 'eliminar'
        };
        console.log(datos);
        $.post('../../Controlador/categorias.controlador.php', datos, function (respuesta) {
            alert(respuesta);  
            mostrar();
            limpiar();
        })
       
    });

    $(document).on('click','#btnMostrarEditar_categoria', function (event) {
        event.preventDefault(); 
        window.scroll(0, 0);
            const datos = {
                id: $(this).val(),
                operacion: 'mostrarEditar'
            };
        $.post('../../Controlador/categorias.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);
            console.log(datos);
            datos.forEach(dato => {
              $('#id_categoria').val(dato.id_categoria);
              $('#nombre_categoria').val(dato.nombre);
              $('#btn_crear_categoria').val('Editar');
            });            
        })
      });

      $(document).on('click','#btnBuscar_categoria', function (event) {
        event.preventDefault(); 
        $.post('../../controlador/categorias.controlador.php', {nombre: $('#buscaCategoria').val(),operacion: "buscar"}, function (respuesta) {
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
                                            <div class="snipcart-thumb text-center">		
                                                <h3><b>Categoria:</b><br>
                                                ${dato.nombre}</h3>
                                                <button class="btn btn-info" value="${dato.id_categoria}" id="btnMostrarEditar_categoria"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger" value="${dato.id_categoria}" id="btnEliminar_categoria"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div><br>
                    </div>
                    `;
                })
            
            $('#padre').html(template);		
        })
      });

    //---------------------------Funciones------------------------------
    function mostrar() {
        //$('#padre').empty();
        $.post('../../controlador/categorias.controlador.php', {operacion: 'mostrar'}, function (respuesta) {
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
                                        <div class="snipcart-thumb text-center">		
                                            <h3><b>Categoria:</b><br>
                                            ${dato.nombre}</h3>
                                            <button class="btn btn-info" value="${dato.id_categoria}" id="btnMostrarEditar_categoria"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger" value="${dato.id_categoria}" id="btnEliminar_categoria"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div><br>
                </div>
                `;
            })
            $('#padre').html(template);		
        })
    }

    function limpiar() {
        $('#nombre_categoria').val(""); 
        $('#id_categoria').val("");
    }

});
