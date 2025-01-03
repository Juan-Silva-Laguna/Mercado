<?php
namespace entidadProducto;
class Producto{
    private $idProducto;
    private $nombreProducto;
    private $descuentoProducto;
    private $precioProducto;
    private $idCategoria;
    private $imagenProducto;

    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */ 
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get the value of nombreProducto
     */ 
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set the value of nombreProducto
     *
     * @return  self
     */ 
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get the value of descuentoProducto
     */ 
    public function getDescuentoProducto()
    {
        return $this->descuentoProducto;
    }

    /**
     * Set the value of descuentoProducto
     *
     * @return  self
     */ 
    public function setDescuentoProducto($descuentoProducto)
    {
        $this->descuentoProducto = $descuentoProducto;

        return $this;
    }

    /**
     * Get the value of precioProducto
     */ 
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    /**
     * Set the value of precioProducto
     *
     * @return  self
     */ 
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;

        return $this;
    }

    /**
     * Get the value of idCategoria
     */ 
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of idCategoria
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    /**
     * Get the value of imagenProducto
     */ 
    public function getImagenProducto()
    {
        return $this->imagenProducto;
    }

    /**
     * Set the value of imagenProducto
     *
     * @return  self
     */ 
    public function setImagenProducto($imagenProducto)
    {
        $this->imagenProducto = $imagenProducto;

        return $this;
    } 
}

?>