<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonRooms
 *
 * @ORM\Table(name="jilton_rooms", indexes={@ORM\Index(name="fk_jilton_rooms_jilton_hotel1_idx", columns={"idHotel"}), @ORM\Index(name="fk_jilton_rooms_jilton_plantas1_idx", columns={"numeroPlanta"}), @ORM\Index(name="fk_jilton_rooms_jilton_class1_idx", columns={"idClass"})})
 * @ORM\Entity
 */
class JiltonRooms
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numeroRoom", type="integer", nullable=false)
     */
    private $numeroroom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean", nullable=false)
     */
    private $activa = true;

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
     * @ORM\Column(name="roomPic", type="string", length=300, nullable=true)
     */
    private $roompic;

    /**
     * @var float
     *
     * @ORM\Column(name="precioNoche", type="decimal", nullable=false)
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
     * @var \AppBundle\Entity\JiltonPlantas
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonPlantas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numeroPlanta", referencedColumnName="id")
     * })
     */
    private $numeroplanta;

    /**
     * @var \AppBundle\Entity\JiltonHotel
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonHotel", inversedBy="rooms")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHotel", referencedColumnName="id")
     * })
     */
    private $idHotel;

    /**
     * @var \AppBundle\Entity\JiltonClass
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClass", referencedColumnName="idClass")
     * })
     */
    private $idclass;



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
     * Set activa
     *
     * @param boolean $activa
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
     * @return boolean
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
     * Set roompic
     *
     * @param string $roompic
     *
     * @return JiltonRooms
     */
    public function setRoompic($roompic)
    {
        $this->roompic = $roompic;

        return $this;
    }

    /**
     * Get roompic
     *
     * @return string
     */
    public function getRoompic()
    {
        return $this->roompic;
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
     * Set numeroplanta
     *
     * @param \AppBundle\Entity\JiltonPlantas $numeroplanta
     *
     * @return JiltonRooms
     */
    public function setNumeroplanta(\AppBundle\Entity\JiltonPlantas $numeroplanta)
    {
        $this->numeroplanta = $numeroplanta;

        return $this;
    }

    /**
     * Get numeroplanta
     *
     * @return \AppBundle\Entity\JiltonPlantas
     */
    public function getNumeroplanta()
    {
        return $this->numeroplanta;
    }

    /**
     * Set idHotel
     *
     * @param \AppBundle\Entity\JiltonHotel $idHotel
     *
     * @return JiltonRooms
     */
    public function setIdHotel(\AppBundle\Entity\JiltonHotel $idHotel)
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * Get idHotel
     *
     * @return \AppBundle\Entity\JiltonHotel
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set idclass
     *
     * @param \AppBundle\Entity\JiltonClass $idclass
     *
     * @return JiltonRooms
     */
    public function setIdclass(\AppBundle\Entity\JiltonClass $idclass)
    {
        $this->idclass = $idclass;

        return $this;
    }

    /**
     * Get idclass
     *
     * @return \AppBundle\Entity\JiltonClass
     */
    public function getIdclass()
    {
        return $this->idclass;
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
