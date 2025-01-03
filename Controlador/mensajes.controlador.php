<?php
include_once("../entidad/mensajes.entidad.php");
include_once("../modelo/mensajes.modelo.php");

$MensajeE = new \entidadMensaje\Mensaje();
switch ($_POST['operacion']) {
    case 'enviar':
        $MensajeE->setNombre($_POST['nombre']);
        $MensajeE->setCorreo($_POST['correo']);
        $MensajeE->setMensaje($_POST['mensaje']);
        $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
        $mensaje = $MensajeM->enviar();
        break;   
    case 'mostrar':
        $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
        $mensaje = $MensajeM->mostrar();
        break;
    case 'eliminar':
        $MensajeE->setId($_POST['id']);
        $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
        $mensaje = $MensajeM->eliminar();
        break;
}

unset($MensajeE);
unset($MensajeM);

echo json_encode($mensaje);
?>