<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonHotelPic
 *
 * @ORM\Table(name="jilton_hotel_pic")
 * @ORM\Entity
 */
class JiltonHotelPic
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
     * @ORM\Column(name="idHotel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity=""AppBundle\Entity\JiltonHotel", inversedBy="hotelPic"")
     * @JoinColumn(name="idHotel", referencedColumnName="idHotel")
     */
    private $idHotel;



    /**
     * Set url
     *
     * @param string $url
     *
     * @return JiltonHotelPic
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
     * Get idHotel
     *
     * @return integer
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }
}
