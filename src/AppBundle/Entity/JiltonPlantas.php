<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonPlantas
 *
 * @ORM\Table(name="jilton_plantas", indexes={@ORM\Index(name="IDX_573863B114971DC4", columns={"idHotel"})})
 * @ORM\Entity
 */
class JiltonPlantas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="activa", type="integer", nullable=true)
     */
    private $activa;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroPlanta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeroplanta;

    /**
     * @var \AppBundle\Entity\JiltonHotel
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JiltonHotel")     
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHotel", referencedColumnName="idHotel")
     * })
     */
    private $idHotel;



    /**
     * Set activa
     *
     * @param integer $activa
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
     * @return integer
     */
    public function getActiva()
    {
        return $this->activa;
    }

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
