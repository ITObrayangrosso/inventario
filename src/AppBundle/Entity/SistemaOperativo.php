<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SistemaOperativo
 *
 * @ORM\Table(name="sistema_operativo")
 * @ORM\Entity
 */
class SistemaOperativo
{
    function __toString() 
    {
        return $this->getDescripcion()."/".$this->getBytes();
    }
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="bytes", type="string", length=10, nullable=false)
     */
    private $bytes;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return SistemaOperativo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set bytes.
     *
     * @param string $bytes
     *
     * @return SistemaOperativo
     */
    public function setBytes($bytes)
    {
        $this->bytes = $bytes;

        return $this;
    }

    /**
     * Get bytes.
     *
     * @return string
     */
    public function getBytes()
    {
        return $this->bytes;
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
