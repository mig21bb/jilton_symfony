<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonHotel
 *
 * @ORM\Table(name="jilton_hotel")
 * @ORM\Entity
 */
class JiltonHotel
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
     * @ORM\Column(name="ubicacion", type="string", length=45, nullable=true)
     */
    private $ubicacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estrellas", type="integer", nullable=true)
     */
    private $estrellas;

    /**
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

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
     * @var string
     *
     * @ORM\Column(name="hotelPic", type="string", length=300, nullable=true)
     */
    private $hotelPic;

    /**
     * @var integer
     *
     * @ORM\Column(name="idHotel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHotel;


     // ...
    /**
     * Un hotel tiene varias plantas
     * @OneToMany(targetEntity="JiltonPlantas", mappedBy="idHotel")
     */
    private $plantas;
    // ...



    /**
     * Un hotel tiene varias habitaciones
     * @OneToMany(targetEntity="JiltonRooms", mappedBy="idHotel")
     */
    private $rooms;
    // ...


    /**
     * Un hotel tiene varias habitaciones
     * @Transient
     */
    private $emptyRooms;

    public function __construct() {
        $this->plantas = new ArrayCollection();
        $this->rooms = new ArrayCollection();
        $this->emptyRooms = new ArrayCollection();
    }
    

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return JiltonHotel
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
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return JiltonHotel
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set estrellas
     *
     * @param integer $estrellas
     *
     * @return JiltonHotel
     */
    public function setEstrellas($estrellas)
    {
        $this->estrellas = $estrellas;

        return $this;
    }

    /**
     * Get estrellas
     *
     * @return integer
     */
    public function getEstrellas()
    {
        return $this->estrellas;
    }

    /**
     * Set activo
     *
     * @param integer $activo
     *
     * @return JiltonHotel
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
     * Set fcreacion
     *
     * @param \DateTime $fcreacion
     *
     * @return JiltonHotel
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
     * @return JiltonHotel
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
     * @return JiltonHotel
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
     * Get idHotel
     *
     * @return integer
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set hotelPic
     *
     * @param string
     *
     * @return JiltonHotel
     */
    public function setHotelPic($hotelPic)
    {
        $this->hotelPic = $hotelPic;

        return $this;
    }

    /**
     * Get hotelPic
     *
     * @return string
     */
    public function getHotelPic()
    {
        return $this->hotelPic;
    }
    

     /**
     * Get plantas
     *
     * @return ArrayCollection()
     */
    public function getPlantas()
    {
        return $this->plantas;
    }

    /**
     * Get rooms
     *
     * @return ArrayCollection()
     */
    public function getRooms()
    {
        return $this->rooms;
    }


    /*
     * Set emptyRooms
     *
     * @param integer $activo
     *
     * @return JiltonHotel
     
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }*/

    /**
     * Get emptyRooms
     *
     * @return ArrayCollection()
     */
    public function getEmptyRooms()
    {
        return $this->emptyRooms;
    }
}
