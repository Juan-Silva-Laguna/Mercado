<?php
include_once("../entidad/usuarios.entidad.php");
include_once("../modelo/usuarios.modelo.php");

$UsuarioE = new \entidadUsuario\Usuario();
switch ($_POST['operacion']) {
    case 'registrar':
        $UsuarioE->setNombre($_POST['nombre']);
        $UsuarioE->setIdentidad($_POST['identidad']);
        $UsuarioE->setNumero($_POST['numero']);
        $UsuarioE->setCorreo($_POST['correo']);
        $UsuarioE->setDireccion($_POST['direccion']);
        $UsuarioE->setPassword($_POST['password']);
        $UsuarioE->setRol($_POST['rol']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->registrar();
        break;
    case 'ingresar':
        $UsuarioE->setCorreo($_POST['correo']);
        $UsuarioE->setPassword($_POST['password']);
        $UsuarioE->setRol($_POST['rol']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->ingresar();
        break;
    case 'salir':
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->salir();
        break;    
    case 'mostrarDomiciliarios':
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->mostrarDomiciliarios();
        break;
    case 'mostrarClientes':
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->mostrarClientes();
        break;
    case 'eliminar':
        $UsuarioE->setId($_POST['id']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->eliminar();
        break;
    case 'mostrarEditar':
        $UsuarioE->setId($_POST['id']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->mostrarEditar();
        break;
    case 'editar':
        $UsuarioE->setId($_POST['id']);
        $UsuarioE->setNombre($_POST['nombre']);
        $UsuarioE->setIdentidad($_POST['identidad']);
        $UsuarioE->setNumero($_POST['numero']);
        $UsuarioE->setCorreo($_POST['correo']);
        $UsuarioE->setDireccion($_POST['direccion']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->editar();
        break;
    case 'buscar':
        $UsuarioE->setRol($_POST['rol']);
        $UsuarioE->setNombre($_POST['nombre']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->buscar();
        break;
    case 'mostrarPerfil':
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->mostrarPerfil();
        break;
    case 'actualizar':
        $UsuarioE->setNombre($_POST['nombre']);
        $UsuarioE->setNumero($_POST['numero']);
        $UsuarioE->setCorreo($_POST['correo']);
        $UsuarioE->setDireccion($_POST['direccion']);
        $UsuarioE->setPassword($_POST['password']);
        $UsuarioM = new \modeloUsuario\Usuario($UsuarioE);
        $mensaje = $UsuarioM->actualizar();
        break;
}

unset($UsuarioE);
unset($UsuarioM);

echo json_encode($mensaje);
?>