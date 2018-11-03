<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $tipo_pedido;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * Many Pedidos have One Sucursal.
     * @ORM\ManyToOne(targetEntity="App\Entity\Sucursal", inversedBy="pedidos")
     * @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     */
    private $sucursal;

    /**
     * Many Pedidos have One Usuario.
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="pedidos")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;

    /**
     * Many Pedidos have One Persona.
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="pedidos")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;

    /**
     * One Pedido has Many ventas.
     * @ORM\OneToMany(targetEntity="App\Entity\Venta", mappedBy="pedido")
     */
    private $ventas;

    /**
     * One Pedido has Many pedidoDetalles.
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoDetalle", mappedBy="pedido")
     */
    private $pedidoDetalles;

    public function __construct() {
        $this->ventas = new ArrayCollection();
        $this->pedidoDetalles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoPedido(): ?string
    {
        return $this->tipo_pedido;
    }

    public function setTipoPedido(string $tipo_pedido): self
    {
        $this->tipo_pedido = $tipo_pedido;

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

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
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
     * @return Collection|Ventas[]
     */
    public function getVentas(): Collection
    {
        return $this->ventas;
    }
    
    /**
     * @return Collection|DedidoDetalles[]
     */
    public function getDedidoDetalles(): Collection
    {
        return $this->pedidoDetalles;
    }
}
