<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngresoDetalleRepository")
 */
class IngresoDetalle
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
    private $codigo;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $serie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock_ingreso;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock_actual;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $precio_compra;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $precio_venta_distribuidor;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $precio_venta_publico;

    /**
     * Many IngresoDetalles have One Articulo.
     * @ORM\ManyToOne(targetEntity="App\Entity\Articulo", inversedBy="ingresoDetalles")
     * @ORM\JoinColumn(name="articulo_id", referencedColumnName="id")
     */
    private $articulo;

    /**
     * Many IngresoDetalles have One Ingreso.
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingreso", inversedBy="ingresoDetalles")
     * @ORM\JoinColumn(name="ingreso_id", referencedColumnName="id")
     */
    private $ingreso;

    /**
     * One IngresoDetalle has Many pedidoDetalles.
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoDetalle", mappedBy="ingresoDetalle")
     */
    private $pedidoDetalles;

    public function __construct() {
        $this->pedidoDetalles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getStockIngreso(): ?int
    {
        return $this->stock_ingreso;
    }

    public function setStockIngreso(?int $stock_ingreso): self
    {
        $this->stock_ingreso = $stock_ingreso;

        return $this;
    }

    public function getStockActual(): ?int
    {
        return $this->stock_actual;
    }

    public function setStockActual(?int $stock_actual): self
    {
        $this->stock_actual = $stock_actual;

        return $this;
    }

    public function getPrecioCompra()
    {
        return $this->precio_compra;
    }

    public function setPrecioCompra($precio_compra): self
    {
        $this->precio_compra = $precio_compra;

        return $this;
    }

    public function getPrecioVentaDistribuidor()
    {
        return $this->precio_venta_distribuidor;
    }

    public function setPrecioVentaDistribuidor($precio_venta_distribuidor): self
    {
        $this->precio_venta_distribuidor = $precio_venta_distribuidor;

        return $this;
    }

    public function getPrecioVentaPublico()
    {
        return $this->precio_venta_publico;
    }

    public function setPrecioVentaPublico($precio_venta_publico): self
    {
        $this->precio_venta_publico = $precio_venta_publico;

        return $this;
    }

    public function getIngreso(): ?ingreso
    {
        return $this->ingreso;
    }

    public function setIngreso(?Ingreso $ingreso): self
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    public function getArticulo(): ?articulo
    {
        return $this->articulo;
    }

    public function setArticulo(?Articulo $articulo): self
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * @return Collection|PedidoDetalles[]
     */
    public function getPedidoDetalles(): Collection
    {
        return $this->pedidoDetalles;
    }
}
