<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonClientes
 *
 * @ORM\Table(name="jilton_clientes")
 * @ORM\Entity
 */
class JiltonClientes
{   

    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=45, nullable=true)
     */
    private $apellido;


    private $nombreCompleto;

    
    

    /**
     * @var string
     *
     * @ORM\Column(name="DNI", type="string", length=45, nullable=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="passaporte", type="string", length=45, nullable=true)
     */
    private $passaporte;

    /**
     * @var string
     *
     * @ORM\Column(name="tarjeta", type="string", length=45, nullable=true)
     */
    private $tarjeta;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    function __construct() {
       
   }


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return JiltonClientes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return JiltonClientes
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return JiltonClientes
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set passaporte
     *
     * @param string $passaporte
     *
     * @return JiltonClientes
     */
    public function setPassaporte($passaporte)
    {
        $this->passaporte = $passaporte;

        return $this;
    }

    /**
     * Get passaporte
     *
     * @return string
     */
    public function getPassaporte()
    {
        return $this->passaporte;
    }

    /**
     * Set tarjeta
     *
     * @param string $tarjeta
     *
     * @return JiltonClientes
     */
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $tarjeta;

        return $this;
    }

    /**
     * Get tarjeta
     *
     * @return string
     */
    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return JiltonClientes
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }

   
    public function getNombreCompleto()
    {
        return $this->nombre.' '.$this->apellido;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
