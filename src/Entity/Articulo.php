<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticuloRepository")
 */
class Articulo
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
    private $nombre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estado;

    /**
     * Many Articulos have One Categoria.
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="articulos")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;

    /**
     * Many Articulos have One UnidadMedida.
     * @ORM\ManyToOne(targetEntity="App\Entity\UnidadMedida", inversedBy="articulos")
     * @ORM\JoinColumn(name="unidad_medida_id", referencedColumnName="id")
     */
    private $unidadMedida;

    /**
     * One Articulo has Many ingresoDetalles.
     * @ORM\OneToMany(targetEntity="App\Entity\IngresoDetalle", mappedBy="articulo")
     */
    private $ingresoDetalles;

    public function __construct() {
        $this->ingresoDetalles = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

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

    public function getCategoria(): ?categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getUnidadMedida(): ?unidadMedida
    {
        return $this->unidadMedida;
    }

    public function setUnidadMedida(?UnidadMedida $unidadMedida): self
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * @return Collection|IngresoDetalles[]
     */
    public function getIngresoDetalles(): Collection
    {
        return $this->ingresoDetalles;
    }
}
