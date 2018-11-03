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
    private $id_pedido;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_ingreso_detalle;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPedido(): ?int
    {
        return $this->id_pedido;
    }

    public function setIdPedido(int $id_pedido): self
    {
        $this->id_pedido = $id_pedido;

        return $this;
    }

    public function getIdIngresoDetalle(): ?int
    {
        return $this->id_ingreso_detalle;
    }

    public function setIdIngresoDetalle(int $id_ingreso_detalle): self
    {
        $this->id_ingreso_detalle = $id_ingreso_detalle;

        return $this;
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
}
