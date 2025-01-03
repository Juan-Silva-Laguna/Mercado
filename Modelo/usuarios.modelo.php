<?php
namespace modeloUsuario;
use PDO;

include_once("../entidad/usuarios.entidad.php");
include_once("../entorno/conexion.php");
class Usuario{
    private $identidad;
    private $nombre;
    private $numero;
    private $correo;
    private $direccion;
    private $password;
    private $rol;
    private $id;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadUsuario\Usuario $UsuarioE)
    {
        $this->conexion = new \Conexion();
        $this->identidad=$UsuarioE->getIdentidad();  
        $this->nombre=$UsuarioE->getNombre();  
        $this->numero=$UsuarioE->getNumero();  
        $this->correo=$UsuarioE->getCorreo(); 
        $this->direccion=$UsuarioE->getDireccion();  
        $this->password=$UsuarioE->getPassword();  
        $this->numero=$UsuarioE->getNumero();  
        $this->rol=$UsuarioE->getRol(); 
        $this->id=$UsuarioE->getId(); 
    }

    public function registrar()
    {
        if ($this->password == "") {
            $todo = '0123456789!#%$/()={}[]*+-<>&abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $longitud = strlen($todo);
            for($i = 0; $i < 6; $i++) {
                $this->password .= $todo[mt_rand(0, $longitud - 1)];
            }
        }        
       $hash = password_hash($this->password, PASSWORD_ARGON2I);
       $this->consulta="INSERT INTO personas VALUES(null, $this->identidad, '$this->nombre', '$this->numero', '$this->correo', '$this->direccion',  $this->rol, '$hash')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
        $this->retorno = "Registro exitoso, la clave es: ".$this->password;
       }
       else{
        $this->retorno = "Fallo el registro";
       }
       return $this->retorno;
    }

    public function ingresar()
    {
        $this->consulta="SELECT * FROM personas WHERE correo='$this->correo' AND rol=$this->rol";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){             
            foreach ($this->resultado->fetchAll(PDO::FETCH_ASSOC) as $dato) {
                if (password_verify($this->password, $dato['password'])){
                    session_start();
                    $_SESSION['id'] = $dato['id_persona'];
                    $nom = explode(" ", $dato['nombre']);
                    $_SESSION['nombre'] = $nom[0];
                    $_SESSION['rol'] = $dato['rol'];
                    $this->retorno="Validacion Correcta";
                }
                else{
                    $this->retorno="Validacion Inorrecta";
                }
            }             
        }
        else{
         $this->retorno='Hay un error de autenticacion por favor vuelva a intentarlo';
        }
        return $this->retorno;
    }

    public function salir()
    {
       session_start();      
       $this->retorno='Hasta Pronto '.$_SESSION['nombre'];
       session_destroy();
       return $this->retorno;
    }

    public function mostrarDomiciliarios()
    {
       $this->consulta="SELECT * FROM personas WHERE rol=2";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarClientes()
    {
       $this->consulta="SELECT * FROM personas WHERE rol=1";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar()
    {
       $this->consulta="DELETE FROM personas WHERE id_persona='$this->id'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno="Se elimino el usuario";
        }
        else{
            $this->retorno="No se elimino el usuario";
        }
        return $this->retorno;
    }

    public function mostrarEditar()
    {
       $this->consulta="SELECT * FROM personas WHERE id_persona=$this->id";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editar()
    {
         $this->consulta="UPDATE personas SET identidad=$this->identidad, nombre='$this->nombre', celular=$this->numero, correo='$this->correo', direccion='$this->direccion' WHERE id_persona=$this->id";
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
       $this->consulta="SELECT * FROM personas WHERE nombre LIKE '%$this->nombre%' AND rol=$this->rol";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarPerfil()
    {
        session_start();
       $id = $_SESSION['id'];
       $this->consulta="SELECT * FROM personas WHERE id_persona=$id";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar()
    {
        session_start();
       $id = $_SESSION['id'];

       if (strpos($this->password,'argon2i') === true) {
           $clave = $this->password;
        }
        else{
            $clave = password_hash($this->password, PASSWORD_ARGON2I);
        }        
       
         $this->consulta="UPDATE personas SET nombre='$this->nombre', celular=$this->numero, correo='$this->correo', direccion='$this->direccion', password='$clave' WHERE id_persona=$id";
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno="Actualizacion Exitosa ";
         }
         else{
           $this->retorno="Actualizacion Fallida ";
         }
         return $this->retorno;       
    }
}

?>