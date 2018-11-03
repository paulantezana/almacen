<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
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
    private $perfil;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_registro;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_almacen;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_compra;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_venta;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $manu_mantenimiento;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_seguridad;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_consulta_compra;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_consulta_venta;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu_admin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estado;

    /**
     * Many Usuarios have One Empleado.
     * @ORM\ManyToOne(targetEntity="App\Entity\Empleado", inversedBy="usuarios")
     * @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     */
    private $empleado;

    /**
     * Many Usuarios have One Sucursal.
     * @ORM\ManyToOne(targetEntity="App\Entity\Sucursal", inversedBy="usuarios")
     * @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     */
    private $sucursal;

    /**
     * One Usuario has Many ingresos.
     * @ORM\OneToMany(targetEntity="App\Entity\Ingreso", mappedBy="usuario")
     */
    private $ingresos;

    /**
     * One Usuario has Many ventas.
     * @ORM\OneToMany(targetEntity="App\Entity\Venta", mappedBy="usuario")
     */
    private $ventas;

    /**
     * One Usuario has Many pedidos.
     * @ORM\OneToMany(targetEntity="App\Entity\Pedido", mappedBy="usuario")
     */
    private $pedidos;

    public function __construct() {
        $this->ingresos = new ArrayCollection();
        $this->ventas = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerfil(): ?string
    {
        return $this->perfil;
    }

    public function setPerfil(?string $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(?\DateTimeInterface $fecha_registro): self
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }

    public function getMenuAlmacen(): ?bool
    {
        return $this->menu_almacen;
    }

    public function setMenuAlmacen(?bool $menu_almacen): self
    {
        $this->menu_almacen = $menu_almacen;

        return $this;
    }

    public function getMenuCompra(): ?bool
    {
        return $this->menu_compra;
    }

    public function setMenuCompra(?bool $menu_compra): self
    {
        $this->menu_compra = $menu_compra;

        return $this;
    }

    public function getMenuVenta(): ?bool
    {
        return $this->menu_venta;
    }

    public function setMenuVenta(?bool $menu_venta): self
    {
        $this->menu_venta = $menu_venta;

        return $this;
    }

    public function getManuMantenimiento(): ?bool
    {
        return $this->manu_mantenimiento;
    }

    public function setManuMantenimiento(?bool $manu_mantenimiento): self
    {
        $this->manu_mantenimiento = $manu_mantenimiento;

        return $this;
    }

    public function getMenuSeguridad(): ?bool
    {
        return $this->menu_seguridad;
    }

    public function setMenuSeguridad(?bool $menu_seguridad): self
    {
        $this->menu_seguridad = $menu_seguridad;

        return $this;
    }

    public function getMenuConsultaCompra(): ?bool
    {
        return $this->menu_consulta_compra;
    }

    public function setMenuConsultaCompra(?bool $menu_consulta_compra): self
    {
        $this->menu_consulta_compra = $menu_consulta_compra;

        return $this;
    }

    public function getMenuConsultaVenta(): ?bool
    {
        return $this->menu_consulta_venta;
    }

    public function setMenuConsultaVenta(?bool $menu_consulta_venta): self
    {
        $this->menu_consulta_venta = $menu_consulta_venta;

        return $this;
    }

    public function getMenuAdmin(): ?bool
    {
        return $this->menu_admin;
    }

    public function setMenuAdmin(?bool $menu_admin): self
    {
        $this->menu_admin = $menu_admin;

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

    public function getEmpleado(): ?empleado
    {
        return $this->empleado;
    }

    public function setEmpleado(?Empleado $empleado): self
    {
        $this->empleado = $empleado;

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

    /**
     * @return Collection|Ingresos[]
     */
    public function getIngresos(): Collection
    {
        return $this->ingresos;
    }

    /**
     * @return Collection|Ventas[]
     */
    public function getVentas(): Collection
    {
        return $this->ventas;
    }

    /**
     * @return Collection|Pedidos[]
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }
}
