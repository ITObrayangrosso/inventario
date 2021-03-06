<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mouse
 *
 * @ORM\Table(name="mouse")
 * @ORM\Entity
 */
class Mouse
{
    function __toString() 
    {
        return $this->getMarca()."/".$this->getSerial();
    }
    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=255, nullable=false)
     */
    private $serial;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set marca.
     *
     * @param string $marca
     *
     * @return Mouse
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca.
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set serial.
     *
     * @param string $serial
     *
     * @return Mouse
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial.
     *
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
