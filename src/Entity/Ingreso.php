<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $id_usuario;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_sucursal;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_proveedor;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuario(): ?int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): self
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getIdSucursal(): ?int
    {
        return $this->id_sucursal;
    }

    public function setIdSucursal(int $id_sucursal): self
    {
        $this->id_sucursal = $id_sucursal;

        return $this;
    }

    public function getIdProveedor(): ?int
    {
        return $this->id_proveedor;
    }

    public function setIdProveedor(int $id_proveedor): self
    {
        $this->id_proveedor = $id_proveedor;

        return $this;
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
}