<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonRoomClass
 *
 * @ORM\Table(name="jilton_room_class")
 * @ORM\Entity
 */
class JiltonRoomClass
{
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRoomClass", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idroomclass;

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
     * @var integer
     *
     * @ORM\Column(name="idClass", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idclass;



    /**
     * Set price
     *
     * @param float $price
     *
     * @return JiltonRoomClass
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set idroomclass
     *
     * @param integer $idroomclass
     *
     * @return JiltonRoomClass
     */
    public function setIdroomclass($idroomclass)
    {
        $this->idroomclass = $idroomclass;

        return $this;
    }

    /**
     * Get idroomclass
     *
     * @return integer
     */
    public function getIdroomclass()
    {
        return $this->idroomclass;
    }

    /**
     * Set numeroroom
     *
     * @param integer $numeroroom
     *
     * @return JiltonRoomClass
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
     * @return JiltonRoomClass
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
     * @return JiltonRoomClass
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
     * Set idclass
     *
     * @param integer $idclass
     *
     * @return JiltonRoomClass
     */
    public function setIdclass($idclass)
    {
        $this->idclass = $idclass;

        return $this;
    }

    /**
     * Get idclass
     *
     * @return integer
     */
    public function getIdclass()
    {
        return $this->idclass;
    }
}
