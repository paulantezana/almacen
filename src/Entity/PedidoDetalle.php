<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoDetalleRepository")
 */
class PedidoDetalle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $precio_venta;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $descuento;

    /**
     * Many pedidoDetalles have One Pedido.
     * @ORM\ManyToOne(targetEntity="App\Entity\Pedido", inversedBy="pedidoDetalles")
     * @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     */
    private $pedido;

    /**
     * Many ingresoDetalles have One IngresoDetalle.
     * @ORM\ManyToOne(targetEntity="App\Entity\IngresoDetalle", inversedBy="ingresoDetalles")
     * @ORM\JoinColumn(name="ingreso_detalle_id", referencedColumnName="id")
     */
    private $ingresoDetalle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecioVenta()
    {
        return $this->precio_venta;
    }

    public function setPrecioVenta($precio_venta): self
    {
        $this->precio_venta = $precio_venta;

        return $this;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento): self
    {
        $this->descuento = $descuento;

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

    public function getIngresoDetalle(): ?ingresoDetalle
    {
        return $this->ingresoDetalle;
    }

    public function setIngresoDetalle(?IngresoDetalle $ingresoDetalle): self
    {
        $this->ingresoDetalle = $ingresoDetalle;

        return $this;
    }
}
