<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonOcupaciones
 *
 * @ORM\Table(name="jilton_ocupaciones", indexes={@ORM\Index(name="fk_JILTON_OCUPACIONES_JILTON_ROOMS1_idx", columns={"numeroRoom", "idHotel", "numeroPlanta"}), @ORM\Index(name="fk_JILTON_OCUPACIONES_JILTON_CLIENTES1_idx", columns={"idCliente"})})
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
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idOcupaciones", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idocupaciones;

    /**
     * @var \AppBundle\Entity\JiltonRooms
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonRooms")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numeroRoom", referencedColumnName="numeroRoom"),
     *   @ORM\JoinColumn(name="idHotel", referencedColumnName="idHotel"),
     *   @ORM\JoinColumn(name="numeroPlanta", referencedColumnName="numeroPlanta")
     * })
     */
    private $numeroroom;

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
     * @param integer $activo
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
     * @return integer
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Get idocupaciones
     *
     * @return integer
     */
    public function getIdocupaciones()
    {
        return $this->idocupaciones;
    }

    /**
     * Set numeroroom
     *
     * @param \AppBundle\Entity\JiltonRooms $numeroroom
     *
     * @return JiltonOcupaciones
     */
    public function setNumeroroom(\AppBundle\Entity\JiltonRooms $numeroroom = null)
    {
        $this->numeroroom = $numeroroom;

        return $this;
    }

    /**
     * Get numeroroom
     *
     * @return \AppBundle\Entity\JiltonRooms
     */
    public function getNumeroroom()
    {
        return $this->numeroroom;
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
}
