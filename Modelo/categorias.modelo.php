<?php
namespace modeloCategoria;
use PDO;

include_once("../entidad/categorias.entidad.php");
include_once("../entorno/conexion.php");
class Categoria{
    private $nombre;
    private $id;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadCategoria\Categoria $CategoriaE)
    {
        $this->conexion = new \Conexion(); 
        $this->nombre=$CategoriaE->getNombre();
        $this->id=$CategoriaE->getId(); 
    }

    public function crear()
    {
       $this->consulta="INSERT INTO categorias VALUES(null, '$this->nombre')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
        $this->retorno = "Se creao la categoria ".$this->nombre;
       }
       else{
        $this->retorno = "No se logro crear la categoria";
       }
       return $this->retorno;
    }

    public function mostrar()
    {
       $this->consulta="SELECT * FROM categorias";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar()
    {
       $this->consulta="DELETE FROM categorias WHERE id_categoria='$this->id'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno="Se elimino el Categoria con exito";
        }
        else{
            $this->retorno="No se puede elimnar la Categoria";
        }
        return $this->retorno;
    }

    public function mostrarEditar()
    {
       $this->consulta="SELECT * FROM categorias WHERE id_categoria=$this->id";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editar()
    {
         $this->consulta="UPDATE categorias SET nombre='$this->nombre' WHERE id_categoria=$this->id";
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno="Actualizacion Exitosa";
         }
         else{
           $this->retorno="Actualizacion Fallida";
         }
         return $this->retorno;       
    }

    public function buscar()
    {
       $this->consulta="SELECT * FROM categorias WHERE nombre LIKE '%$this->nombre%'";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>