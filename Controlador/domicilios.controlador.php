<?php
include_once("../entidad/domicilios.entidad.php");
include_once("../modelo/domicilios.modelo.php");

$DomicilioE = new \entidadDomicilio\Domicilio();
switch ($_POST['operacion']) {
    case 'agregar':
        $DomicilioE->setCarrito($_POST['carrito']);
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->agregar();
        break;   
    case 'mostrar':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->mostrar();
        break;
    case 'remover':
        $DomicilioE->setCarrito($_POST['carrito']);
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->remover();
        break;
    case 'realizar':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->realizar();
        break;
    case 'borrarTodo':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->borrarTodo();
        break;
    case 'mostrarHistorial':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->mostrarHistorial();
        break;
    case 'porHacer':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->PorHacer();
        break;
    case 'modalPorHacer':
        $DomicilioE->setId_domicilio($_POST['id']);
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->modalPorHacer();
        break;
    case 'realizarEncargo':
        $DomicilioE->setId_domicilio($_POST['id']);
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->realizarEncargo();
        break;
    case 'mostrarEnProceso':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->mostrarEnProceso();
        break;
    case 'terminarProceso':
        $DomicilioE->setId_domicilio($_POST['id']);
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->terminarProceso();
        break;
    case 'mostrarRealizados':
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->mostrarRealizados();
        break;
    case 'mostrarTodo':
        $DomicilioE->setId_domicilio($_POST['id']);
        $DomicilioM = new \modeloDomicilio\Domicilio($DomicilioE);
        $mensaje = $DomicilioM->mostrarTodo();
        break;

}
unset($DomicilioE);
unset($DomicilioM);
echo json_encode($mensaje);
?>