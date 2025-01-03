<?php
namespace modeloDomicilio;
use PDO;

include_once("../entidad/domicilios.entidad.php");
include_once("../entorno/conexion.php");
class Domicilio{
    private $id_domicilio;
    private $id_cliente;
    private $carrito;
    private $proceso;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadDomicilio\Domicilio $DomicilioE)
    {
        $this->conexion = new \Conexion(); 
        $this->id_domicilio=$DomicilioE->getId_domicilio();
        $this->id_cliente=$DomicilioE->getId_cliente(); 
        $this->carrito=$DomicilioE->getCarrito();
        $this->proceso=$DomicilioE->getProceso(); 
    }

    public function agregar()
    {
        session_start();
        if (isset($_SESSION['id'])) {
            $this->id_cliente = $_SESSION['id'];
            $this->consulta="SELECT * FROM domicilio WHERE id_cliente=$this->id_cliente AND proceso=0";   
            $this->resultado=$this->conexion->con->prepare($this->consulta); 
            $this->resultado->execute();
            if($this->resultado->rowCount()>=1){
                foreach ($this->resultado->fetchAll(PDO::FETCH_ASSOC) as $key => $value) {
                    $caracter = explode(",",$this->carrito);
                    $pos = strpos($value['carrito'], $caracter[1]);
                    if ($pos === false) {
                        $car = $value['carrito'].$this->carrito;
                        $this->id_domicilio = $value['id_domicilio'];
                        $this->consulta="UPDATE domicilio SET carrito='$car' WHERE id_domicilio=$this->id_domicilio";
                        $this->resultado=$this->conexion->con->prepare($this->consulta);
                        $this->resultado->execute();
                        if($this->resultado->rowCount()>=1){
                            $this->retorno = "Producto agregado satisfactoriamente!! ";
                        }
                        else{
                            $this->retorno = "No se logro agregar el producto ".$this->id_domicilio;
                        }
                    }else{
                        $this->retorno = "ERROR: Este producto ya lo agrego ";
                    }
                    
                }
            }
            else{              
                $this->consulta="INSERT INTO domicilio VALUES(NULL, $this->id_cliente, '$this->carrito', '', '', 0, '')";
                $this->resultado=$this->conexion->con->prepare($this->consulta);
                $this->resultado->execute();
                if($this->resultado->rowCount()>=1){
                    $this->retorno = "Producto agregado satisfactoriamente!!";
                }
                else{
                    $this->retorno = "No se logro agregar el producto ";
                }
            }
        
        }else{
            $this->retorno = "Por favor inicie sesion para realizar sus compras";
        }
       
       return $this->retorno;
    }

    public function mostrar()
    {
       session_start();
       $this->id_cliente = $_SESSION['id'];
       $this->consulta="SELECT carrito FROM domicilio WHERE id_cliente=$this->id_cliente AND proceso=0";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       foreach ($this->resultado->fetchAll(PDO::FETCH_ASSOC) as $key => $value) {
            $this->retorno = $value['carrito'];
       }
       return $this->retorno;
    }

    public function remover()
    {
        session_start();
       $this->id_cliente = $_SESSION['id'];
        $this->consulta="UPDATE domicilio SET carrito='$this->carrito' WHERE id_cliente=$this->id_cliente AND proceso=0";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){
            $this->retorno = "Se removio el producto ";
        }
        else{
            $this->retorno = "No se logro remover el producto";
        }
        return $this->retorno;
    }

    public function eliminar()
    {
       $this->consulta="DELETE FROM Domicilios WHERE id_Domicilio='$this->id'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno="Se elimino el Domicilio con exito";
        }
        else{
            $this->retorno="No se puede elimnar la Domicilio";
        }
        return $this->retorno;
    }

    public function realizar()
    {
        session_start();
        $this->id_cliente = $_SESSION['id'];
        $hoy = date('Y-m-d');
        $this->consulta="UPDATE domicilio SET proceso=1, fecha_ini='$hoy' WHERE id_cliente=$this->id_cliente AND proceso=0";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){
            $this->retorno = "Muy pronto tendras el pedido en la puerta de tu casa";
        }
        else{
            $this->retorno = "Error, por favor intente de nuevo";
        }
        return $this->retorno;
    }

    public function borrarTodo()
    {
        session_start();
        $this->id_cliente = $_SESSION['id'];
        $hoy = date('Y-m-d');
        $this->consulta="DELETE FROM domicilio WHERE id_cliente=$this->id_cliente AND proceso=0";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){
            $this->retorno = "Se ha eliminado todos los productos del carrito";
        }
        else{
            $this->retorno = "Error, por favor intente de nuevo";
        }
        return $this->retorno;
    }
    
    public function mostrarHistorial()
    {
       session_start();
       $this->id_cliente = $_SESSION['id'];
       $this->consulta="SELECT * FROM domicilio WHERE id_cliente=$this->id_cliente AND proceso>0 AND proceso<3";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function porHacer()
    {
       $this->consulta="SELECT personas.nombre, domicilio.id_domicilio, domicilio.fecha_ini FROM domicilio INNER JOIN personas ON domicilio.id_cliente=personas.id_persona WHERE domicilio.proceso=1";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modalPorHacer()
    {
       $this->consulta="SELECT * FROM domicilio INNER JOIN personas ON domicilio.id_cliente=personas.id_persona WHERE domicilio.id_domicilio=$this->id_domicilio";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function realizarEncargo()
    {
        session_start();
        $id_responsable = $_SESSION['id'];
        $hoy = date('Y-m-d');
        $this->consulta="UPDATE domicilio SET proceso=2, id_responsable=$id_responsable WHERE id_domicilio=$this->id_domicilio AND proceso=1";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){
            $this->retorno = "Acabas de hacerte cargo de este pedido";
        }
        else{
            $this->retorno = "No puedes realizar este pedido";
        }
        return $this->retorno;
    }

    public function mostrarEnProceso()
    {
        session_start();
        $id_responsable = $_SESSION['id'];
       $this->consulta="SELECT * FROM domicilio INNER JOIN personas ON domicilio.id_cliente=personas.id_persona WHERE domicilio.id_responsable=$id_responsable AND domicilio.proceso=2";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function terminarProceso()
    {
        $hoy = date('Y-m-d');
        $this->consulta="UPDATE domicilio SET proceso=3, fecha_fin='$hoy' WHERE id_domicilio=$this->id_domicilio";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){
            $this->retorno = "Felicidades el proceso de el domicilio a finalizado";
        }
        else{
            $this->retorno = "Existe un error. vuelve a intentar";
        }
        return $this->retorno;
    }
    
    public function mostrarRealizados()
    {
        session_start();
        $id_responsable = $_SESSION['id'];
       $this->consulta="SELECT * FROM domicilio INNER JOIN personas ON domicilio.id_cliente=personas.id_persona WHERE domicilio.id_responsable=$id_responsable AND domicilio.proceso=3";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarTodo()
    {
       $this->consulta="SELECT * FROM domicilio INNER JOIN personas ON domicilio.id_cliente=personas.id_persona WHERE domicilio.proceso=$this->id_domicilio";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>