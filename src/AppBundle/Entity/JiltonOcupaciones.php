<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonOcupaciones
 *
 * @ORM\Table(name="jilton_ocupaciones", indexes={@ORM\Index(name="fk_JILTON_OCUPACIONES_JILTON_CLIENTES1_idx", columns={"idCliente"}), @ORM\Index(name="fk_jilton_ocupaciones_jilton_rooms1_idx", columns={"idRoom"})})
 * @ORM\Entity
 */
class JiltonOcupaciones
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fEntrada", type="datetime", nullable=false)
     */
    private $fentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fSalida", type="datetime", nullable=true)
     */
    private $fsalida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fCreacion", type="datetime", nullable=true)
     */
    private $fcreacion;

   /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean", nullable=false)
     */
    private $activa = true;

    /**
     * @var float
     *
     * @ORM\Column(name="precioNoche", type="float", nullable=false)
     */
    private $precionoche;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\JiltonRooms
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonRooms")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRoom", referencedColumnName="id")
     * })
     */
    private $idroom;

    /**
     * @var \AppBundle\Entity\JiltonClientes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonClientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCliente", referencedColumnName="id")
     * })
     */
    private $idcliente;



    /**
     * Set fentrada
     *
     * @param \DateTime $fentrada
     *
     * @return JiltonOcupaciones
     */
    public function setFentrada($fentrada)
    {
        $this->fentrada = $fentrada;

        return $this;
    }

    /**
     * Get fentrada
     *
     * @return \DateTime
     */
    public function getFentrada()
    {
        return $this->fentrada;
    }

    /**
     * Set fsalida
     *
     * @param \DateTime $fsalida
     *
     * @return JiltonOcupaciones
     */
    public function setFsalida($fsalida)
    {
        $this->fsalida = $fsalida;

        return $this;
    }

    /**
     * Get fsalida
     *
     * @return \DateTime
     */
    public function getFsalida()
    {
        return $this->fsalida;
    }

    /**
     * Set fcreacion
     *
     * @param \DateTime $fcreacion
     *
     * @return JiltonOcupaciones
     */
    public function setFcreacion($fcreacion)
    {
        $this->fcreacion = $fcreacion;

        return $this;
    }

    /**
     * Get fcreacion
     *
     * @return \DateTime
     */
    public function getFcreacion()
    {
        return $this->fcreacion;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return JiltonOcupaciones
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
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

    /**
     * Set idroom
     *
     * @param \AppBundle\Entity\JiltonRooms $idroom
     *
     * @return JiltonOcupaciones
     */
    public function setIdroom(\AppBundle\Entity\JiltonRooms $idroom = null)
    {
        $this->idroom = $idroom;

        return $this;
    }

    /**
     * Get idroom
     *
     * @return \AppBundle\Entity\JiltonRooms
     */
    public function getIdroom()
    {
        return $this->idroom;
    }

    /**
     * Set idcliente
     *
     * @param \AppBundle\Entity\JiltonClientes $idcliente
     *
     * @return JiltonOcupaciones
     */
    public function setIdcliente(\AppBundle\Entity\JiltonClientes $idcliente = null)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    /**
     * Get idcliente
     *
     * @return \AppBundle\Entity\JiltonClientes
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Set precionoche
     *
     * @param float $precionoche
     *
     * @return float
     */
    public function setPrecionoche($precionoche)
    {
        $this->precionoche = $precionoche;

        return $this;
    }

    /**
     * Get precionoche
     *
     * @return float
     */
    public function getPrecionoche()
    {
        return $this->precionoche;
    }
}
