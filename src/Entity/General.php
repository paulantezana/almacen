<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeneralRepository")
 */
class General
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $nombre_impuesto;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $porcentaje_impuesto;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $simbolo_moneda;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $logo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpresa(): ?string
    {
        return $this->empresa;
    }

    public function setEmpresa(string $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getNombreImpuesto(): ?string
    {
        return $this->nombre_impuesto;
    }

    public function setNombreImpuesto(?string $nombre_impuesto): self
    {
        $this->nombre_impuesto = $nombre_impuesto;

        return $this;
    }

    public function getPorcentajeImpuesto()
    {
        return $this->porcentaje_impuesto;
    }

    public function setPorcentajeImpuesto($porcentaje_impuesto): self
    {
        $this->porcentaje_impuesto = $porcentaje_impuesto;

        return $this;
    }

    public function getSimboloMoneda(): ?string
    {
        return $this->simbolo_moneda;
    }

    public function setSimboloMoneda(?string $simbolo_moneda): self
    {
        $this->simbolo_moneda = $simbolo_moneda;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
