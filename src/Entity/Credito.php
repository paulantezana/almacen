<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CreditoRepository")
 */
class Credito
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_pago;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $total_pago;

    /**
     * Many Creditos have One Venta.
     * @ORM\ManyToOne(targetEntity="App\Entity\Venta", inversedBy="creditos")
     * @ORM\JoinColumn(name="venta_id", referencedColumnName="id")
     */
    private $venta;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getFechaPago(): ?\DateTimeInterface
    {
        return $this->fecha_pago;
    }

    public function setFechaPago(\DateTimeInterface $fecha_pago): self
    {
        $this->fecha_pago = $fecha_pago;

        return $this;
    }

    public function getTotalPago()
    {
        return $this->total_pago;
    }

    public function setTotalPago($total_pago): self
    {
        $this->total_pago = $total_pago;

        return $this;
    }

    public function getVenta(): ?venta
    {
        return $this->venta;
    }

    public function setVenta(?Venta $venta): self
    {
        $this->venta = $venta;

        return $this;
    }
}
