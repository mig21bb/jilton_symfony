<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonRoomPic
 *
 * @ORM\Table(name="jilton_room_pic")
 * @ORM\Entity
 */
class JiltonRoomPic
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=300, nullable=true)
     */
    private $url;

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
     * @ORM\Column(name="numeroPlanta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeroplanta;

    /**
     * @var integer
     *
     * @ORM\Column(name="idHotel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idHotel;



    /**
     * Set url
     *
     * @param string $url
     *
     * @return JiltonRoomPic
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set numeroroom
     *
     * @param integer $numeroroom
     *
     * @return JiltonRoomPic
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
     * Set numeroplanta
     *
     * @param integer $numeroplanta
     *
     * @return JiltonRoomPic
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
     * @param integer $idHotel
     *
     * @return JiltonRoomPic
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
}
