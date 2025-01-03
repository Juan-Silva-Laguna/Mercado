<?php
include_once("../Entidad/productos.entidad.php");
include_once("../Modelo/productos.modelo.php");

$ProductoE = new \entidadProducto\Producto();
switch ($_POST['operacion']) {
    case 'crear':
        $ProductoE->setNombreProducto($_POST['nombre']);
        $ProductoE->setPrecioProducto($_POST['precio']);
        $ProductoE->setImagenProducto($_POST['imagen']);
        $ProductoE->setIdCategoria($_POST['categoria']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->crearProducto();
        break;   
    case 'mostrar':
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->mostrarProductos();
        break;
    case 'eliminar':
        $ProductoE->setIdProducto($_POST['id']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->eliminarProducto();
        break;
    case 'mostrarEditar':
        $ProductoE->setIdProducto($_POST['idProducto']);
        $ProductoE->setIdCategoria($_POST['idCategoria']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->mostrarEditar();
        break;
    case 'editar':
        $ProductoE->setIdProducto($_POST['id']);
        $ProductoE->setNombreProducto($_POST['nombre']);
        $ProductoE->setPrecioProducto($_POST['precio']);
        $ProductoE->setImagenProducto($_POST['imagen']);
        $ProductoE->setIdCategoria($_POST['categoria']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->editarProducto();
        break;
    case 'buscar':
        $ProductoE->setNombreProducto($_POST['nombre']);
        $ProductoE->setIdCategoria($_POST['categoria']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->buscarProducto();
        break;
    case 'buscarNombreProducto':
        $ProductoE->setNombreProducto($_POST['nombre']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->buscarNombreProducto();
        break;
    case 'promocion':
        $ProductoE->setDescuentoProducto($_POST['descuento']);
        $ProductoE->setIdProducto($_POST['idProducto']);
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->promocion();
        break;
    case 'mostrarPromociones':
        $ProductoM = new \modeloProducto\Producto($ProductoE);
        $mensaje = $ProductoM->mostrarPromociones();
        break;
}

unset($ProductoE);
unset($ProductoM);

echo json_encode($mensaje);
?>