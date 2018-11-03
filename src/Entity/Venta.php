<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VentaRepository")
 */
class Venta
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
    private $tipo_venta;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $tipo_comprobante;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $serie_comprobante;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
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
     * Many Ventas have One Usuario.
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="ventas")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    
    /**
     * Many Ventas have One Pedido.
     * @ORM\ManyToOne(targetEntity="App\Entity\Pedido", inversedBy="ventas")
     * @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     */
    private $pedido;

    /**
     * Many Ventas have One Credito.
     * @ORM\ManyToOne(targetEntity="App\Entity\Credito", inversedBy="ventas")
     * @ORM\JoinColumn(name="credito_id", referencedColumnName="id")
     */
    private $credito;

    /**
     * One Venta has Many creditos.
     * @ORM\OneToMany(targetEntity="App\Entity\Credito", mappedBy="venta")
     */
    private $creditos;

    public function __construct() {
        $this->creditos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoVenta(): ?string
    {
        return $this->tipo_venta;
    }

    public function setTipoVenta(string $tipo_venta): self
    {
        $this->tipo_venta = $tipo_venta;

        return $this;
    }

    public function getTipoComprobante(): ?string
    {
        return $this->tipo_comprobante;
    }

    public function setTipoComprobante(string $tipo_comprobante): self
    {
        $this->tipo_comprobante = $tipo_comprobante;

        return $this;
    }

    public function getSerieComprobante(): ?string
    {
        return $this->serie_comprobante;
    }

    public function setSerieComprobante(?string $serie_comprobante): self
    {
        $this->serie_comprobante = $serie_comprobante;

        return $this;
    }

    public function getNumComprobante(): ?string
    {
        return $this->num_comprobante;
    }

    public function setNumComprobante(?string $num_comprobante): self
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
    
    public function getUsuario(): ?usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPedido(): ?pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * @return Collection|Creditos[]
     */
    public function getCreditos(): Collection
    {
        return $this->creditos;
    }
}
