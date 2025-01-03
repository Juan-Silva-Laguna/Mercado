$(document).ready(function(){ 
    if ($(location).attr('pathname') == "/web/Vista/Administrador/domiciliarios.php") {
        mostrarDomiciliarios();
    }else if ($(location).attr('pathname') == "/web/Vista/Administrador/clientes.php") {
        mostrarClientes();
    }else if ($(location).attr('pathname') == "/web/Vista/Cliente/perfil.php" || $(location).attr('pathname') == "/web/Vista/Domiciliario/perfil.php" || $(location).attr('pathname') == "/web/Vista/Administrador/perfil.php") {
        mostrarMiPerfil();
    }
    let pass="";
    //----------------------Eventos-----------------
    $(document).on('click', '#btn_registrar', function () {
        event.preventDefault();
        let datos = {
            identidad: $('#identidad').val(),
            nombre: $('#nombre').val(), 
            numero: $('#numero').val(),
            direccion: $('#direccion').val(), 
            correo: $('#correo').val(),
            password: $('#password').val(), 
            rol: $('#rol').val()
        };
        if ($('#btn_registrar').val() == 'Registrar') {
            Object.assign(datos, {operacion: 'registrar'});
        }
        else if ($('#btn_registrar').val() == 'Editar') {
            Object.assign(datos, {id: $('#id').val(),operacion: 'editar'});
        }
        else if ($('#btn_registrar').val() == 'Actualizar') {
            Object.assign(datos, {operacion: 'actualizar'});
        }
        $.post('../../Controlador/usuarios.controlador.php', datos, function (respuesta) {
            //let datos = JSON.parse(respuesta);
            alert(respuesta);    
            limpiar();
            $('#btn_registrar').val('Registrar');
            mostrarDomiciliarios();
        })        
        
    });

    $(document).on('click', '#actualizar', function () {
        event.preventDefault();
        let datos = {
            nombre: $('#nombre').val(), 
            numero: $('#numero').val(),
            direccion: $('#direccion').val(), 
            correo: $('#correo').val(),
            password: $('#password').val()=='No se muestra'?pass:$('#password').val(), 
            operacion: 'actualizar'
        };
        $.post('../../Controlador/usuarios.controlador.php', datos, function (respuesta) {
            //let datos = JSON.parse(respuesta);
            alert(respuesta);    
            mostrarMiPerfil();
        })        
        
    });

    $(document).on('click', '#btn_ingresar', function () {
        event.preventDefault();
        let tipo=0;
        switch ($('#rol').val()) {
            case "Soy Cliente":
                tipo=1;
                break;
            case "Soy Domiciliario":
                tipo=2;
                break;
            case "Soy Administrador":
                tipo=3;
            break;
        }
        const datos = {
            operacion: 'ingresar',
            correo: $('#correo').val(),
            password: $('#password').val(), 
            rol: tipo
        };
        $.post('../../Controlador/usuarios.controlador.php', datos, function (respuesta) {
            alert(respuesta);  
            $(location).attr('href','../Cliente/index.php');
            limpiar();
        })
        
    });

    $(document).on('click', '#salir', function (event) {
        event.preventDefault();
        $.post('../../Controlador/usuarios.controlador.php', {operacion: 'salir'}, function (respuesta) {
            alert(respuesta);  
            $(location).attr('href','../Cliente/index.php');
        })
    });

    $(document).on('click', '#btnEliminar', function (event) {
        event.preventDefault();
        const datos = {
            id: $(this).val(),
            operacion: 'eliminar'
        };
        $.post('../../Controlador/usuarios.controlador.php', datos, function (respuesta) {
            alert(respuesta);  
            mostrarDomiciliarios();
            limpiar();
        })
       
    });

    $(document).on('click','#btnMostrarEditar', function (event) {
        event.preventDefault(); 
        window.scroll(0, 0);
            const datos = {
                id: $(this).val(),
                operacion: 'mostrarEditar'
            };
        $.post('../../Controlador/usuarios.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);
            console.log(datos);
            datos.forEach(dato => {
              $('#id').val(dato.id_persona);
              $('#identidad').val(dato.identidad);
              $('#nombre').val(dato.nombre);
              $('#correo').val(dato.correo);
              $('#numero').val(dato.celular);
              $('#direccion').val(dato.direccion);
              $('#btn_registrar').val('Editar');
            });            
        })
      });

      $(document).on('click','#btnBuscar', function (event) {
        event.preventDefault(); 
            let tipo =$(this).val();
            const datos = {
                rol: tipo,
                nombre: $('#buscaNombre').val(),
                operacion: 'buscar'
            };
            console.log(datos);
        $.post('../../controlador/usuarios.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);
            let template = '';
            if (tipo == "1") {
                datos.forEach(dato => {
                    template += `
                    <div class="col-md-4 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb text-center">		
                                                <p><b>Nombre:</b>
                                                ${dato.nombre}</p>
                                                <p><b>Celular:</b>
                                                ${dato.celular}</p>
                                                <p><b>Correo:</b>
                                                ${dato.correo}</p>
                                                <p><b>Direccion:</b>
                                                ${dato.direccion}</p>
                                                <button class="btn btn-danger" value="${dato.id_persona}" id="btnEliminar"><i class="fa fa-trash-o"></i> Borrar</button>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div><br>
                    </div>
                    `;
                })
            }
            else{
                datos.forEach(dato => {
                    template += `
                    <div class="col-md-4 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb text-center">		
                                                <b>Nombre:</b><br>
                                                ${dato.nombre}
                                                <br><b>Celular:</b><br>
                                                ${dato.celular}<br>
                                                <button class="btn btn-info" value="${dato.id_persona}" id="btnMostrarEditar"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger" value="${dato.id_persona}" id="btnEliminar"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div><br>
                    </div>
                    `;
                })
            }
            $('#padre').html(template);		
        })
      });

    //---------------------------Funciones------------------------------
    function mostrarDomiciliarios() {
        //$('#padre').empty();
        $.post('../../controlador/usuarios.controlador.php', {operacion: 'mostrarDomiciliarios'}, function (respuesta) {
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
                                            <b>Nombre:</b><br>
                                            ${dato.nombre}
                                            <br><b>Celular:</b><br>
                                            ${dato.celular}<br>
                                            <button class="btn btn-info" value="${dato.id_persona}" id="btnMostrarEditar"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger" value="${dato.id_persona}" id="btnEliminar"><i class="fa fa-trash-o"></i></button>
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

    function mostrarClientes() {
        //$('#padre').empty();
        $.post('../../controlador/usuarios.controlador.php', {operacion: 'mostrarClientes'}, function (respuesta) {
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
                                            <p><b>Nombre:</b>
                                            ${dato.nombre}</p>
                                            <p><b>Celular:</b>
                                            ${dato.celular}</p>
                                            <p><b>Correo:</b>
                                            ${dato.correo}</p>
                                            <p><b>Direccion:</b>
                                            ${dato.direccion}</p>
                                            <button class="btn btn-danger" value="${dato.id_persona}" id="btnEliminar"><i class="fa fa-trash-o"></i> Borrar</button>
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

    function mostrarMiPerfil() {
        //$('#padre').empty();
        $.post('../../controlador/usuarios.controlador.php', {operacion: 'mostrarPerfil'}, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
                $('#nombre').val(dato.nombre);
                $('#numero').val(dato.celular);
                $('#correo').val(dato.correo);
                $('#direccion').val(dato.direccion);
                $('#password').val('No se muestra');
                pass = dato.password;
            })
        })
    }

    function limpiar() {
        $('#identidad').val("");
        $('#nombre').val(""); 
        $('#numero').val("");
        $('#direccion').val(""); 
        $('#correo').val("");
        $('#password').val(""); 
        $('#id').val("");
    }

});
