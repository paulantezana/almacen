<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona
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
    private $tipo_persona;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $tipo_documento;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $num_documento;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $departamento;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $provincia;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $distrito;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $calle;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $numero_cuenta;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estado;

    /**
     * One Persona has Many ingresos.
     * @ORM\OneToMany(targetEntity="App\Entity\Ingreso", mappedBy="persona")
     */
    private $ingresos;

    /**
     * One Persona has Many pedidos.
     * @ORM\OneToMany(targetEntity="App\Entity\Pedido", mappedBy="persona")
     */
    private $pedidos;

    public function __construct() {
        $this->ingresos = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoPersona(): ?string
    {
        return $this->tipo_persona;
    }

    public function setTipoPersona(string $tipo_persona): self
    {
        $this->tipo_persona = $tipo_persona;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipo_documento;
    }

    public function setTipoDocumento(?string $tipo_documento): self
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    public function getNumDocumento(): ?string
    {
        return $this->num_documento;
    }

    public function setNumDocumento(?string $num_documento): self
    {
        $this->num_documento = $num_documento;

        return $this;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(?string $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(?string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getDistrito(): ?string
    {
        return $this->distrito;
    }

    public function setDistrito(?string $distrito): self
    {
        $this->distrito = $distrito;

        return $this;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(?string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroCuenta(): ?string
    {
        return $this->numero_cuenta;
    }

    public function setNumeroCuenta(?string $numero_cuenta): self
    {
        $this->numero_cuenta = $numero_cuenta;

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

    /**
     * @return Collection|Ingresos[]
     */
    public function getIngresos(): Collection
    {
        return $this->ingresos;
    }

    /**
     * @return Collection|Pedidos[]
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }
}
