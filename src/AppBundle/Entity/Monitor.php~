<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monitor
 *
 * @ORM\Table(name="monitor")
 * @ORM\Entity
 */
class Monitor
{
    function __toString() 
    {
        return $this->getMarca()."/".$this->getModelo()."/".$this->getSerial();
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
     * @ORM\Column(name="modelo", type="string", length=255, nullable=false)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=100, nullable=false)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="pulgadas", type="string", length=20, nullable=false)
     */
    private $pulgadas;

    /**
     * @var bool
     *
     * @ORM\Column(name="ocupado", type="boolean", nullable=false)
     */
    private $ocupado;

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
     * @return Monitor
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
     * Set modelo.
     *
     * @param string $modelo
     *
     * @return Monitor
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo.
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set serial.
     *
     * @param string $serial
     *
     * @return Monitor
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
     * Set pulgadas.
     *
     * @param string $pulgadas
     *
     * @return Monitor
     */
    public function setPulgadas($pulgadas)
    {
        $this->pulgadas = $pulgadas;

        return $this;
    }

    /**
     * Get pulgadas.
     *
     * @return string
     */
    public function getPulgadas()
    {
        return $this->pulgadas;
    }

    /**
     * Set ocupado.
     *
     * @param bool $ocupado
     *
     * @return Monitor
     */
    public function setOcupado($ocupado)
    {
        $this->ocupado = $ocupado;

        return $this;
    }

    /**
     * Get ocupado.
     *
     * @return bool
     */
    public function getOcupado()
    {
        return $this->ocupado;
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
