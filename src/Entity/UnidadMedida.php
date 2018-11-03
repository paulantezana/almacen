<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnidadMedidaRepository")
 */
class UnidadMedida
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $prefijo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estado;

    /**
     * One UnidadMedida has Many articulos.
     * @ORM\OneToMany(targetEntity="App\Entity\Articulo", mappedBy="unidadMedida")
     */
    private $articulos;

    public function __construct() {
        $this->articulos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrefijo(): ?string
    {
        return $this->prefijo;
    }

    public function setPrefijo(?string $prefijo): self
    {
        $this->prefijo = $prefijo;

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

    /**
     * @return Collection|Articulos[]
     */
    public function getArticulos(): Collection
    {
        return $this->articulos;
    }
}
