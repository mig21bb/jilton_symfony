<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JiltonClass
 *
 * @ORM\Table(name="jilton_class")
 * @ORM\Entity
 */
class JiltonClass
{
    /**
     * @var string
     *
     * @ORM\Column(name="roomClass", type="string", length=45, nullable=true)
     */
    private $roomclass;

    /**
     * @var string
     *
     * @ORM\Column(name="defaultPic", type="string", length=300, nullable=true)
     */
    private $defaultPic;

    /**
     * @var decimal
     *
     * @ORM\Column(name="priceMulti", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $pricemulti = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="idClass", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclass;



    /**
     * Set roomclass
     *
     * @param string $roomclass
     *
     * @return JiltonClass
     */
    public function setRoomclass($roomclass)
    {
        $this->roomclass = $roomclass;

        return $this;
    }

    /**
     * Get roomclass
     *
     * @return string
     */
    public function getRoomclass()
    {
        return $this->roomclass;
    }

    /**
     * Set defaultPic
     *
     * @param string $defaultPic
     *
     * @return String
     */
    public function setDefaultPic($defaultPic)
    {
        $this->defaultPic = $defaultPic;

        return $this;
    }

    /**
     * Get defaultPic
     *
     * @return string
     */
    public function getDefaultPic()
    {
        return $this->defaultPic;
    }

    /**
     * Set pricemulti
     *
     * @param string $pricemulti
     *
     * @return JiltonClass
     */
    public function setPricemulti($pricemulti)
    {
        $this->pricemulti = $pricemulti;

        return $this;
    }

    /**
     * Get pricemulti
     *
     * @return string
     */
    public function getPricemulti()
    {
        return $this->pricemulti;
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
