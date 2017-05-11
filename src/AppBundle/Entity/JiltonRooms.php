<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonRooms
 *
 * @ORM\Table(name="jilton_rooms", indexes={@ORM\Index(name="fk_JILTON_ROOMS_JILTON_PLANTAS1_idx", columns={"idHotel"}), @ORM\Index(name="fk_JILTON_ROOMS_JILTON_PLANTAS2_idx", columns={"numeroPlanta"})})
 * @ORM\Entity
 */
class JiltonRooms
{
    /**
     * @var integer
     *
     * @ORM\Column(name="activa", type="integer", nullable=true)
     */
    private $activa = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fCreacion", type="datetime", nullable=true)
     */
    private $fcreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fModificacion", type="datetime", nullable=true)
     */
    private $fmodificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fBorrado", type="datetime", nullable=true)
     */
    private $fborrado;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroRoom", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeroroom;

    /**
     * @var integer
     *
     * @ORM\Column(name="idHotel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonHotel")       
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHotel", referencedColumnName="idHotel")
     * })
     */
    private $idHotel;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroPlanta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeroplanta;



    /**
     * Set activa
     *
     * @param integer $activa
     *
     * @return JiltonRooms
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Get activa
     *
     * @return integer
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set fcreacion
     *
     * @param \DateTime $fcreacion
     *
     * @return JiltonRooms
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
     * Set fmodificacion
     *
     * @param \DateTime $fmodificacion
     *
     * @return JiltonRooms
     */
    public function setFmodificacion($fmodificacion)
    {
        $this->fmodificacion = $fmodificacion;

        return $this;
    }

    /**
     * Get fmodificacion
     *
     * @return \DateTime
     */
    public function getFmodificacion()
    {
        return $this->fmodificacion;
    }

    /**
     * Set fborrado
     *
     * @param \DateTime $fborrado
     *
     * @return JiltonRooms
     */
    public function setFborrado($fborrado)
    {
        $this->fborrado = $fborrado;

        return $this;
    }

    /**
     * Get fborrado
     *
     * @return \DateTime
     */
    public function getFborrado()
    {
        return $this->fborrado;
    }

    /**
     * Set numeroroom
     *
     * @param integer $numeroroom
     *
     * @return JiltonRooms
     */
    public function setNumeroroom($numeroroom)
    {
        $this->numeroroom = $numeroroom;

        return $this;
    }

    /**
     * Get numeroroom
     *
     * @return integer
     */
    public function getNumeroroom()
    {
        return $this->numeroroom;
    }

    /**
     * Set idHotel
     *
     * @param integer $idHotel
     *
     * @return JiltonRooms
     */
    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * Get idHotel
     *
     * @return integer
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set numeroplanta
     *
     * @param integer $numeroplanta
     *
     * @return JiltonRooms
     */
    public function setNumeroplanta($numeroplanta)
    {
        $this->numeroplanta = $numeroplanta;

        return $this;
    }

    /**
     * Get numeroplanta
     *
     * @return integer
     */
    public function getNumeroplanta()
    {
        return $this->numeroplanta;
    }
}
