<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonPlantas
 *
 * @ORM\Table(name="jilton_plantas", indexes={@ORM\Index(name="fk_JILTON_PLANTAS_JILTON_HOTEL", columns={"idHotel"})})
 * @ORM\Entity
 */
class JiltonPlantas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numeroPlanta", type="integer", nullable=true)
     */
    private $numeroplanta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean", nullable=false)
     */
    private $activa = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\JiltonHotel
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonHotel", inversedBy="plantas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHotel", referencedColumnName="id")
     * })
     */
    private $idHotel;



    /**
     * Set numeroplanta
     *
     * @param integer $numeroplanta
     *
     * @return JiltonPlantas
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

    /**
     * Set activa
     *
     * @param boolean $activa
     *
     * @return JiltonPlantas
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idHotel
     *
     * @param \AppBundle\Entity\JiltonHotel $idHotel
     *
     * @return JiltonPlantas
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


}
