<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo", indexes={@ORM\Index(name="IDX_C49C530BBD0F409C", columns={"area_id"}), @ORM\Index(name="IDX_C49C530B3917014", columns={"cpu_id"}), @ORM\Index(name="IDX_C49C530B4CE1C902", columns={"monitor_id"}), @ORM\Index(name="IDX_C49C530B23574B71", columns={"mouse_id"}), @ORM\Index(name="IDX_C49C530BF5C57A0A", columns={"memoria_ram_id"}), @ORM\Index(name="IDX_C49C530B4DD634CC", columns={"procesador_id"}), @ORM\Index(name="IDX_C49C530BC616A017", columns={"sistema_operativo_id"}), @ORM\Index(name="IDX_C49C530BF457B2F9", columns={"tarjeta_grafica_id"}), @ORM\Index(name="IDX_C49C530B57E", columns={"ubicacion_id"}),  @ORM\Index(name="IDX_C49C530B952BE730", columns={"empleado_id"}), @ORM\Index(name="IDX_C49C530BE05544A3", columns={"tipo_equipo_id"})})
 * @ORM\Entity
 */
class Equipo
{
    function __toString() 
    {
        return "".$this->getCpu();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Mouse
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mouse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mouse_id", referencedColumnName="id")
     * })
     */
    private $mouse;

    /**
     * @var \AppBundle\Entity\Cpu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cpu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cpu_id", referencedColumnName="id")
     * })
     */
    private $cpu;

    /**
     * @var \AppBundle\Entity\Monitor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Monitor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="monitor_id", referencedColumnName="id")
     * })
     */
    private $monitor;

    /**
     * @var \AppBundle\Entity\Procesador
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Procesador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="procesador_id", referencedColumnName="id")
     * })
     */
    private $procesador;

    /**
     * @var \AppBundle\Entity\Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ubicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ubicacion_id", referencedColumnName="id")
     * })
     */
    private $ubicacion;

    /**
     * @var \AppBundle\Entity\Empleado
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Empleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     * })
     */
    private $empleado;

    /**
     * @var \AppBundle\Entity\Area
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     * })
     */
    private $area;

    /**
     * @var \AppBundle\Entity\SistemaOperativo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SistemaOperativo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sistema_operativo_id", referencedColumnName="id")
     * })
     */
    private $sistemaOperativo;


    /**
     * @var \AppBundle\Entity\TipoEquipo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TipoEquipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_equipo_id", referencedColumnName="id")
     * })
     */
    private $tipoEquipo;

    /**
     * @var \AppBundle\Entity\TarjetaGrafica
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TarjetaGrafica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarjeta_grafica_id", referencedColumnName="id")
     * })
     */
    private $tarjetaGrafica;

    /**
     * @var \AppBundle\Entity\MemoriaRam
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MemoriaRam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="memoria_ram_id", referencedColumnName="id")
     * })
     */
    private $memoriaRam;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mouse.
     *
     * @param \AppBundle\Entity\Mouse|null $mouse
     *
     * @return Equipo
     */
    public function setMouse(\AppBundle\Entity\Mouse $mouse = null)
    {
        $this->mouse = $mouse;

        return $this;
    }

    /**
     * Get mouse.
     *
     * @return \AppBundle\Entity\Mouse|null
     */
    public function getMouse()
    {
        return $this->mouse;
    }

    /**
     * Set cpu.
     *
     * @param \AppBundle\Entity\Cpu|null $cpu
     *
     * @return Equipo
     */
    public function setCpu(\AppBundle\Entity\Cpu $cpu = null)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu.
     *
     * @return \AppBundle\Entity\Cpu|null
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set monitor.
     *
     * @param \AppBundle\Entity\Monitor|null $monitor
     *
     * @return Equipo
     */
    public function setMonitor(\AppBundle\Entity\Monitor $monitor = null)
    {
        $this->monitor = $monitor;

        return $this;
    }

    /**
     * Get monitor.
     *
     * @return \AppBundle\Entity\Monitor|null
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * Set procesador.
     *
     * @param \AppBundle\Entity\Procesador|null $procesador
     *
     * @return Equipo
     */
    public function setProcesador(\AppBundle\Entity\Procesador $procesador = null)
    {
        $this->procesador = $procesador;

        return $this;
    }

    /**
     * Get procesador.
     *
     * @return \AppBundle\Entity\Procesador|null
     */
    public function getProcesador()
    {
        return $this->procesador;
    }

    /**
     * Set ubicacion.
     *
     * @param \AppBundle\Entity\Ubicacion|null $ubicacion
     *
     * @return Equipo
     */
    public function setUbicacion(\AppBundle\Entity\Ubicacion $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion.
     *
     * @return \AppBundle\Entity\Ubicacion|null
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set empleado.
     *
     * @param \AppBundle\Entity\Empleado|null $empleado
     *
     * @return Equipo
     */
    public function setEmpleado(\AppBundle\Entity\Empleado $empleado = null)
    {
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get empleado.
     *
     * @return \AppBundle\Entity\Empleado|null
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * Set area.
     *
     * @param \AppBundle\Entity\Area|null $area
     *
     * @return Equipo
     */
    public function setArea(\AppBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area.
     *
     * @return \AppBundle\Entity\Area|null
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set sistemaOperativo.
     *
     * @param \AppBundle\Entity\SistemaOperativo|null $sistemaOperativo
     *
     * @return Equipo
     */
    public function setSistemaOperativo(\AppBundle\Entity\SistemaOperativo $sistemaOperativo = null)
    {
        $this->sistemaOperativo = $sistemaOperativo;

        return $this;
    }

    /**
     * Get sistemaOperativo.
     *
     * @return \AppBundle\Entity\SistemaOperativo|null
     */
    public function getSistemaOperativo()
    {
        return $this->sistemaOperativo;
    }

    /**
     * Set tipoEquipo.
     *
     * @param \AppBundle\Entity\TipoEquipo|null $tipoEquipo
     *
     * @return Equipo
     */
    public function setTipoEquipo(\AppBundle\Entity\TipoEquipo $tipoEquipo = null)
    {
        $this->tipoEquipo = $tipoEquipo;

        return $this;
    }

    /**
     * Get tipoEquipo.
     *
     * @return \AppBundle\Entity\TipoEquipo|null
     */
    public function getTipoEquipo()
    {
        return $this->tipoEquipo;
    }

    /**
     * Set tarjetaGrafica.
     *
     * @param \AppBundle\Entity\TarjetaGrafica|null $tarjetaGrafica
     *
     * @return Equipo
     */
    public function setTarjetaGrafica(\AppBundle\Entity\TarjetaGrafica $tarjetaGrafica = null)
    {
        $this->tarjetaGrafica = $tarjetaGrafica;

        return $this;
    }

    /**
     * Get tarjetaGrafica.
     *
     * @return \AppBundle\Entity\TarjetaGrafica|null
     */
    public function getTarjetaGrafica()
    {
        return $this->tarjetaGrafica;
    }

    /**
     * Set memoriaRam.
     *
     * @param \AppBundle\Entity\MemoriaRam|null $memoriaRam
     *
     * @return Equipo
     */
    public function setMemoriaRam(\AppBundle\Entity\MemoriaRam $memoriaRam = null)
    {
        $this->memoriaRam = $memoriaRam;

        return $this;
    }

    /**
     * Get memoriaRam.
     *
     * @return \AppBundle\Entity\MemoriaRam|null
     */
    public function getMemoriaRam()
    {
        return $this->memoriaRam;
    }
}
