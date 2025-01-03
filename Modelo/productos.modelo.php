<?php
namespace modeloProducto;
use PDO;

include_once("../entidad/productos.entidad.php");
include_once("../entorno/conexion.php");
class Producto{
    private $idProducto;
    private $nombreProducto;
    private $descuentoProducto;
    private $precioProducto;
    private $idCategoria;
    private $imagenProducto;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadProducto\Producto $ProductoE)
    {
        $this->conexion = new \Conexion();
        $this->idProducto=$ProductoE->getIdProducto();  
        $this->nombreProducto=$ProductoE->getNombreProducto();  
        $this->descuentoProducto=$ProductoE->getDescuentoProducto();  
        $this->precioProducto=$ProductoE->getPrecioProducto();  
        $this->idCategoria=$ProductoE->getIdCategoria(); 
        $this->imagenProducto=$ProductoE->getImagenProducto();  
    }

    public function reporte()
    {
       $this->consulta="SELECT descuentoProducto, precioProducto, productos.nombreProducto FROM productos WHERE descuentoProducto!=0";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function crearProducto()
    {
       $this->consulta="INSERT INTO productos VALUES(null, '$this->nombreProducto', $this->precioProducto, 0, '$this->imagenProducto', $this->idCategoria)";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno="Se creo el producto con exito";
       }
       else{
            $this->retorno="No se logro crear el producto";
       }
       return $this->retorno;
    }

    public function mostrarProductos()
    {
       $this->consulta="SELECT * FROM productos INNER JOIN categorias ON productos.id_categoria=categorias.id_categoria";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarProducto()
    {
       $this->consulta="DELETE FROM productos WHERE id_producto='$this->idProducto'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
         $this->retorno="Se elimino el producto con exito";
      }
      else{
      $this->retorno="No se logro eliminar el producto";
      }
      return $this->retorno;
    }

    public function mostrarEditar()
    {
       $this->consulta="SELECT * FROM productos INNER JOIN categorias ON productos.id_producto=$this->idProducto AND productos.id_categoria=$this->idCategoria AND categorias.id_categoria=$this->idCategoria";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarProducto()
    {
         $this->consulta="UPDATE productos SET nombre_producto='$this->nombreProducto', precio=$this->precioProducto, imagen='$this->imagenProducto', id_categoria=$this->idCategoria WHERE id_producto=$this->idProducto";
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno="Se edito el producto con exito";
         }
         else{
           $this->retorno="No se logro editar el producto";
         }
         return $this->retorno;       
    }

    public function buscarProducto()
    {
       $this->consulta="SELECT * FROM productos INNER JOIN categorias ON productos.nombre_producto LIKE '%$this->nombreProducto%' WHERE productos.id_categoria=$this->idCategoria AND categorias.id_categoria=$this->idCategoria";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarNombreProducto()
    {
       $this->consulta="SELECT * FROM productos INNER JOIN categorias WHERE productos.nombre_producto LIKE '%$this->nombreProducto%' AND productos.id_categoria=categorias.id_categoria";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function promocion()
    {
      $this->consulta="UPDATE productos SET descuento=$this->descuentoProducto WHERE id_producto=$this->idProducto";
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno="Proceso Exitoso!!";
         }
         else{
           $this->retorno="Error en el proceso.";
         }
         return $this->retorno;  
    }
    public function mostrarPromociones()
    {
       $this->consulta="SELECT * FROM productos WHERE descuento!=0";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>