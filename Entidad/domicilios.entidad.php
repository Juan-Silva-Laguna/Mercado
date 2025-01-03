<?php
namespace entidadDomicilio;
class Domicilio{
    private $id_domicilio;
    private $id_cliente;
    private $carrito;
    private $proceso;
    /**
     * Get the value of id_domicilio
     */ 
    public function getId_domicilio()
    {
        return $this->id_domicilio;
    }

    /**
     * Set the value of id_domicilio
     *
     * @return  self
     */ 
    public function setId_domicilio($id_domicilio)
    {
        $this->id_domicilio = $id_domicilio;

        return $this;
    }

    /**
     * Get the value of id_cliente
     */ 
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set the value of id_cliente
     *
     * @return  self
     */ 
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    /**
     * Get the value of carrito
     */ 
    public function getCarrito()
    {
        return $this->carrito;
    }

    /**
     * Set the value of carrito
     *
     * @return  self
     */ 
    public function setCarrito($carrito)
    {
        $this->carrito = $carrito;

        return $this;
    }

    /**
     * Get the value of proceso
     */ 
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set the value of proceso
     *
     * @return  self
     */ 
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }
}

?>