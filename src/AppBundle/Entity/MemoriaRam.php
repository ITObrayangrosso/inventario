<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MemoriaRam
 *
 * @ORM\Table(name="memoria_ram")
 * @ORM\Entity
 */
class MemoriaRam
{
    function __toString() 
    {
        return $this->getDescripcion();
    }
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=20, nullable=false)
     */
    private $descripcion;

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
     * @return MemoriaRam
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
