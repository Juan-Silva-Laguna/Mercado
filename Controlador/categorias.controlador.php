<?php
include_once("../entidad/categorias.entidad.php");
include_once("../modelo/categorias.modelo.php");

$CategoriaE = new \entidadCategoria\Categoria();
switch ($_POST['operacion']) {
    case 'crear':
        $CategoriaE->setNombre($_POST['nombre']);
        $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
        $mensaje = $CategoriaM->crear();
        break;   
    case 'mostrar':
        $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
        $mensaje = $CategoriaM->mostrar();
        break;
    case 'eliminar':
        $CategoriaE->setId($_POST['id']);
        $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
        $mensaje = $CategoriaM->eliminar();
        break;
    case 'mostrarEditar':
        $CategoriaE->setId($_POST['id']);
        $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
        $mensaje = $CategoriaM->mostrarEditar();
        break;
    case 'editar':
        $CategoriaE->setId($_POST['id']);
        $CategoriaE->setNombre($_POST['nombre']);
        $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
        $mensaje = $CategoriaM->editar();
        break;
    case 'buscar':
        $CategoriaE->setNombre($_POST['nombre']);
        $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
        $mensaje = $CategoriaM->buscar();
        break;
}

unset($CategoriaE);
unset($CategoriaM);

echo json_encode($mensaje);
?>