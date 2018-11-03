<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngresoRepository")
 */
class Ingreso
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $tipo_comprobanate;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $serie_comprobante;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $num_comprobante;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $impuesto;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $total;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estado;

    /**
     * Many Ingresos have One Sucursal.
     * @ORM\ManyToOne(targetEntity="App\Entity\Sucursal", inversedBy="ingresos")
     * @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     */
    private $sucursal;

    /**
     * Many Ingresos have One Usuario.
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="ingresos")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * Many Ingresos have One Persona.
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="ingresos")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;

    /**
     * One Ingreso has Many ingresoDetalles.
     * @ORM\OneToMany(targetEntity="App\Entity\IngresoDetalle", mappedBy="ingreso")
     */
    private $ingresoDetalles;

    public function __construct() {
        $this->ingresoDetalles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoComprobanate(): ?string
    {
        return $this->tipo_comprobanate;
    }

    public function setTipoComprobanate(string $tipo_comprobanate): self
    {
        $this->tipo_comprobanate = $tipo_comprobanate;

        return $this;
    }

    public function getSerieComprobante(): ?string
    {
        return $this->serie_comprobante;
    }

    public function setSerieComprobante(string $serie_comprobante): self
    {
        $this->serie_comprobante = $serie_comprobante;

        return $this;
    }

    public function getNumComprobante(): ?string
    {
        return $this->num_comprobante;
    }

    public function setNumComprobante(string $num_comprobante): self
    {
        $this->num_comprobante = $num_comprobante;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getImpuesto()
    {
        return $this->impuesto;
    }

    public function setImpuesto($impuesto): self
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(?bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getSucursal(): ?sucursal
    {
        return $this->sucursal;
    }

    public function setSucursal(?Sucursal $sucursal): self
    {
        $this->sucursal = $sucursal;

        return $this;
    }
    
    public function getUsuario(): ?usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPersona(): ?persona
    {
        return $this->persona;
    }

    public function setPersona(?Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * @return Collection|IngresoDetalles[]
     */
    public function getIngresoDetalles(): Collection
    {
        return $this->ingresoDetalles;
    }
}
