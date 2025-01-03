<?php
namespace modeloMensaje;
use PDO;

include_once("../entidad/mensajes.entidad.php");
include_once("../entorno/conexion.php");
class Mensaje{
    private $nombre;
    private $id;
    private $correo;
    private $mensaje;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadMensaje\Mensaje $MensajeE)
    {
        $this->conexion = new \Conexion(); 
        $this->nombre=$MensajeE->getNombre();
        $this->id=$MensajeE->getId(); 
        $this->correo=$MensajeE->getCorreo();
        $this->mensaje=$MensajeE->getMensaje(); 
    }

    public function enviar()
    {
       $this->consulta="INSERT INTO mensajes VALUES(null, '$this->nombre', '$this->correo', '$this->mensaje')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
        $this->retorno = "Se a enviado el mensaje ";
       }
       else{
        $this->retorno = "No se logro enviar el mensaje ";
       }
       return $this->retorno;
    }

    public function mostrar()
    {
       $this->consulta="SELECT * FROM mensajes";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar()
    {
       $this->consulta="DELETE FROM mensajes WHERE id_mensaje='$this->id'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno="Se elimino el Mensaje con exito";
        }
        else{
            $this->retorno="No se puede elimnar la Mensaje";
        }
        return $this->retorno;
    }
}

?>